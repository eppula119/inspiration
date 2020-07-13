<template>
  <div class="c-overlay" v-show="buyModalShow">
    <div class="c-overlay__content">
      <p class="p-modal_coment">
        本当に
        <br />
        <span class="p-modal_coment__bold">購入</span>しますか?
      </p>
      <button class="p-modal_btn" v-on:click="modalClose">キャンセル</button>
      <button class="p-modal_btn p-modal_btn_link" @click="buy">購入</button>
    </div>
  </div>
</template>

<script>
import { CREATED, UNPROCESSABLE_ENTITY, OK } from "../util";
import { mapState } from "vuex";
// import buyModal from "./components/buyModal.vue";

export default {
  data() {
    return {
      form: {
        id: "",
        star: "",
        title: "",
        text: ""
      }
    };
  },
  computed: {
    ...mapState({
      ideaId: state => state.modal.ideaId,
      modalShow: state => state.modal.modalFlg,
      buyModalShow: state => state.modal.buyModalFlg,
      sell: state => state.modal.sell,
      user: state => state.auth.user
    })
  },
  methods: {
    async modalClose() {
      this.$store.dispatch("modal/setmodalVal", false);
      this.$store.dispatch("modal/setbuyModal", false);
    },
    // 入力欄の値をクリア
    reset() {
      this.form.id = "";
      this.form.star = 0;
      this.form.title = "";
      this.form.text = "";
      this.errors = null;
    },
    async buy() {
      this.form.id = this.ideaId;
      const response = await axios.post("/api/buy", this.form);
      console.log(response.data.idea_id);

      const url = "/api/mail/buy";
      const self = this;

      if (response.status === UNPROCESSABLE_ENTITY) {
        console.log("エラーが発生しました");
        this.errors = response.data.errors;
        return false;
      }

      this.reset();

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        console.log(response.status);
        console.log("ストアにエラーがセットされました");
        return false;
      }

      this.reset();

      // メッセージ登録
      this.$store.commit("message/setContent", {
        content: "購入が完了しました！",
        timeout: 5000
      });
      console.log("成功");

      let adress = {};
      adress = { buy: this.user.email, sell: this.sell.sellerEmail };

      //axiosでPOST送信
      axios
        .post(url, adress)
        .then(res => {
          if (res.data.result) {
            //メール送信完了画面に遷移する
          } else {
            self.errors = res.data.errors;
          }
        })
        .catch(err => {
          //例外処理を行う
        });

      this.reset();
      this.modalClose();

      // 購入後、アイディア詳細ページへ移動
      this.$router.push(`/ideas/${response.data.idea_id}`).catch(err => {});
    }
  }
};
</script>