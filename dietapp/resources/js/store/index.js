import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {  // ストアを種類に応じてモジュールとして作成し、使用できる
        auth
    }
})

export default store
