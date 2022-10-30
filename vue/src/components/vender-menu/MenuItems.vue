<template>
    <div v-if="menu.length" class="menu-items">
        <section
            class="menu-item"
            v-for="menuCategory in menu"
            :key="menuCategory.id"
            :id="menuCategory.id"
        >
            <h2 class="menu-item-title">
                {{ menuCategory.name }}
            </h2>
            <div class="products">
                <article
                    class="product"
                    v-for="menuItem in menuCategory.menu_items"
                >
                    <section class="product-details">
                        <h3 class="product-title">{{ menuItem.title }}</h3>
                        <p class="product-description">
                            {{ menuItem.description }}
                        </p>
                    </section>
                    <img class="product-img" :src="menuItem.image" alt="" />
                    <div class="purchase">
                        <div class="final-price">
                            <span
                                class="discount-percent"
                                v-if="menuItem.discount"
                                >%{{ menuItem.discount }}</span
                            >
                            <div class="discounted-price">
                                <span
                                    class="before-discount"
                                    v-if="menuItem.discount"
                                    >{{ menuItem.price }}</span
                                >
                                <p class="price">
                                    <span>{{
                                        menuItem.price -
                                        calculateDiscountAmount(
                                            menuItem.price,
                                            menuItem.discount
                                        )
                                    }}</span
                                    ><span class="currency">تومان</span>
                                </p>
                            </div>
                        </div>
                        <button class="purchase-btn">افزودن</button>
                    </div>
                </article>
            </div>
        </section>
    </div>
</template>

<script setup>
import { computed } from "@vue/reactivity";
import { onMounted } from "vue";
import { activate } from "../../composables/activation";

const props = defineProps(["menu"]);
const emits = defineEmits(["activate", "deActivate"]);
const calculateDiscountAmount = (price, discount) =>
    Math.ceil((price * discount) / 100);
onMounted(() => {
    const sections = document.querySelectorAll("section[id]");
    window.addEventListener("scroll", navHighlighter);

    function navHighlighter() {
        let scrollY = window.pageYOffset;
        sections.forEach((current) => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 150;
            let sectionId = current.getAttribute("id");
            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                emits("activate", sectionId);
            } else {
                emits("deActivate", sectionId);
            }
        });
    }
});
</script>

<style lang="scss" scoped>
@use "../../abstracts" as *;
.menu-items {
    background-color: white;
    border: 1px solid rgb(235, 237, 240);
    border-radius: 0.5em;
}

.menu-item::before {
    display: block;
    content: " ";
    margin-top: -80px;
    height: 80px;
    visibility: hidden;
    pointer-events: none;
}

.menu-item-title {
    text-align: center;
    border-bottom: 1px solid rgb(235, 237, 240);
    color: rgb(83, 86, 92);
    font-size: 1.05rem;
    margin-top: 2em;
    padding-block: 0.6em;
}

.products {
    display: grid;
    direction: rtl;
    .product {
        min-height: 10em;
    }
}

.product {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-areas:
        " product-details product-img"
        "purchase purchase";
    padding: 0.7em 1em;
    border-bottom: 1px solid rgb(235, 237, 240);
    gap: 0.7em;

    &:nth-child(odd) {
        border-left: 1px solid rgb(235, 237, 240);
    }
}

.product-details {
    grid-area: product-details;
    align-self: center;
}

.product-img {
    max-width: 120px;
    width: 120px;
    height: 120px;
    border-radius: 0.55em;
    grid-area: product-img;
    justify-self: left;
    object-fit: cover;
    object-position: center;
}

.product-title {
    color: rgb(58, 61, 66);
    font-weight: normal;
    font-size: 1.2rem;
    font-family: "iran-sans-bold";
}

.product-description {
    color: rgb(166, 170, 173);
    display: -webkit-box;
    font-size: 0.95rem;
    overflow: hidden;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    -moz-box-orient: vertical;
    line-height: 1.3;
}

.purchase {
    display: flex;
    justify-content: space-between;
    align-items: center;
    grid-area: purchase;
    height: fit-content;
    margin-top: 1em;
    padding-block: 0.6em;
    width: calc(100% + 2em);
    margin-right: -1em;
    padding-inline: 1em;
    transition: background-color 0.25s ease-in-out;
    &:hover {
        background-color: rgb(249, 250, 251);

        .purchase-btn {
            color: white;
            background-color: rgb(255, 0, 166);
        }
    }
}

.purchase-btn {
    padding: 0.35em 2em;
    background-color: white;
    color: rgb(255, 0, 166);
    font-size: 1rem;
    border: 0.09375rem solid rgba(255, 0, 166, 0.06);
    border-radius: 2em;
    box-shadow: rgba(58, 61, 66, 0.06) 0px 1px 0px,
        rgba(0, 0, 0, 0.2) 0px 4px 16px -8px;
    transition: all 0.25s ease-in-out;
    font-weight: bold;
}

.currency {
    color: rgb(83, 86, 92);
}

.discount-percent {
    color: rgb(255, 0, 166);
    font-family: "iran-sans-bold";
    font-weight: bold;
    background-color: rgba(255, 0, 166, 0.06);
    padding: 0.15em 0.2em;
    border-radius: 0.2em;
    letter-spacing: 1.5px;
}
.before-discount {
    color: rgb(166, 170, 173);
    text-decoration: line-through;
    font-size: 0.9rem;
}

.final-price {
    display: flex;
    align-items: center;
    gap: 0.5em;
}

.price {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    font-size: 1.1rem;
    column-gap: 0.3em;
    margin-top: -0.35em;
}

@media (min-width: $md-view) {
    .products {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
