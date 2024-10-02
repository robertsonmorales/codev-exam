<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, router } from '@inertiajs/vue3';

import Card from "@/Components/Custom/Card.vue";
import Pagination from "@/Components/Custom/Pagination.vue";
import EmptyState from "@/Components/Custom/EmptyState.vue";

defineProps({
    posts: Object,
    filters: Object
});

const searchPost = (value) => {
    router.get('/dashboard',
        { search: value },
        { preserveState: true }
    );
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-6">
            <div class="container">
                <!-- Search Input -->
                <div :class="`d-flex justify-content-${filters.search ? 'between' : 'end' } align-items-center mb-3`">
                    <h4 v-if="filters.search" class="h4 mb-0">Search for "<span class="fw-bold">{{ filters.search }}</span>"</h4>

                    <div class="input-group w-50">
                        <input v-model="filters.search"
                            type="search" 
                            class="form-control border rounded me-2" 
                            placeholder="Search for posts..." 
                            aria-label="Search for posts..." 
                            aria-describedby="button-search">
                        <button @click="searchPost(filters.search)"
                            class="btn btn-primary rounded px-4" 
                            type="button" 
                            id="button-search">Seach</button>
                    </div>
                </div>
                <!-- Ends here -->

                <!-- Cards Here -->
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
                    <div class="col mb-4" v-for="post in posts.data" :key="post.id">
                        <Card :post="post" />
                    </div>
                </div>
                <!-- Ends here -->

                <!-- Pagination -->
                <div :class="posts.data.length > 0 ? '' : 'd-none'">
                    <Pagination 
                        :per_page="posts.meta.per_page"
                        :total="posts.meta.total"
                        :links="posts.meta.links" />
                </div>
                <!-- Ends here -->

                <!-- Empty State -->
                <EmptyState :isShow="posts.data.length <= 0" 
                    heading="No posts found" 
                    description="Try different keywords" />
                <!-- Ends here -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>