<template>
  <header class="l-header">
    <div class="p-headerLogo">
      <RouterLink class="p-menuLink" to="/">
        <img src="images/logo.png" alt class="p-headerLogo__img" />
      </RouterLink>
    </div>

    <div class="p-headerMenuTrigger js-toggle-sp-menu">
      <span class="p-headerMenuTrigger__border"></span>
      <span class="p-headerMenuTrigger__border"></span>
      <span class="p-headerMenuTrigger__border"></span>
    </div>

    <div class="p-headerMenu">
      <li class="p-headerMenu__list" v-if="isLogin">
        <a href="#" class="p-menuLink" @click="logout">ログアウト</a>
      </li>
      <li class="p-headerMenu__list" v-else>
        <RouterLink class="p-menuLink" to="/login">ログイン</RouterLink>
      </li>
      <li class="p-headerMenu__list">
        <a href="#" class="p-menuLink">ユーザー登録</a>
      </li>
    </div>
  </header>
</template>

<script>
import { mapState, mapGetters } from "vuex";
export default {
  data() {
    return {
      tab: 1
    };
  },
  computed: {
    ...mapState({
      apiStatus: state => state.auth.apiStatus
    }),
    ...mapGetters({
      isLogin: "auth/check"
    })
  },

  methods: {
    async logout() {
      // authストアのlogoutアクションを呼び出す
      await this.$store.dispatch("auth/logout");

      if (this.apiStatus) {
        // ログインページに移動する
        this.$router.push("/login");
      }
    }
  }
};
</script>