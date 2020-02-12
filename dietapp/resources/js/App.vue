<template>
    <div>
        <!-- ナビバー -->
        <header>
            <Navbar />
        </header>
        <!-- メインコンテンツ -->
        <main>
            <div>
                <router-view></router-view>
            </div>
        </main>
        <!-- フッター -->
        <Footer />
    </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
import Footer from "./components/Footer.vue";

export default {
    components: {
        Navbar,
        Footer
    }
};
</script>
