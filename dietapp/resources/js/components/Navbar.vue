<template>
    <nav class="bg-gray">
        <!-- ナビバーの左側のコンテンツ -->
        <router-link to="/">DietApp</router-link>
        <div>
            <!-- ナビバーの右側のコンテンツ -->
            <div>
                <router-link to="/user">{{ username }}様</router-link>
            </div>
            <div>
                <button v-if="isLogin" @click="logout">ログアウト</button>
                <router-link v-else to="/">ログイン / 新規登録</router-link>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    computed: {
        // ログイン状態の確認
        isLogin() {
            return this.$store.getters["auth/check"];
        },
        // ログインユーザー名の表示
        username() {
            return this.$store.getters["auth/username"];
        }
    },
    methods: {
        // ログアウト機能
        async logout() {
            await this.$store.dispatch("auth/logout");
            this.$router.push("/");
        }
    }
};
</script>

<style scoped>
.bg-gray {
    background-color: greenyellow;
}
</style>
