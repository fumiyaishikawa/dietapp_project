<template>
    <nav class="bg-gray">
        <!-- ナビバーの左側のコンテンツ -->
        <router-link to="/">DietApp</router-link>
        <div>
            <!-- ナビバーの右側のコンテンツ -->
            <div>
                <router-link to="/user">ゲスト様</router-link>
            </div>
            <div>
                <router-link to="/">ログイン / 新規登録</router-link>
            </div>
        </div>
    </nav>
</template>

<style scoped>
.bg-gray {
    background-color: greenyellow;
}
</style>
