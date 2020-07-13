import Vue from 'vue'
import VueRouter from 'vue-router'

// コンポーネントをインポート
import IdeaList from './components/IdeaList.vue'
import Login from './components/Login.vue'
import SystemError from './pages/errors/System.vue'
import newIdea from './components/newIdea.vue'
import ideaDetail from './components/ideaDetail.vue'
import buyIdea from './components/buyIdea.vue'

// ナビゲーションガードを使用するためstoreをインポート
import store from './store'

// VueRouterプラグインを使用
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/ideas',
    component: IdeaList,
    props: route => {
      const page = route.query.page  // クエリパラメータ「page」を取得
      return { page: /^[1-9][0-9]*$/.test(page) ? page * 1 : 1 }  // 整数と解釈されない値は「1」
    }
  },
  {
    path: '/buy',
    component: buyIdea,
    props: route => {
      const page = route.query.page  // クエリパラメータ「page」を取得
      return { page: /^[1-9][0-9]*$/.test(page) ? page * 1 : 1 }  // 整数と解釈されない値は「1」
    }
  },
  {
    path: '/login',
    component: Login,
    beforeEnter(to, from, next) {  // ログイン済みの場合は、ホーム画面へリダイレクト
      if (store.getters['auth/check']) {
        next('/')
      } else {
        next()
      }
    }
  },
  {
    path: '/ideas/new',
    component: newIdea
  },
  {
    path: '/ideas/:id',
    component: ideaDetail,
    props: true
  },
  {
    path: '/500',
    component: SystemError
  }
]

// VueRouterインスタンス生成
const router = new VueRouter({
  mode: 'history', // 本来のURLの形にするため
  // 画面遷移後、スクロールバーをデフォルト値へ移動
  scrollBehavior() {
    return { x: 0, y: 0 }
  },
  routes
});

export default router