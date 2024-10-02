<script setup>
defineProps({
    heading: {
        type: String,
        required: true,
    },
    description: {
        type: String,
        required: true,
    },
    isShow: {
        type: Boolean,
        required: true,
    }
});

</script>
<template>
    <div :class="isShow ? '' : 'd-none'">
        <div class="d-flex flex-column align-items-center">
            <img src="/imgs/empty-box.png"
                alt="No posts found"
                width="200"
                height="auto"
                class="img-fluid">
            <h4 class="h4 mt-4">{{ heading }}</h4>
            <p class="text-muted">{{ description }}</p>
        </div>
    </div>
</template>