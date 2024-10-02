<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, router } from '@inertiajs/vue3';
import Avatar from '@/Components/Custom/Avatar.vue';

defineProps({
    post: Object
});

</script>
<template>
    <Head :title="post.data.title" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="h1">{{ post.data.title }}</h1>
        </template>

        <div class="py-6">
            <div class="container">
                <a href="#" @click.prevent="router.get('/dashboard')" class="btn btn-outline-primary mb-4">&larr; Back</a>
                
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col col-md-8">
                        <div class="d-flex flex-column gap-4">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <p class="mb-4">{{ post.data.body }}</p>
                                    <Avatar :name="post.data.author" 
                                        :date="post.data.created_at" />
                                </div>
                            </div>

                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <h5 class="h5 mb-4 text-muted">Comments</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-4">
                        <div class="card border shadow-sm">
                            <div class="card-body">
                                <h5 class="h5 mb-4 text-muted">Related posts</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </AuthenticatedLayout>
</template>