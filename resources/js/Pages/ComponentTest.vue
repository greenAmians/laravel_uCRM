<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Label from '@/Components/InputLabel.vue'
import Input from '@/Components/TextInput.vue'
</script>

<template>
<GuestLayout>
    <label value="件名">タイトル</label>
    <Input modelValue="初期値が入ります"></Input>
</GuestLayout>
</template>