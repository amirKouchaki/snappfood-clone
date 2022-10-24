<template>
    <section class="main-section" v-if="data">
        <div class="container">
            <div class="menu">
                <restaurant-info
                    :vender="data.vender"
                    :menu="data.menus"
                    class="stick-to-top restaurant-info"
                />
                <menu-items
                    @activate="activate"
                    @deActivate="deActivate"
                    :menu="data.menus"
                    class="menu-items"
                />
            </div>
            <delivery
                :delivery-fee="data.vender.deliveryFee"
                class="stick-to-top delivery"
            />
        </div>
    </section>
    <button @click="onLci()">hello</button>
</template>

<script setup>
import RestaurantInfo from "../components/restaurant-menu/RestaurantInfo.vue";
import MenuItems from "../components/restaurant-menu/MenuItems.vue";
import Delivery from "../components/restaurant-menu/Delivery.vue";
import { onMounted, ref } from "vue";

const data = ref(null);
const fetchData = async () => {
    const res = await fetch("/src/database/data.json");
    const json = await res.json();
    data.value = json.data;
};

fetchData();

const activate = (id) => {
    document.getElementById(`scrollable${id}`).classList.add("active");
};
const deActivate = (id) => {
    document.getElementById(`scrollable${id}`).classList.remove("active");
};
</script>

<style lang="scss" scoped>
@use "../abstracts" as *;

.main-section {
    background-color: rgb(249, 250, 251);
    .container {
        display: grid;
        gap: 1.5em;
        padding-top: 2em;
        grid-template-columns: repeat(4, 1fr);
        grid-auto-columns: auto;
        grid-template-areas:
            "menu menu menu menu"
            "delivery delivery delivery delivery";

        & > * {
            height: fit-content;
        }
    }
}

.menu {
    grid-area: menu;
    display: grid;
    gap: 1.5em;
    grid-template-columns: subgrid;
    grid-auto-rows: min-content;
    grid-template-areas:
        "res-info res-info res-info res-info"
        "menu-items menu-items menu-items menu-items";
}
.restaurant-info {
    grid-area: res-info;
    min-width: 10em;
    height: fit-content;
}
.menu-items {
    grid-area: menu-items;
}
.delivery {
    grid-area: delivery;
}
@media (min-width: $x-sm-view) {
    .main-section .container {
        grid-template-areas:
            "menu menu menu menu"
            "delivery delivery delivery delivery";
    }

    .menu {
        grid-template-areas: "menu-items menu-items res-info res-info";
    }

    .restaurant-info {
        position: sticky;
        top: 6em;
    }

    .delivery {
        position: sticky;
        top: 6em;
    }
}

@media (min-width: $md-view) {
    .main-section .container {
        grid-template-areas: "delivery menu menu menu";
    }

    .menu-items {
        grid-template-areas: "menu-items menu-items res-info";
    }
}
</style>
