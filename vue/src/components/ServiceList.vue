<template>
    <nav v-if="serviceList.length" class="service-list">
        <router-link
            v-for="service in serviceList"
            :key="service.id"
            :to="{ name: 'dashboard', query: { type: service.id } }"
        >
            <figure>
                <img :src="serviceAssetLink(service.src)" alt="" />
                <figcaption class="service-caption">
                    {{ service.caption }}
                </figcaption>
            </figure>
        </router-link>
    </nav>
</template>

<script setup>
import { useRoute } from "vue-router";
const route = useRoute();
const serviceAssetLink = (file) => {
    const serviceAsset = "/src/assets/images/service-list/";
    return serviceAsset.concat(file);
};
const serviceList = [
    { id: 1, src: "restaurant.png", caption: "رستوران" },
    { id: 2, src: "supermarket.png", caption: "سوپرمارکت" },
    { id: 3, src: "cafe.png", caption: "کافه" },
    { id: 4, src: "shirini.png", caption: "شیرینی" },
    { id: 5, src: "noon.png", caption: "نون" },
    { id: 6, src: "fruit.png", caption: "میوه" },
    { id: 7, src: "protein.png", caption: "پروتئین" },
    { id: 8, src: "bastani.png", caption: "ابمیوه بستنی" },
    { id: 9, src: "ajil.png", caption: "آجیل" },
    { id: 10, src: "etc.png", caption: "سایر" },
];
</script>

<style lang="scss" scoped>
.service-list {
    position: relative;
    display: flex;
    flex-direction: row-reverse;
    gap: 2em;
    padding-block: 1.5em 1em;
    padding-inline: 2em;
    border-radius: 1.5em;
    z-index: 3;
    overflow: auto;

    a {
        flex-grow: 1;
        cursor: pointer;
    }

    img {
        display: block;
        width: 37px;
        height: 37px;
        margin: auto;
    }
}

.service-caption {
    margin-top: 1em;
    font-size: 0.9rem;
    color: rgb(83, 86, 92);
    white-space: nowrap;
}
</style>
