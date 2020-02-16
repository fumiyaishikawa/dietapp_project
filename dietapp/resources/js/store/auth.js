import Axios from "axios"

const state = {
    user: null
}

const getters = {
    // ログインチェック
    check: state => !!state.user,
    // ログインしているユーザー名の表示
    username: state => state.user ? state.user.name : 'ゲスト'
}

const mutations = {
    // ユーザーの新規登録
    setUser(state, user) {
        state.user = user
    }
}

const actions = {
    // ユーザーの新規登録
    async register(context, data) {
        const response = await axios.post('/api/register', data)    // 会員登録APIを呼び出してデータを取得する
        context.commit('setUser', response.data)
    },
    // ログイン機能
    async login(context, data) {
        const response = await axios.post('/api/login', data)
        context.commit('setUser', response.data)
    },
    // ログアウト機能
    async logout(context) {
        const response = await axios.post('/api/logout')
        context.commit('setUser', null)
    },
    // グーグル認証機能->api通信がうまくできない
    // async googleLogin(context) {
    //     const response = await axios.get('/api/login/google')
    //     context.commit('setUser', response.data)
    // },
    // ユーザー認証を維持する
    async currentUser(context) {
        const response = await axios.get('/api/user')
        // ログインしていない場合は空文字を返す
        const user = response.data || null
        context.commit('setUser', user) // nullを返しているのでゲスト様が表示されない場合は''に変えること
    }
}

export default {
    namespaced: true,   // 名前空間としての使用を許可する
    state,
    getters,
    mutations,
    actions
}
