import Vue from 'vue'
import router from './router'
import App from './App.vue'

new Vue({
    el: '#app',
    router,  // ルーティングの読み込み
    components: { App },  // ルートコンポーネントの使用を宣言
    template: '<App />'  // ルートコンポーネントを描画
})
