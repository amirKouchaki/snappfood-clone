<template>
    <section class="popup">
        <slot :closePopup="closePopup"></slot>
    </section>
</template>

<script setup>
const emits = defineEmits(["closePopup"]);

const closePopup = () => {
    emits("closePopup");
};
</script>

<style lang="scss" scoped>
.popup {
    display: flex;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1000;
    background-color: rgba($color: #000000, $alpha: 0.35);
    grid-column: auto;
    user-select: none;
}
</style>
