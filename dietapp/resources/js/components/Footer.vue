<template>
    <footer class="bg-gray">
        <button v-if="isLogin" @click="logout">ログアウト</button>
        <router-link v-else to="/">ログイン / 新規登録</router-link>
    </footer>
</template>

<script>
export default {
    computed: {
        // ログイン状態の確認
        isLogin() {
            return this.$store.getters["auth/check"];
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
