<template>
    <div class="progress">
        <div
            class="bar"
            :style="{ width: pWidth + '%', backgroundColor: pColor }"
        ></div>
    </div>
</template>

<script setup>
const props = defineProps({ pWidth: Number, pColor: String });
</script>

<style lang="scss" scoped>
.progress {
    width: 100%;
    height: 2px;
    overflow: hidden;
    background: #e5e5e5;
    border-radius: 6px;
}

.bar {
    position: relative;
    min-width: 1%;
    height: 100%;
    background: cornflowerblue;
}
</style>
