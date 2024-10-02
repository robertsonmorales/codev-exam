<script setup>
import { router } from '@inertiajs/vue3';

defineProps({ post: Object });

const previewPost = (id) => {
    router.get('/dashboard/post/' + id);
}
</script>

<template>
    <div @click="previewPost(post.id)"
        class="card h-100 overflow-hidden border shadow-sm" style="cursor: pointer;">
        <div class="card-img py-2 px-2 bg-light">
            <img src="/imgs/placeholder.jpg" 
                width="480"
                height="200"
                class="img-fluid rounded"
                :alt="post.title">
        </div>
        <div class="card-body">
            <small>{{ post.created_at }}</small>
            <h5 class="card-title fw-bold lead">{{ post.title }}</h5>
            <p class="card-text fs-6 text-muted lh-sm mb-4 text-truncate">{{ post.body }}</p>            
        </div>
    </div>
</template>