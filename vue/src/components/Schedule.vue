<template>
    <div class="card">
        <section v-for="weekDay in weekDays" :key="weekDay" class="week-day">
            <h3 class="title">{{ weekDay.day }}</h3>
            <p class="open-hours">
                <span>{{ weekDay.start }}</span
                ><span>{{ weekDay.finish }}</span>
            </p>
        </section>
    </div>
</template>

<script setup>
const weekDays = [
    { day: "شنبه", start: "۱۱:۰۰", finish: "۲۳:۴۵" },
    { day: "یکشنبه", start: "۱۱:۰۰", finish: "۲۳:۴۵" },
    { day: "دوشنبه", start: "۱۱:۰۰", finish: "۲۳:۴۵" },
    { day: "سه‌شنبه", start: "۱۱:۰۰", finish: "۲۳:۴۵" },
    { day: "چهارشنبه", start: "۱۱:۰۰", finish: "۲۳:۴۵" },
    { day: "پنجشنبه", start: "۱۱:۰۰", finish: "۲۳:۴۵" },
    { day: "جمعه", start: "۱۱:۰۰", finish: "۲۳:۴۵" },
];
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
    font-size: 0.9rem;
    color: rgb(83, 86, 92);
}

.open-hours {
    display: flex;
    font-weight: bold;
    font-size: 0.83rem;
    gap: 1em;
    color: rgb(58, 61, 66);
}
</style>
