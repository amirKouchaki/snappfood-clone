<template>
    <section class="vender-cards">
        <vender-card
            v-for="vender in venders"
            :vender="vender"
            :key="vender.id"
        />
    </section>
</template>

<script setup>
import VenderCard from "../VenderCard.vue";

const props = defineProps(["venders"]);
</script>

<style lang="scss" scoped>
@use "../../abstracts" as *;
// move other media queries to the top of the page
@media (min-width: $md-view) {
    .vender-cards {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: $lg-view) {
    .vender-cards {
        grid-template-columns: repeat(3, 1fr);
    }
}
.vender-cards {
    display: grid;
    align-items: stretch;
    gap: 2em;
    direction: rtl;
    flex-grow: 10;
}
</style>
