import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import Login from './pages/Login.vue'
import UserPage from './pages/UserPage.vue'
import UserData from './pages/UserData.vue'
import UserInfo from './pages/UserInfo.vue'
import Management from './pages/Management.vue'

// VueRouterプラグインを使う。-><router-view>タグが使えるようになる。
Vue.use(VueRouter)

//  ルーティング->パスとコンポーネントをマッピングする
const routes = [
    {
        path: '/',
        component: Login
    },
    {
        path: '/user',
        component: UserPage
    },
    {
        path: '/user/data',
        component: UserData
    },
    {
        path: '/user/info',
        component: UserInfo
    },
    {
        path: '/user/management',
        component: Management
    },
]

// VueRouterインスタンスを作る
const router = new VueRouter({
    mode: 'history',
    routes
})

// app.jsでインポートするために、VueRouterインスタンスをエクスポートする
export default router
