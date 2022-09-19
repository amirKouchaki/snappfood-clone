<template>
    <nav v-if="serviceList.length" class="service-list">
        <a v-for="service in serviceList" :key="service.caption">
            <figure>
                <img :src="serviceAssetLink(service.src)" alt="" />
                <figcaption class="service-caption">
                    {{ service.caption }}
                </figcaption>
            </figure>
        </a>
    </nav>
</template>

<script setup>
const serviceAssetLink = (file) => {
    const serviceAsset = "src/assets/images/service-list/";
    return serviceAsset.concat(file);
};
const serviceList = [
    { src: "restaurant.png", caption: "رستوران" },
    { src: "supermarket.png", caption: "سوپرمارکت" },
    { src: "cafe.png", caption: "کافه" },
    { src: "shirini.png", caption: "شیرینی" },
    { src: "noon.png", caption: "نون" },
    { src: "fruit.png", caption: "میوه" },
    { src: "protein.png", caption: "پروتئین" },
    { src: "bastani.png", caption: "ابمیوه بستنی" },
    { src: "ajil.png", caption: "آجیل" },
    { src: "etc.png", caption: "سایر" },
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
