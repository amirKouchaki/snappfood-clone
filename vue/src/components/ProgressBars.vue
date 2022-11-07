<template>
    <div class="rating-bars">
        <star :count="5" />
        <progress-bar p-width="50" p-color="rgb(2, 137, 10)" />
    </div>
    <div class="rating-bars">
        <star :count="4" />
        <progress-bar p-width="30" p-color="rgb(104, 195, 66)" />
    </div>
    <div class="rating-bars">
        <star :count="3" />
        <progress-bar p-width="40" p-color="rgb(171, 232, 35)" />
    </div>
    <div class="rating-bars">
        <star :count="2" />
        <progress-bar p-width="100" p-color="rgb(254, 157, 7)" />
    </div>
    <div class="rating-bars">
        <star :count="1" />
        <progress-bar p-width="12" p-color="rgb(254, 57, 0)" />
    </div>
</template>

<script setup>
import Star from "./Star.vue";
import ProgressBar from "./ProgressBar.vue";
</script>

<style lang="scss" scoped>
.rating-counts {
    font-size: 0.5rem;
}

.rating-bars {
    display: grid;
    grid-template-columns: 17% calc(83% - 1em);
    align-items: center;
    gap: 1em;
    &:not(:last-child) {
        margin-bottom: 0.45em;
    }
}
</style>
