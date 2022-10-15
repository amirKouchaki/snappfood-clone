<template>
    <div class="popup-card search-bar" ref="modal">
        <input
            :value="searchInput"
            ref="input"
            class="search-input"
            type="text"
            @input="$emit('update:searchInput', $event.target.value)"
            @keydown.enter.prevent="filterBySearch()"
        />
        <svg
            class="search-icon"
            width="17"
            height="17"
            viewBox="0 0 17 17"
            fill="#3A3D42"
        >
            <path
                d="M7.75008 0.666016C11.6621 0.666016 14.8334 3.83733 14.8334 7.74935C14.8334 9.40479 14.2655 10.9276 13.3139 12.1336L16.5477 15.3684C16.8731 15.6939 16.8731 16.2215 16.5477 16.5469C16.2222 16.8724 15.6946 16.8724 15.3692 16.5469L12.1343 13.3132C10.9283 14.2648 9.40552 14.8327 7.75008 14.8327C3.83806 14.8327 0.666748 11.6614 0.666748 7.74935C0.666748 3.83733 3.83806 0.666016 7.75008 0.666016ZM7.75008 2.33268C4.75854 2.33268 2.33341 4.75781 2.33341 7.74935C2.33341 10.7409 4.75854 13.166 7.75008 13.166C10.7416 13.166 13.1667 10.7409 13.1667 7.74935C13.1667 4.75781 10.7416 2.33268 7.75008 2.33268Z"
            ></path>
        </svg>
    </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import { useRoute, useRouter } from "vue-router";

const props = defineProps({
    closePopup: Function,
    searchInput: String,
});
const emits = defineEmits(["update:searchInput"]);
const router = useRouter();
const route = useRoute();
const modal = ref("");
const input = ref("");

const filterBySearch = async (event) => {
    let query = { type: route.query.type, search: props.searchInput };
    if (props.searchInput == "") delete query.search;
    await router.push({
        query: Object.assign({}, query),
    });
    props.closePopup();
};

onMounted(() => {
    input.value.focus();
});

document.addEventListener("click", (e) => {
    const popup = document.getElementsByClassName("popup")[0];
    if (
        modal.value !== null &&
        modal.value.contains(e.target) === false &&
        e.target === popup
    ) {
        props.closePopup();
    }
});
</script>

<style lang="scss" scoped>
@use "../../abstracts" as *;
.popup-card.search-bar {
    display: flex;
    margin-top: 0.78em;
    background-color: rgba(white, 1);
    animation: appear 0.3s both;
}

.search-bar {
    border: 0.7px solid #3a3d42;
}

.search-input {
    display: block;
    outline: none;
    border: none;
    width: 100%;
    padding: 0.15em 0.7em;
    font-size: 1rem;
    direction: rtl;
}

.search-icon {
    scale: 1.1;
}

@keyframes appear {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 100%;
    }
}
</style>
