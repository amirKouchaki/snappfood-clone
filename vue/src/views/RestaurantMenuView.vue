<template>
    <section class="container main-section">
        <aside class="e restaurant-info">restaurant-info</aside>
        <section class="e menu-items">menu-items</section>
        <aside class="e delivery">delivery</aside>
    </section>
</template>

<script setup></script>

<style lang="scss" scoped>
@use "../abstracts" as *;

.e:nth-child(1) {
    border: 2px solid blue;
}
.e:nth-child(2) {
    border: 2px solid black;
}
.e:nth-child(3) {
    border: 2px solid red;
}
.main-section {
    display: flex;
    align-content: stretch;
    gap: 2em;
    flex-wrap: wrap;

    & > * {
        flex: 1 1 30%;
        min-width: 19em;
    }
}

@media (min-width: $sm-view) {
    .main-section {
        grid-template-columns: repeat(2, 1fr);
    }

    .restaurant-info {
        grid-column: span 2;
    }
}
</style>
