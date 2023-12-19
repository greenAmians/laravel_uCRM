<script setup></script>
<template>
    <!-- フラッシュメッセージなので、リロードしたら消える -->
    <div v-if="$page.props.flash.status === 'success'" class="bg-green-300 text-white p-4">
        {{ $page.props.flash.message }}
    </div>
</template>
