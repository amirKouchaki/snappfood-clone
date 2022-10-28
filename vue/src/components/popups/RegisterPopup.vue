<template>
    <nav v-popup-click-away="closePopup" class="popup-card" v-if="user">
        <router-link
            class="register-row profile-row"
            :to="{ name: 'dashboard' }"
            ><svg width="14" height="18" viewBox="0 0 14 18" fill="#3A3D42">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M9.49992 10.666C11.8011 10.666 13.6666 12.5315 13.6666 14.8327V16.4993C13.6666 16.9596 13.2935 17.3327 12.8333 17.3327C12.373 17.3327 11.9999 16.9596 11.9999 16.4993V14.8327C11.9999 13.452 10.8806 12.3327 9.49992 12.3327H4.49992C3.11921 12.3327 1.99992 13.452 1.99992 14.8327V16.4993C1.99992 16.9596 1.62682 17.3327 1.16659 17.3327C0.706348 17.3327 0.333252 16.9596 0.333252 16.4993V14.8327C0.333252 12.5315 2.19873 10.666 4.49992 10.666H9.49992ZM6.99992 0.666016C9.3011 0.666016 11.1666 2.5315 11.1666 4.83268C11.1666 7.13387 9.3011 8.99935 6.99992 8.99935C4.69873 8.99935 2.83325 7.13387 2.83325 4.83268C2.83325 2.5315 4.69873 0.666016 6.99992 0.666016ZM6.99992 2.33268C5.61921 2.33268 4.49992 3.45197 4.49992 4.83268C4.49992 6.21339 5.61921 7.33268 6.99992 7.33268C8.38063 7.33268 9.49992 6.21339 9.49992 4.83268C9.49992 3.45197 8.38063 2.33268 6.99992 2.33268Z"
                ></path>
            </svg>
            <div class="profile">
                <p class="name">{{ user.name }}</p>
                <p class="show-profile">مشاهده حساب کاربری</p>
            </div>
        </router-link>
        <router-link class="register-row wallet" :to="{ name: 'dashboard' }"
            ><div class="wallet-text">
                <svg
                    width="1.0625rem"
                    height="1rem"
                    viewBox="0 0 17 16"
                    fill="#676A70"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M13.8333 0.500977C14.75 0.500977 15.5 1.25098 15.5 2.16764V4.06764C15.9917 4.35931 16.3333 4.88431 16.3333 5.50098V10.501C16.3333 11.1176 15.9917 11.6426 15.5 11.9343V13.8343C15.5 14.751 14.75 15.501 13.8333 15.501L2.16667 15.501C1.24167 15.501 0.5 14.751 0.5 13.8343L0.5 2.16764C0.5 1.25098 1.24167 0.500977 2.16667 0.500977L13.8333 0.500977ZM13.8333 2.16764L2.16667 2.16764L2.16667 13.8343L13.8333 13.8343V12.1676H8.83333C7.91667 12.1676 7.16667 11.4176 7.16667 10.501L7.16667 5.50098C7.16667 4.58431 7.91667 3.83431 8.83333 3.83431L13.8333 3.83431V2.16764ZM14.6667 5.50098L8.83333 5.50098L8.83333 10.501H14.6667L14.6667 5.50098ZM11.3333 6.75098C12.0237 6.75098 12.5833 7.31062 12.5833 8.00098C12.5833 8.69133 12.0237 9.25098 11.3333 9.25098C10.643 9.25098 10.0833 8.69133 10.0833 8.00098C10.0833 7.31062 10.643 6.75098 11.3333 6.75098Z"
                    ></path>
                </svg>

                <span>کیف پول</span>
            </div>
            <div><span>0</span><span>تومان</span></div>
        </router-link>
        <router-link class="register-row" :to="{ name: 'dashboard' }"
            ><img src="https://snappfood.ir/static/images/referral-menu.svg" />
            <p>دعوت از دوستان</p></router-link
        >
        <router-link class="register-row" :to="{ name: 'dashboard' }"
            ><svg
                width="1.125rem"
                height="1.125rem"
                viewBox="0 0 18 18"
                fill="#676A70"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M7 16C7.55228 16 8 16.4477 8 17C8 17.5523 7.55228 18 7 18H3C1.34315 18 0 16.6569 0 15L0 3C0 1.34315 1.34315 0 3 0L7 0C7.55228 0 8 0.447715 8 1C8 1.55228 7.55228 2 7 2L3 2C2.44772 2 2 2.44772 2 3L2 15C2 15.5523 2.44772 16 3 16L7 16ZM14.5858 8L11.2929 4.70711C10.9024 4.31658 10.9024 3.68342 11.2929 3.29289C11.6834 2.90237 12.3166 2.90237 12.7071 3.29289L17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071C10.9024 14.3166 10.9024 13.6834 11.2929 13.2929L14.5858 10H6C5.44772 10 5 9.55228 5 9C5 8.44772 5.44772 8 6 8L14.5858 8Z"
                ></path>
            </svg>
            <p>خروج</p></router-link
        >
    </nav>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";
import axiosClient from "../../../axios";

const store = useStore();
const props = defineProps({ closePopup: Function });
const user = computed(() => store.getters.user);
console.log(user.value);
if (!user.value) store.dispatch("getUser");
</script>

<style lang="scss" scoped>
.popup-card {
    display: flex;
    flex-direction: column;
    position: absolute;
    left: 2em;
    top: 4em;
    max-width: 15em;
    width: 100%;
    background-color: white;
    direction: rtl;
    border-radius: 0.3em;
    box-shadow: rgba(58, 61, 66, 0.06) 0px 1px 0px,
        rgba(0, 0, 0, 0.3) 0px 8px 32px -16px;
}

.register-row {
    display: flex;
    justify-content: right;
    align-items: center;
    padding-block: 1em;
    padding-inline: 1em;
    gap: 1em;
    color: rgb(58, 61, 66);
    font-size: 1.1rem;
    transition: background-color 0.3s ease-in-out;
    border-radius: 0.5em;
    &:hover {
        background-color: rgba(58, 61, 66, 0.06);
    }
}

.profile-row {
    padding-block: 0.6em;
}

.show-profile {
    color: rgb(0, 184, 98);
    font-size: 0.95rem;
}

.name {
    font-family: "iran-sans-bold";
    font-weight: bold;
    font-size: 1rem;
}

.wallet {
    display: flex;
    justify-content: space-between;
}

.wallet-text {
    display: flex;
    align-items: center;
    gap: 1em;
}
</style>
