<template>
    <footer class="bg-gray">
        <button @click="logout">ログアウト</button>
        <router-link to="/">ログイン / 新規登録</router-link>
    </footer>
</template>

<script>
export default {
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
