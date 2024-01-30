<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="text-center px-4 py-2 bg-red-900 border border-0 rounded-md font-semibold text-md text-white">
        <slot />
    </button>
</template>
