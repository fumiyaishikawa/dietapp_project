<template>
    <div>
        <h1>ログインページ</h1>
        <!-- ログイン / 新規登録の切り替えタブ -->
        <ul>
            <li :class="{'tab__item--active': tab === 1}" @click="tab = 1">ログイン</li>
            <li :class="{'tab__item--active': tab === 2}" @click="tab = 2">新規登録</li>
        </ul>
        <!-- ログインフォーム -->
        <div v-show="tab === 1">
            <h2>ログインフォーム</h2>
            <form @submit.prevent="login">
                <label for="login-email">メールアドレス</label>
                <input type="text" id="login-email" v-model="loginForm.email" />
                <label for="login-password">パスワード</label>
                <input type="password" id="login-password" v-model="loginForm.password" />
                <div>
                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>
        <!-- 新規登録フォーム -->
        <div v-show="tab === 2">
            <h2>新規登録フォーム</h2>
            <form @submit.prevent="register">
                <label for="username">ユーザー名</label>
                <input type="text" id="username" v-model="registerForm.name" />
                <label for="email">メールアドレス</label>
                <input type="text" id="email" v-model="registerForm.email" />
                <label for="password">パスワード</label>
                <input type="password" id="password" v-model="registerForm.password" />
                <label for="password-confirmation">パスワード確認</label>
                <input
                    type="password"
                    id="password-confirmation"
                    v-model="registerForm.password_confirmation"
                />
                <div>
                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>
        <div>
            <br />
            <router-link :to="`/`">ログインページへ</router-link>
            <br />
            <router-link :to="`/user`">ユーザーページへ</router-link>
            <br />
            <router-link :to="`/user/data`">データ編集ページへ</router-link>
            <br />
            <router-link :to="`/user/info`">基本情報ページへ</router-link>
            <br />
            <router-link :to="`/user/management`">管理項目の編集ページへ</router-link>
            <br />
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tab: 1,
            loginForm: {
                email: "",
                password: ""
            },
            registerForm: {
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            }
        };
    },
    methods: {
        login() {
            console.log(this.loginForm);
        },
        register() {
            console.log(this.registerForm);
        }
    }
};
</script>

<style scoped>
.tab__item--active {
    font-weight: bold;
}
</style>
