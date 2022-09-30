<template>
    <main-section />
    <button @click="logout">logout</button>
</template>

<script setup>
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import MainSection from "../components/dashboard/MainSection.vue";
const router = useRouter();
const store = useStore();
const logout = () => {
    store.commit("logout");
    router.push({ name: "landingPage" });
};
</script>

<style lang="scss" scoped></style>
