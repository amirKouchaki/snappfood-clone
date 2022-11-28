<template>
    <service-list />
    <main-section />
</template>

<script setup>
import ServiceList from "../components/ServiceList.vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import MainSection from "../components/dashboard/MainSection.vue";
const router = useRouter();
const store = useStore();
</script>

<style lang="scss" scoped></style>
