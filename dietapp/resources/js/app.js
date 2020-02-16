import './bootstrap'
import Vue from 'vue'
import router from './router'
import store from './store'
import App from './App.vue'

// アプリ起動時、Vueインスタンス生成前にcurrentuserアクションを呼び出して確認する
const createApp = async () => {
    await store.dispatch('auth/currentUser')
}

new Vue({
    el: '#app',
    router,  // ルーティングの読み込み
    store,
    components: { App },  // ルートコンポーネントの使用を宣言
    template: '<App />'  // ルートコンポーネントを描画
})

// 最後に呼び出すことでstoreが使える
createApp()
