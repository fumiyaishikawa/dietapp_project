import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import Login from './pages/Login.vue'
import UserPage from './pages/UserPage.vue'
import UserData from './pages/UserData.vue'
import UserInfo from './pages/UserInfo.vue'
import Management from './pages/Management.vue'

// ナビゲーションガード用
import store from './store'

// VueRouterプラグインを使う。-><router-view>タグが使えるようになる。
Vue.use(VueRouter)

//  ルーティング->パスとコンポーネントをマッピングする
const routes = [
    {
        path: '/',
        component: Login,
        // ナビゲーションガード用
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next('/user')   // ログインしていればユーザーページ
            } else {
                next()   // ログインしていなければそのまま遷移
            }
        }
    },
    {
        path: '/user',
        component: UserPage,
        // ナビゲーションガード用
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next()   // ログインしていればそのまま遷移
            } else {
                next('/')   // ログインしていなければログインページ
            }
        }
    },
    {
        path: '/user/data',
        component: UserData,
        // ナビゲーションガード用
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next()   // ログインしていればそのまま遷移
            } else {
                next('/')   // ログインしていなければログインページ
            }
        }
    },
    {
        path: '/user/info',
        component: UserInfo,
        // ナビゲーションガード用
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next()   // ログインしていればそのまま遷移
            } else {
                next('/')   // ログインしていなければログインページ
            }
        }
    },
    {
        path: '/user/management',
        component: Management,
        // ナビゲーションガード用
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next()   // ログインしていればそのまま遷移
            } else {
                next('/')   // ログインしていなければログインページ
            }
        }
    },
]

// VueRouterインスタンスを作る
const router = new VueRouter({
    mode: 'history',
    routes
})

// app.jsでインポートするために、VueRouterインスタンスをエクスポートする
export default router
