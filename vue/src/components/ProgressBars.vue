<template>
    <div
        class="rating-bars"
        v-if="
            userRatingStats?.length &&
            userRatingStats.length == statsColors.length
        "
        v-for="(stat, index) in userRatingStats"
        :key="index"
    >
        <star :count="Number(stat.user_rating)" />
        <progress-bar
            :p-width="Math.ceil((stat.star_count / sumStats.star_count) * 100)"
            :p-color="statsColors[index]"
        />
    </div>
</template>

<script setup>
import Star from "./Star.vue";
import ProgressBar from "./ProgressBar.vue";
import { computed } from "@vue/reactivity";
const statsColors = [
    "rgb(2, 137, 10)",
    "rgb(104, 195, 66)",
    "rgb(171, 232, 35)",
    "rgb(254, 157, 7)",
    "rgb(254, 57, 0)",
];
const props = defineProps(["rating_stats"]);
const sumStats = computed(() =>
    props.rating_stats?.find((stat) => stat.user_rating === "SUM")
);
const userRatingStats = computed(() =>
    props.rating_stats?.filter((stat) => stat.user_rating != "SUM")
);
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
