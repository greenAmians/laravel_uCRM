<script setup>
// C:\xampp\htdocs\uCRM\node_modules\@inertiajs\inertia-vue3\src\link.js
import { Link } from '@inertiajs/inertia-vue3';
// Linkコンポーネントでsutore保存
import { ref } from 'vue'

const newTitle = ref('')
const newContent = ref ('')


// defineProps({
//     canLogin: Boolean,
//     canRegister: Boolean,
//     laravelVersion: String,
//     phpVersion: String,
// })
</script>

<!-- htmlをかく -->
<template>
Inertiaテストです。<br>
<a href="/">aタグ経由です</a><br>
<Link href="/">Link経由です</Link><br>
<!-- vue.jsの機能で、:hrefだと動的にリンクをかえることができる -->
<Link :href="route('inertia.index')">名前付きルートの確認です</Link><br>
<!-- ↓Linkルートパラメータ実装 -->
<Link :href="route('inertia.show', { id: 1 })">ルートパラメータのテストです</Link>

<!-- Linkコンポーネントでsutore保存 -->
<div class="mb-8"></div>
<input type="text" name="newTitle" v-model="newTitle">{{ newTitle }}<br>
<input type="text" name="newContent" v-model="newContent">{{ newContent }}<br>
<Link as="button" method="post" :href="route('inertia.store')" :data="{
    title: newTitle,
    content: newContent
}">DB保存テスト</Link>
</template>