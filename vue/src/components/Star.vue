<template>
    <div class="stars">
        <svg
            :viewBox="`0 0 ${box} ${box}`"
            :fill="sColor"
            :style="{
                minWidth: box + 'px',
                minHeight: box + 'px',
                width: box + 'px',
                height: box + 'px',
                scale: sScale,
            }"
            v-for="(i, index) in count"
            :key="index"
        >
            <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M5.99984 9.62097L2.42572 11.5L3.10832 7.52016L0.216797 4.70163L4.21278 4.12098L5.99984 0.5L7.7869 4.12098L11.7829 4.70163L8.89136 7.52016L9.57395 11.5L5.99984 9.62097Z"
            ></path>
        </svg>
    </div>
</template>

<script setup>
const props = defineProps({
    count: { type: Number, default: 1 },
    sColor: { type: String, default: "rgb(237, 239, 240)" },
    box: { type: Number, default: 12 },
    sScale: String,
});
</script>

<style lang="scss" scoped>
.stars {
    display: flex;
    gap: 0.5em;
    align-items: center;
    justify-content: left;
}
</style>
