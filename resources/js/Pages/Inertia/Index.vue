<script setup>
</script>
<template>
    <!-- フラッシュメッセージなので、リロードしたら消える -->
    <div v-if="$page.props.flash.message" class="bg-blue-300">
    {{ $page.props.flash.message }}</div>
    ああああああ
</template>