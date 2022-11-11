<template>
    <div class="card">
        <section v-for="weekDay in schedule" :key="weekDay.id" class="week-day">
            <h3 class="title">{{ weekDay.name }}</h3>
            <p class="open-hours">
                <span>{{ convertTime(weekDay.work_hours.closes_at) }}</span>
                <span>{{ convertTime(weekDay.work_hours.opens_at) }}</span>
            </p>
        </section>
    </div>
</template>

<script setup>
import moment from "moment";
import { convertTime } from "../composables/convertTime";
const props = defineProps(["schedule"]);
</script>

<style lang="scss" scoped>
.card {
    position: relative;
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 0;
    border-radius: 0.7em;
    transition: height 0.2s ease-in-out;
    overflow-x: scroll;
}

.show {
    border: 0.0625rem solid rgb(235, 237, 240);
    margin-block: 1em 1.5em;
    height: 4.5em;
}

.week-day {
    text-align: center;
}

.title {
    font-weight: normal;
    font-size: 0.93rem;
    color: rgb(83, 86, 92);
}

.open-hours {
    display: flex;
    font-weight: bold;
    font-family: "iran-sans-bold";
    font-size: 1rem;
    gap: 1em;
    color: rgb(58, 61, 66);
}
</style>
