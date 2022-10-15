<template>
    <button
        v-if="showingSubCategory"
        class="categories-back-btn"
        @click="resetSelected(true)"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="11"
            height="12"
            viewBox="0 0 9 16"
            fill="#c2c3c3"
        >
            <path
                d="M0.294622 15.2946C-0.0946505 14.9053 -0.0949944 14.2743 0.293854 13.8846L6.17001 8L0.293852 2.11539C-0.0949964 1.72569 -0.0946506 1.09466 0.294622 0.705388C0.684195 0.315815 1.31582 0.315815 1.70539 0.705388L8.2929 7.2929C8.68342 7.68342 8.68342 8.31659 8.2929 8.70711L1.70539 15.2946C1.31582 15.6842 0.684195 15.6842 0.294622 15.2946Z"
            ></path></svg
        ><span class="back-btn-text">بازگشت</span>
    </button>
    <h2
        @click="resetSelected()"
        :class="{ selectedCategory: selectedCategory === -1 }"
        class="categories-heading"
    >
        همه {{ categoryHeader ?? " دسته بندی " }} ها
    </h2>
    <ul v-if="categories.length" class="categories">
        <li
            class="category"
            v-for="category in categoriesOnDisplay"
            :key="category.name"
            @click="selectCategory(category.id)"
            :class="{ selectedCategory: selectedCategory == category.id }"
        >
            <figure dir="rtl">
                <img :src="category.image" alt="" class="category-img" />
                <figcaption class="category-caption">
                    {{ category.name }}
                </figcaption>
            </figure>
            <svg
                v-if="!showingSubCategory && category.sub_categories.length"
                xmlns="http://www.w3.org/2000/svg"
                width="11"
                height="12"
                viewBox="0 0 9 16"
                fill="#c2c3c3"
                class="has-sub-category-icon"
            >
                <path
                    d="M8.70539 15.2946C9.09466 14.9053 9.095 14.2743 8.70615 13.8846L2.83 8L8.70615 2.11539C9.095 1.72569 9.09466 1.09466 8.70539 0.705388C8.31581 0.315815 7.68419 0.315815 7.29462 0.705388L0.707108 7.2929C0.316584 7.68342 0.316584 8.31659 0.707108 8.70711L7.29462 15.2946C7.68419 15.6842 8.31581 15.6842 8.70539 15.2946Z"
                ></path>
            </svg>
        </li>
    </ul>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { watch } from "vue";
import { useRoute, useRouter } from "vue-router";
import axiosClient from "../../../../axios";

//TODO: should remain on the same settings even on refresh
const props = defineProps({ categories: Array });
const categoriesOnDisplay = ref(props.categories);
const showingSubCategory = ref(false);
const selectedCategory = ref(-1);
const categoryHeader = ref(null);
const route = useRoute();
const router = useRouter();
const findCategory = (id) => {
    return props.categories.find((category) => {
        return category.id == id;
    });
};

const selectCategory = (id = null) => {
    if (!showingSubCategory.value) {
        if (id === null) id = route.query.category;
        router.push({
            query: Object.assign({}, route.query, { category: id }),
        });

        const category = findCategory(id);
        if (category?.sub_categories.length) {
            categoryHeader.value = category.name;
            showingSubCategory.value = true;
            categoriesOnDisplay.value = category.sub_categories;
            id = null;
        }
    }
    if (showingSubCategory.value) {
        if (id === null && route.query.subCategory)
            id = route.query.subCategory;
        else if (id !== null)
            router.push({
                query: Object.assign({}, route.query, { subCategory: id }),
            });
    }
    selectedCategory.value = id ?? -1;
};
selectCategory();
const resetSelected = async (goingBack = false) => {
    let query = Object.assign({}, route.query);
    if (goingBack) {
        categoryHeader.value = null;
        categoriesOnDisplay.value = props.categories;
        showingSubCategory.value = false;
        delete query.category;
    } else if (!showingSubCategory.value) {
        delete query.category;
    }
    delete query.subCategory;
    await router.push({
        query,
    });

    selectedCategory.value = -1;
};

watch(
    () => props.categories,
    (newCategories, previousCategories) => {
        categoriesOnDisplay.value = props.categories;
        showingSubCategory.value = false;
    }
);
</script>

<style lang="scss" scoped>
.selectedCategory {
    background-color: rgba(58, 61, 66, 0.06);
    font-weight: bold !important;
}
.categories-heading {
    direction: rtl;
    font-size: 1.1rem;
    padding: 0.55em 0.7em;
    border-radius: 0.5em;
    color: rgb(58, 61, 66);
    font-weight: normal;
    cursor: pointer;
}

.categories {
    margin-top: 0.4em;
    display: flex;
    flex-direction: column;
}
.category {
    display: flex;
    direction: rtl;
    align-items: center;
    justify-content: space-between;
    border-radius: 0.5em;
    padding-block: 0.5em;
    padding-inline: 0.4em 1em;
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

.categories-back-btn {
    background-color: transparent;
    direction: rtl;
    width: 100%;
    text-align: right;
    padding: 1em 1em;
    display: flex;
    align-items: center;
    gap: 1em;

    .back-btn-text {
        color: #3a3d42;
        font-size: 1.03rem;
    }
}
</style>
