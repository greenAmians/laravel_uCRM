<!-- Linkルートパラメータ実装 -->
<script setup>
import { Inertia } from '@inertiajs/inertia';

defineProps({
    id : String,
    blog: Object
})

// 引数が一つの場合(id)ではなくidだけで良き
const deleteConfirm = id => {
    // //確認用
    // console.log(id)

    //Inertiaコードをかく
    Inertia.delete(`/inertia/${id}`,{
        onBefore: () => confirm('本当に削除しますか')
    })
}
</script>
<template>
    {{  id  }}<br>
    {{ blog.title }}
    <button @click="deleteConfirm(blog.id)">削除</button>
</template>