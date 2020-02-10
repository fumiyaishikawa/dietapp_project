<template>
    <div>
        <h1>ユーザーのメインページ</h1>
        <div>
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
