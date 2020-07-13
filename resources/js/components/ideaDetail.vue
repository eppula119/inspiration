<template>
  <div>
    <section id="idea" v-if="idea">
      <p class="p-ideaTitle">{{ idea.name }}</p>
      <i
        v-for="n in 5"
        :key="n"
        class="fas fa-star p-ideaStar c-star"
        :class="{ 'c-star--disabled': idea.review_star < n }"
      ></i>
      <span class="p-review">{{ idea.review_star }}</span>

      <button @click="twitterShare">
        <i class="fas fa-heart c-heart"></i>ツイッターでシェアする
      </button>

      <button
        class="p-favorite"
        :class="{ 'p-favorite--favorited': idea.favorited_by_user }"
        @click="onFavoriteClick"
      >
        <i class="fas fa-heart c-heart"></i>気になる
      </button>

      <img :src="idea.photo1" alt class="p-ideaImg1" />
      <!-- ------------------------------------------- -->

      <div class="p-subImg">
        <img :src="idea.photo1" alt class="p-subImg__sub" />
        <img :src="idea.photo2" alt class="p-subImg__sub" />
        <img :src="idea.photo3" alt class="p-subImg__sub" />
        <img :src="idea.photo4" alt class="p-subImg__sub" />
        <img :src="idea.photo5" alt class="p-subImg__sub" />
      </div>
      <div class="p-ideaOutline">{{ idea.outline }}</div>
      <div class="p-ideaContent" v-if="this.buyIdeaFlg">{{ idea.content }}</div>
      <div class="p-ideaContent" v-else>購入後、アイディアの内容閲覧が可能です。</div>
      <div class="p-ideaReview">
        <div class="p-ideaReview__head">
          <span class="p-ideaMouth">口コミ（{{ idea.reviews_count }}件）</span>
          <i
            v-for="n in 5"
            :key="n"
            class="fas fa-star p-ideaStar c-star"
            :class="{ 'c-star--disabled': idea.review_star < n }"
          ></i>
          <span class="p-review">{{ idea.review_star }}</span>
          <button class="p-btnPost" @click="reviewModalShow">投稿</button>
        </div>
        <div class="p-ideaReview__main" v-for=" (review, index) in idea.reviews" :key="index">
          <i class="fas fa-user p-reviewUser"></i>
          <span class="p-userName" v-if="idea.user.name">{{ idea.user.name }}</span>
          <span class="p-userName" v-else>名無し</span>
          <i
            v-for="n in 5"
            :key="n"
            class="fas fa-star p-ideaStar c-star"
            :class="{ 'c-star--disabled': review.star < n }"
          ></i>

          <p class="p-reviewText">
            色々とわがままな要望をしましたが、
            <br />真摯に対応して下さりました。とても満足です。
          </p>
        </div>
        <button class="p-reviewMore c-btn">＋もっと見る</button>
      </div>
    </section>
    <!--ーーーーーーーーーーーーーーーーーー サイドバー（値段部分）表示 ーーーーーーーーーーーーーーーーーー-->

    <div class="p-buyProfWrap">
      <section id="buy" v-if="idea">
        <p class="p-buyPrice">{{ idea.price }}円</p>
        <button class="p-buyBtn c-btn" @click="buyModalShow" :disabled="this.buyBtnShow">購入</button>
      </section>
      <!--ーーーーーーーーーーーーーーーーーー サイドバー（プロフィール部分）表示 ーーーーーーーーーーーーーーーーーー-->
      <section class id="profile">
        <p class="p-profileTitle">プロフィール</p>
        <div class="p-profileIcon">
          <i class="fas fa-user p-profileIcon__icon c-userIcon"></i>
        </div>
        <div class="p-profileReview">
          <i class="fas fa-star p-profileReview__star c-star"></i>
          <span>4.9(48)</span>
        </div>
        <p class="p-profileContent">
          名無し
          <br />血液型：A型
          <br />世の中を常に観察し、
          <br />何が求められているか、
          <br />これから何が流行るかを
          <br />考えるのが得意です。
          <br />
        </p>
      </section>
    </div>
  </div>
</template>

<script>
import { OK } from "../util";
import { mapState, mapGetters } from "vuex";

export default {
  props: {
    id: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      idea: null,
      buyBtnShow: false,
      buyIdeaFlg: false
    };
  },
  computed: {
    // isLogin() {
    //   return this.$store.getters["auth/check"];
    // },
    // ideaストアのideasを参照
    ...mapState({
      user: state => state.auth.user
    }),
    // ideaストアのfilteredIdeas(絞り込み後のアイディア)を参照
    ...mapGetters({
      isLogin: "auth/check"
    })
  },
  methods: {
    async fetchIdea() {
      const response = await axios.get(`/api/ideas/${this.id}`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      let buyIdeas = "";
      let buyIdea = "";
      let buyFlg = null;
      let self = this;

      this.idea = response.data.idea;
      buyIdeas = response.data.buyData; // ログインユーザーの購入済みアイディア

      buyIdea = buyIdeas.filter(function(data) {
        // 購入済み、または投稿したアイディアの場合配列に追加
        return (
          self.idea.id === data.idea_id || self.idea.user_id === self.user.id
        );
      });

      buyFlg = buyIdeas.filter(function(data) {
        return self.idea.id === data.idea_id;
      });

      if (buyFlg.length > 0) {
        this.buyIdeaFlg = true;
      }

      if (buyIdea.length > 0) {
        // 選択アイディアが購入済みかどうか
        this.buyBtnShow = true;
      }
    },

    onFavoriteClick() {
      if (!this.isLogin) {
        alert("気になるボタンを使うにはログインしてください。");
        return false;
      }

      if (this.idea.favorited_by_user) {
        this.unfavorite();
      } else {
        this.favorite();
      }
    },
    // 気になるリスト登録
    async favorite() {
      const response = await axios.put(`/api/ideas/${this.id}/favorite`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.idea.favorited_by_user = true;
    },
    // 気になるリスト解除
    async unfavorite() {
      const response = await axios.delete(`/api/ideas/${this.id}/favorite`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.idea.favorited_by_user = false;
    },
    // Twitterシェア
    twitterShare() {
      //シェアする画面を設定
      var shareURL =
        "https://twitter.com/intent/tweet?text=" +
        "あなたのアイディア、お金に換えませんか？「inspiration」" +
        "%20%23INSPIRATION" +
        "&url=" +
        "http://ideas/twitter-share";
      //シェア用の画面へ移行
      location.href = shareURL;
    },
    // レビュー投稿モーダル表示
    async reviewModalShow() {
      this.$store.dispatch("modal/setideaId", this.id);
      this.$store.dispatch("modal/setmodalVal", true);
      this.$store.dispatch("modal/setreviewModal", true);
      this.$store.dispatch("modal/setsellerEmail", {
        email: this.idea.user.email,
        name: this.idea.name
      });
    },
    // 購入画面モーダル表示
    async buyModalShow() {
      this.$store.dispatch("modal/setideaId", this.id);
      this.$store.dispatch("modal/setmodalVal", true);
      this.$store.dispatch("modal/setbuyModal", true);
      this.$store.dispatch("modal/setsellerEmail", this.idea.user.email);
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.fetchIdea();
      },
      immediate: true
    }
  }
};
</script>