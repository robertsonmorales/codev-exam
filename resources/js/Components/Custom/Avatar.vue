<script setup>
defineProps({
    name: String,
    date: String
});
</script>

<template>
    <div class="d-flex align-items-center mb-3">
        <img src="https://ui-avatars.com/api/?name=John+Doe" 
            width="44"
            height="44"
            alt="{{ name }}" 
            class="rounded-circle me-3">
        <div class="d-flex flex-column">
            <div class="text-dark fw-bold">{{ name }}</div>
            <div class="text-muted">{{ date }}</div>
        </div>
    </div>
</template>