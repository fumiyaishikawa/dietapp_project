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
                <p>
                    <label for="login-email">メールアドレス</label>
                    <input type="text" id="login-email" v-model="loginForm.email" />
                </p>
                <p>
                    <label for="login-password">パスワード</label>
                    <input type="password" id="login-password" v-model="loginForm.password" />
                </p>
                <div>
                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>
        <!-- 新規登録フォーム -->
        <div v-show="tab === 2">
            <h2>新規登録フォーム</h2>
            <form @submit.prevent="register">
                <p>
                    <label for="username">ユーザー名</label>
                    <input type="text" id="username" v-model="registerForm.name" />
                </p>
                <p>
                    <label for="email">メールアドレス</label>
                    <input type="text" id="email" v-model="registerForm.email" />
                </p>
                <p>
                    <label for="password">パスワード</label>
                    <input type="password" id="password" v-model="registerForm.password" />
                    ※パスワードは半角英数字六文字以上で作成してください。
                </p>
                <p>
                    <label for="password-confirmation">パスワード確認</label>
                    <input
                        type="password"
                        id="password-confirmation"
                        v-model="registerForm.password_confirmation"
                    />
                </p>
                <div>
                    <button type="submit">新規登録</button>
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
        // ログイン機能
        async login() {
            console.log(this.loginForm);
            // authストアのregisterアクションを呼び出す
            await this.$store.dispatch("auth/login", this.loginForm);
            // トップページに戻る
            this.$router.push("/user");
        },
        // ユーザーの新規登録
        async register() {
            console.log(this.registerForm);
            // authストアのregisterアクションを呼び出す
            await this.$store.dispatch("auth/register", this.registerForm);
            // トップページに戻る
            this.$router.push("/user");
        },
        // Googleアカウントによるログイン機能
        async googleLogin() {
            // authストアのregisterアクションを呼び出す
            await this.$store.dispatch("auth/googleLogin");
            // トップページに戻る
            this.$router.push("/user");
        }
    }
};
</script>

<style scoped>
.tab__item--active {
    font-weight: bold;
}
</style>
