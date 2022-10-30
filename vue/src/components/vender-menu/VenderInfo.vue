<template>
    <aside>
        <header class="vender-header">
            <div class="featured-wrapper">
                <img class="featured-img" :src="vender.title_image" alt="" />
            </div>
            <div class="vender-info-wrapper">
                <div class="comments-count-rating">
                    <span class="comments-count"
                        >(نظر{{ vender.total_ratings }})</span
                    >
                    <span class="rating">{{ vender.average_ratings }}</span>
                    <svg
                        width="12"
                        height="12"
                        viewBox="0 0 12 12"
                        fill="#FFCE00"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M5.99984 9.62097L2.42572 11.5L3.10832 7.52016L0.216797 4.70163L4.21278 4.12098L5.99984 0.5L7.7869 4.12098L11.7829 4.70163L8.89136 7.52016L9.57395 11.5L5.99984 9.62097Z"
                        ></path>
                    </svg>
                </div>

                <h2 class="vender-title">{{ vender.title }}</h2>
            </div>
        </header>
        <button class="reviews-and-comments">
            اطلاعات و نظرات
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="1.0625rem"
                height="1.0625rem"
                viewBox="0 0 20 20"
                fill="#D2D4D6"
            >
                <path
                    d="M9.00033 0.666016C13.5952 0.666016 17.3337 4.40435 17.3337 8.99935C17.3337 13.5944 13.5953 17.3327 9.00033 17.3327C4.40532 17.3327 0.666992 13.5944 0.666992 8.99935C0.666992 4.40435 4.40532 0.666016 9.00033 0.666016ZM9.00033 2.33268C5.32413 2.33268 2.33366 5.32751 2.33366 8.99935C2.33366 12.6712 5.32413 15.666 9.00033 15.666C12.6765 15.666 15.667 12.6712 15.667 8.99935C15.667 5.32755 12.6765 2.33268 9.00033 2.33268ZM8.17072 8.99242C8.17072 8.53602 8.5407 8.16604 8.9971 8.16602H9.011C9.4674 8.16603 9.83739 8.53602 9.83739 8.99242V11.9866C9.83739 12.0849 9.83722 12.1999 9.83689 12.3316C9.83572 12.7928 9.46152 13.166 9.00033 13.166C8.54196 13.166 8.17039 12.7944 8.17039 12.3361C8.17039 12.3355 8.17039 12.335 8.17038 12.3345C8.17061 12.217 8.17072 12.101 8.17072 11.9866V8.99242ZM7.95866 5.89252C7.95866 5.31723 8.42102 4.85086 9.00033 4.85086C9.57562 4.85086 10.042 5.31322 10.042 5.89252C10.042 6.46782 9.57963 6.93419 9.00033 6.93419C8.42503 6.93419 7.95866 6.47183 7.95866 5.89252Z"
                    fill="#00D170"
                ></path>
            </svg>
        </button>

        <nav class="menu-items" v-if="vender.menu_categories.length">
            <a
                class="menu-item"
                v-for="menuCategory in vender.menu_categories"
                :key="menuCategory.id"
                :href="'#' + menuCategory.id"
                :id="'scrollable' + menuCategory.id"
            >
                {{ menuCategory.name }}
            </a>
        </nav>
    </aside>
</template>

<script setup>
import { computed } from "@vue/runtime-core";

const props = defineProps(["vender"]);
</script>

<style lang="scss" scoped>
@use "../../abstracts" as *;
.vender-header {
    display: flex;
    flex-direction: row-reverse;
    justify-content: right;
    align-items: center;
    gap: 0.8em;
}
.featured-wrapper {
    box-shadow: rgba(58, 61, 66, 0.06) 0px 1px 0px,
        rgba(0, 0, 0, 0.3) 0px 8px 32px -16px;
    border: 4px solid white;
    border-radius: 0.8em;
    max-width: 90px;
    min-width: 90px;
    width: 90px;
    background-color: white;
    aspect-ratio: 1;
    overflow: hidden;
}
.featured-img {
    width: 100%;
    height: 100%;
    border: 1.5px solid rgba(58, 61, 66, 0.06);
    object-fit: cover;
    object-position: center;
}

.vender-info-wrapper {
    display: flex;
    flex-direction: column;
    gap: 1em;
    width: 100%;
    text-align: right;
}

.comments-count-rating {
    display: flex;
    gap: 0.4em;
    justify-content: right;
    align-items: center;
    font-size: 0.85rem;
}

.rating {
    font-weight: bold;
    color: rgb(58, 61, 66);
}

.comments-count {
    color: rgb(166, 170, 173);
}

.vender-title {
    color: rgb(58, 61, 66);
    font-size: 1.25rem;
    font-family: "iran-sans-bold";
    text-overflow: ellipsis;
    width: clamp(70%, 1em + 10vw, 90%);
    overflow: hidden;
    white-space: nowrap;
    margin-left: auto;
    direction: rtl;
}

.reviews-and-comments {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5em;
    color: rgb(0, 184, 98);
    background-color: white;
    width: 95%;
    font-size: 1.1rem;
    margin-block: 1em;
    padding: 0.4em 1em;
    border-radius: 1em;
    border: 0.09375rem solid rgba(0, 133, 66, 0.06);
    box-shadow: rgba(58, 61, 66, 0.06) 0px 1px 0px,
        rgba(0, 0, 0, 0.2) 0px 4px 16px -8px;
    margin-inline: auto;
}

.menu-items {
    display: flex;
    flex-direction: column;
    gap: 0.6em;
    min-height: 7em;
    height: 60vh;
    overflow: auto;
    text-align: right;
}

.menu-item {
    display: block;
    padding-inline: 1em;
    color: rgb(83, 86, 92);
    font-size: 1.1rem;
}

.active {
    font-weight: bold;
    border-right: 2px solid rgb(83, 86, 92);
    border-left: unset;
}

@media (min-width: $md-view) {
    .menu-items {
        text-align: left;
    }

    .active {
        border-left: 2px solid rgb(83, 86, 92);
        border-right: unset;
    }
}
</style>
