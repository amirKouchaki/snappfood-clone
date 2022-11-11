<template>
    <section class="main-section" v-if="vender">
        <div class="container">
            <div class="menu">
                <vender-info
                    :vender="vender"
                    class="stick-to-top vender-info"
                />
                <menu-items
                    @activate="activate"
                    @deActivate="deActivate"
                    :menu="vender.menu_categories"
                    class="menu-items"
                />
            </div>
            <delivery
                :delivery-fee="vender.delivery_fee"
                class="stick-to-top delivery"
            />
        </div>
    </section>
</template>

<script setup>
import venderInfo from "../components/vender-menu/VenderInfo.vue";
import MenuItems from "../components/vender-menu/MenuItems.vue";
import Delivery from "../components/vender-menu/Delivery.vue";
import { ref } from "vue";
import axiosClient from "../../axios";
import { useRoute } from "vue-router";

const route = useRoute();
const vender = ref(null);
const fetchData = async () => {
    vender.value = await (
        await axiosClient.get(`api/venders/${route.params.vender}`)
    ).data;
    console.log(vender.value);
};

fetchData();

const activate = (id) =>
    document.getElementById(`scrollable${id}`).classList.add("active");

const deActivate = (id) =>
    document.getElementById(`scrollable${id}`).classList.remove("active");
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
        "ven-info ven-info ven-info ven-info"
        "menu-items menu-items menu-items menu-items";
}
.vender-info {
    grid-area: ven-info;
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
        grid-template-areas: "menu-items menu-items ven-info ven-info";
    }

    .vender-info {
        position: sticky;
        top: 6em;
        z-index: 5;
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
        grid-template-areas: "menu-items menu-items ven-info";
    }
}
</style>
