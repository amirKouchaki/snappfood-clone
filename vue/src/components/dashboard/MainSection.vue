<template>
    <section class="main-section container">
        <vender-cards :venders="venders" />
        <aside class="filters">
            <div class="aside-card">
                <h2 class="categories-heading">همه دسته‌بندی‌ها</h2>
                <ul v-if="categories.length" class="categories">
                    <li
                        class="category"
                        v-for="category in categories"
                        :key="category.caption"
                    >
                        <figure dir="rtl">
                            <img
                                :src="categoriesAssetsLink(category.src)"
                                alt=""
                                class="category-img"
                            />
                            <figcaption class="category-caption">
                                {{ category.caption }}
                            </figcaption>
                        </figure>
                    </li>
                </ul>
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
import PriceFilter from "./PriceFilter.vue";
import SpecialFilter from "./SpecialFilter.vue";
import VenderCards from "./VenderCards.vue";
import { ref } from "@vue/reactivity";
import axiosClient from "../../../axios";
const categoriesAssetsLink = (file) => {
    const categories = "src/assets/images/categories/";
    return categories + file;
};
const categories = [
    { src: "pizza.png", caption: "فست فود" },
    { src: "aash.png", caption: "ایرانی" },
    { src: "kabab.png", caption: "کباب" },
    { src: "salad.png", caption: "سالاد" },
    { src: "daryayi.png", caption: "دریایی" },
    { src: "sooshi.png", caption: "بین‌الملل" },
];

const venders = ref({});
const fetchVender = async () => {
    const res = await axiosClient.get("api/venders");
    venders.value = res.data.venders;
    console.log(res.data.venders);
};
fetchVender();
</script>

<style lang="scss" scoped>
.main-section {
    margin-top: 5em;
    display: flex;
    gap: 1em;
}

.filters {
    position: sticky;
    top: 13em;
    display: flex;
    flex-direction: column;
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
.categories-heading {
    direction: rtl;
    background-color: rgba(58, 61, 66, 0.06);
    font-size: 1.15rem;
    padding: 0.6em 0.5em;
    border-radius: 0.5em;
    color: rgb(58, 61, 66);
}

.categories {
    margin-top: 1em;
    display: flex;
    flex-direction: column;
    gap: 1.5em;
}
.category {
    figure {
        display: flex;
        align-items: center;
        gap: 1em;
        text-align: right;
    }
    .category-img {
        width: 35px;
        aspect-ratio: 1;
    }

    .category-caption {
        color: rgb(58, 61, 66);
        font-size: 1.1rem;
    }
}

.price-filter-heading {
    direction: rtl;
    font-weight: normal;
    color: rgb(58, 61, 66);
    font-size: 0.92rem;
}

@media (max-width: 42em) {
    .main-section {
        flex-direction: column-reverse;
        padding: 1.5em 3em;
        margin-top: unset;
    }

    .filters {
        position: static;
    }
}
</style>
