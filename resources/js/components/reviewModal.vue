<template>
  <form
    method="post"
    :action="'/edit/review/'"
    class="c-modal_form"
    @submit.prevent="submit"
    v-show="reviewModalShow"
  >
    <span class="p-newIdea__errors" role="alert" v-if="errors">
      <ul v-if="errors">
        <li v-for="msg in errors" :key="msg">{{ msg }}</li>
      </ul>
    </span>
    <input type="hidden" name="_token" />
    <div class="c-overlay">
      <div class="c-overlay__review">
        <button class="p-modal_cancel" @click="modalClose">×</button>
        <p class="p-modal_title">レビュー投稿</p>

        <div class="p-modal_star">
          <input
            id="star1"
            class="p-modal_star__input"
            type="radio"
            name="star"
            value="5"
            v-model="form.star"
            :checked="form.star == 5"
          />
          <label for="star1" class="p-modal_star__label">
            <i class="fas fa-star"></i>
          </label>
          <input
            id="star2"
            class="p-modal_star__input"
            type="radio"
            name="star"
            value="4"
            v-model="form.star"
            :checked="form.star == 4"
          />
          <label for="star2" class="p-modal_star__label">
            <i class="fas fa-star"></i>
          </label>
          <input
            id="star3"
            class="p-modal_star__input"
            type="radio"
            name="star"
            value="3"
            v-model="form.star"
            :checked="form.star == 3"
          />
          <label for="star3" class="p-modal_star__label">
            <i class="fas fa-star"></i>
          </label>
          <input
            id="star4"
            class="p-modal_star__input"
            type="radio"
            name="star"
            value="2"
            v-model="form.star"
            :checked="form.star == 2"
          />
          <label for="star4" class="p-modal_star__label">
            <i class="fas fa-star"></i>
          </label>
          <input
            id="star5"
            class="p-modal_star__input"
            type="radio"
            name="star"
            value="1"
            v-model="form.star"
            :checked="form.star == 1"
          />
          <label for="star5" class="p-modal_star__label">
            <i class="fas fa-star"></i>
          </label>
        </div>

        <input
          type="text"
          class="p-modal_input"
          placeholder="タイトル"
          name="title"
          v-model="form.title"
        />
        <textarea name="text" class="p-modal_text" value="内容" v-model="form.text"></textarea>

        <button type="submit" class="p-modal_submit">投稿</button>
      </div>
    </div>
  </form>
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
        star: 0,
        title: "",
        text: ""
      },
      errors: null
    };
  },
  computed: {
    ...mapState({
      ideaId: state => state.modal.ideaId,
      modalShow: state => state.modal.modalFlg,
      reviewModalShow: state => state.modal.reviewMoldalFlg,
      sell: state => state.modal.sell,
      user: state => state.auth.user
    })
  },
  methods: {
    async modalClose() {
      this.$store.dispatch("modal/setmodalVal", false);
      this.$store.dispatch("modal/setreviewModal", false);
    },
    // 入力欄の値をクリア
    reset() {
      this.form.id = "";
      this.form.star = 0;
      this.form.title = "";
      this.form.text = "";
      this.errors = null;
    },
    async submit() {
      this.form.id = this.ideaId;
      this.form.star = parseInt(this.form.star);
      const response = await axios.post("/api/review/create", this.form);
      console.log(response.data.idea_id);

      if (response.status === UNPROCESSABLE_ENTITY) {
        console.log("エラーが発生しました");
        this.errors = response.data.errors;
        return false;
      }

      this.reset();

      if (response.status !== CREATED) {
        this.$store.commit("error/setCode", response.status);
        console.log("ストアにエラーがセットされました");
        return false;
      }

      this.reset();

      // メッセージ登録
      this.$store.commit("message/setContent", {
        content: "レビューが登録されました！",
        timeout: 5000
      });
      console.log("成功");

      let adress = {};
      adress = {
        buy: this.user.email,
        sell: this.sell.sellerEmail.email,
        idea: this.sell.sellerEmail.name
      };

      const url = "/api/mail/review";
      const self = this;
      console.log(adress);
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

      // 登録完了後、アイディア詳細ページへ移動
      this.$router.push(`/ideas/${response.data.idea_id}`).catch(err => {});
    }
  }
};
</script>