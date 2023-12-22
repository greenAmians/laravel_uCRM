<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3'

const props = defineProps({
    errors: Object
})
const errors = computed(() => usePage().props.value.errors);
// 1つでもバリデーションエラーに値が入ったら定数に値がはいる
// const hasErrors = computed(() => Object.keys(props.errors).length > 0);

const hasErrors = computed(() => Object.keys(errors.value).length > 0);

</script>


<template>
    <div v-if="hasErrors">
        <div class="font-medium text-red-600">問題が発生しました。</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            <!-- <li v-for="(error, key) in props.errors" :key="key">{{ error }}</li> -->
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>

        </ul>
    </div>
</template>