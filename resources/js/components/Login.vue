<template>
  <div class="l-bg p-form">
    <div class="p-formContainer">
      <p class="c-formTitle">ログイン</p>
      <!-------------------------------------- ログインフォーム ----------------------------------------------->
      <form method="post" class="c-form" @submit.prevent="login" v-show="true">
        <input
          type="email"
          name="email"
          class="c-form__input is-invalid"
          required
          autocomplete="email"
          autofocus
          placeholder="#"
          v-model="loginForm.email"
        />

        <span class="c-form__errors" role="alert" v-if="loginErrors">
          <ul v-if="loginErrors.email">
            <li v-for="msg in loginErrors.email" :key="msg">{{ msg }}</li>
          </ul>
        </span>
        <input
          type="password"
          name="password"
          class="c-form__input is-invalid"
          　required
          autocomplete="current-password"
          placeholder="#"
          v-model="loginForm.password"
        />
        <span class="c-form__errors" role="alert" v-if="loginErrors">
          <ul v-if="loginErrors.password">
            <li v-for="msg in loginErrors.password" :key="msg">{{ msg }}</li>
          </ul>
        </span>
        <label for="c-formCheck" class="c-form__label">
          <input type="checkbox" name="remember" id="c-formCheck" />次回から自動でログインする
        </label>

        <input type="submit" class="c-btn c-btnRegister" />

        <p class="c-form__passlink">
          ※パスワードを忘れた方は
          <a href="#" class="c-passLink">こちら</a>
        </p>
      </form>
      <!-------------------------------------- ユーザー登録フォーム ----------------------------------------------->
      <form method="post" class="c-form" @submit.prevent="register" v-show="false">
        <input
          type="email"
          name="email"
          class="c-form__input is-invalid"
          required
          autocomplete="email"
          autofocus
          placeholder="#"
          v-model="registerForm.email"
        />

        <span class="c-form__errors" role="alert" v-if="registerErrors">
          <ul v-if="registerErrors.email">
            <li v-for="msg in registerErrors.email" :key="msg">{{ msg }}</li>
          </ul>
        </span>
        <input
          type="password"
          name="password"
          class="c-form__input is-invalid"
          　required
          autocomplete="current-password"
          placeholder="#"
          v-model="registerForm.password"
        />
        <span class="c-form__errors" role="alert" v-if="registerErrors">
          <ul v-if="registerErrors.password">
            <li v-for="msg in registerErrors.password" :key="msg">{{ msg }}</li>
          </ul>
        </span>

        <input
          type="password"
          name="password_confirmation"
          class="c-form__input is-invalid"
          required
          autocomplete="new-password"
          placeholder="#"
          v-model="registerForm.password_confirmation"
        />
        <input type="submit" class="c-btn c-btnRegister" value="#" />
      </form>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  data() {
    return {
      tab: false,
      loginForm: {
        email: "",
        password: ""
      },
      registerForm: {
        email: "",
        password: "",
        password_conriramtion: ""
      }
    };
  },

  computed: mapState({
    apiStatus: state => state.auth.apiStatus,
    loginErrors: state => state.auth.loginErrorMessages, // ログインエラーメッセージstatusを参照
    registerErrors: state => state.auth.registerErrorMessages // ユーザー登録エラーメッセージstatusを参照
  }),

  methods: {
    async login() {
      await this.$store.dispatch("auth/login", this.loginForm); // authストアのloginアクションを呼び出す
      if (this.apiStatus) {
        this.$router.push("/"); // 通信成功したら、トップページに移動する
      }
    },
    async register() {
      await this.$store.dispatch("auth/register", this.registerForm); // authストアのresigterアクションを呼び出す

      if (this.apiStatus) {
        this.$router.push("/"); // トップページに移動する
      }
    },
    clearError() {
      // エラーメッセージをクリア
      this.$store.commit("auth/setLoginErrorMessages", null);
      this.$store.commit("auth/setRegisterErrorMessages", null);
    }
  },
  created() {
    this.clearError();
  }
};
</script>