<script setup>
// C:\xampp\htdocs\uCRM\node_modules\@inertiajs\inertia-vue3\src\link.js
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
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
</template>