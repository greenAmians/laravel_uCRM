<script setup>
import { Link } from '@inertiajs/inertia-vue3';

// コントローラーから渡す際はdefinePropsを書く
defineProps({
    blogs: Array
})
</script>
<template>
    <!-- フラッシュメッセージなので、リロードしたら消える -->
    <div v-if="$page.props.flash.message" class="bg-blue-300">
    {{ $page.props.flash.message }}</div>
    <ul>
        <li v-for="blog in blogs" :key="blog.id">
            件名：<!-- ↓Linkルートパラメータ実装 -->
<Link class="text-blue-400" :href="route('inertia.show', { id: blog.id })">{{ blog.title }}</Link>,
            本文：{{ blog.content }}
        </li>
    </ul>
    ああああああ
</template>