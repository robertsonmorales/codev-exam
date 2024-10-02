<script setup>
import { router } from '@inertiajs/vue3';

defineProps({
    per_page: Number,
    total: Number,
    links: Array
});

const paginate = (url) => {
    let pageNumber = url.split('=')[1];

    router.get(route('dashboard'), {
        page: pageNumber
    });
}
</script>
<template>
    <div class="d-flex justify-content-between align-items-center">
        <div>
            Showing <span class="fw-semibold">{{ per_page }}</span> to <span class="fw-semibold">{{ total }}</span> of <span class="fw-semibold">{{ total }}</span> results
        </div>
        <nav class="d-flex align-items-center justify-content-center">
            <ul class="pagination">
                <li v-for="link in links" 
                    :key="link.url" 
                    :class="['page-item', { active: link.active }]">
                    <button :disabled="link.active || !link.url"
                        @click="paginate(link.url)"
                        class="page-link">
                        <span v-html="link.label"></span>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</template>