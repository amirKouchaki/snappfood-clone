<template>
    <ul v-if="filters.length" class="price-filters">
        <li
            v-for="(filter, index) in filters"
            :key="index"
            @click="activate(index, filters)"
            class="price-filter"
            :class="{ active: filter.isActive }"
        >
            {{ filter.text }}
        </li>
    </ul>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { activate } from "../../../composables/activation";
const filters = ref([
    { text: "همه", isActive: true },
    { text: "اقتصادی", isActive: false },
    { text: "متوسط", isActive: false },
    { text: "گران", isActive: false },
]);
</script>

<style lang="scss" scoped>
.price-filters {
    display: flex;
    direction: rtl;
    background-color: rgba(58, 61, 66, 0.06);
    margin-top: 1em;
    padding: 0.25em 0.1em;
    border-radius: 0.6em;
}
.price-filter {
    flex-grow: 1;
    text-align: center;
    padding-block: 0.25em;
    border-radius: 0.6em;
    color: rgb(58, 61, 66);
    user-select: none;
}

.active {
    background-color: white;
    color: rgb(0, 184, 98);
}
</style>
