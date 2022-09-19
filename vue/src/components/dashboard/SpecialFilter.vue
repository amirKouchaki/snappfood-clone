<template>
    <section class="special-filters" v-if="specialFilters.length">
        <div
            class="special-filter"
            v-for="(specialFilter, index) in specialFilters"
            :key="index"
            :class="{ active: specialFilter.isActive }"
        >
            <div class="special-filter-wrapper">
                <p class="special-filter-text">{{ specialFilter.text }}</p>
                <span
                    @click="activation(index)"
                    class="special-filter-activation"
                ></span>
            </div>
            <hr v-if="specialFilters.length - 1 !== index" />
        </div>
    </section>
</template>

<script setup>
import { ref } from "@vue/reactivity";

const activation = (index) => {
    if (specialFilters.value[index].isActive)
        specialFilters.value[index].isActive = false;
    else specialFilters.value[index].isActive = true;
};

const specialFilters = ref([
    { text: "دارای کوپن", isActive: false },
    { text: "دارای تخفیف", isActive: false },
    { text: "اسنپ‌اکسپرس", isActive: false },
    { text: "رستوران‌های به صرفه", isActive: false },
]);
</script>

<style lang="scss" scoped>
.special-filter {
    direction: rtl;
}

.special-filter-wrapper {
    padding-block: 1em;
    display: flex;
    justify-content: space-between;
}
.special-filter-activation {
    position: relative;
    display: inline-block;
    width: 40px;
    aspect-ratio: 1.7;
    background-color: rgba(58, 61, 66, 0.06);
    border-radius: 0.7em;
    user-select: none;
    cursor: pointer;
    transition: background-color 500ms ease-in-out;
    &::after {
        content: "";
        position: absolute;
        top: 2.1px;
        right: 2.3px;
        width: 20px;
        aspect-ratio: 1;
        border-radius: 50%;
        background-color: white;
    }
}
.active {
    .special-filter-activation {
        background-color: rgb(0, 184, 98);
        &::after {
            right: unset;
            left: 2.3px;
        }
    }

    special-filter {
    }
}
.special-filter-text {
    color: rgb(58, 61, 66);
    font-size: 1.1rem;
}
</style>
