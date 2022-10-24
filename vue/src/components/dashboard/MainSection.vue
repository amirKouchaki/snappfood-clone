<template>
    <section class="main-section container">
        <loading v-if="vendersLoading" />
        <vender-cards v-else :venders="venders" />

        <aside class="filters">
            <div v-if="categories.length" class="aside-card">
                <category-filter :categories="categories" />
            </div>
            <div class="aside-card">
                <h2 class="price-filter-heading">کلاس قیمتی</h2>
                <price-filter />
            </div>
            <div class="aside-card">
                <special-filter />
            </div>
        </aside>
    </section>
</template>

<script setup>
import PriceFilter from "./filters/PriceFilter.vue";
import SpecialFilter from "./filters/SpecialFilter.vue";
import ServiceList from "../ServiceList.vue";
import { watch } from "@vue/runtime-core";
import VenderCards from "./VenderCards.vue";
import { ref } from "@vue/reactivity";
import axiosClient from "../../../axios";
import { useRoute } from "vue-router";
import Loading from "../Loading.vue";
import CategoryFilter from "./filters/categoryFilter.vue";
const route = useRoute();
const categories = ref([]);

const fetchCategories = async () => {
    const res = await axiosClient.get("api/categories", {
        params: { type: route.query.type },
    });
    categories.value = res.data.categories;
    console.log(res.data);
};

fetchCategories();

const venders = ref({});
const vendersLoading = ref(true);
const fetchVender = async () => {
    vendersLoading.value = true;
    const res = await axiosClient.get("api/venders", { params: route.query });
    vendersLoading.value = false;
    venders.value = res.data.venders;
    console.log(res.data);
};
fetchVender(route.query);

watch(
    () => route.query,
    (toQuery, previousQuery) => {
        if (toQuery.type !== previousQuery.type) fetchCategories();
        fetchVender();
    }
);
</script>

<style lang="scss" scoped>
@use "../../abstracts" as *;
.main-section {
    margin-top: 5em;
    display: flex;
    gap: 1em;
}

.filters {
    position: sticky;
    top: 6em;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    gap: 0.6em;
    height: fit-content;
    min-width: 20em;
}

.aside-card {
    background-color: white;
    border: 1px solid rgba(58, 61, 66, 0.06);
    box-shadow: rgba(58, 61, 66, 0.06) 0px 1px 0px,
        rgba(0, 0, 0, 0.05) 0px 2px 8px -2px;
    padding: 1em 1.5em;
    border-radius: 0.7em;
}

.price-filter-heading {
    direction: rtl;
    font-weight: normal;
    color: rgb(58, 61, 66);
    font-size: 0.92rem;
}

@media (max-width: $sm-view) {
    .main-section {
        flex-direction: column-reverse;
        padding: 1.5em;
        margin-top: unset;
    }

    .filters {
        position: static;
        min-width: unset;
    }
}
</style>
