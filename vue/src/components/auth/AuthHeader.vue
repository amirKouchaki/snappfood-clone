<template>
    <header>
        <div class="header-container">
            <div class="reg-orders-container">
                <button class="orders" @click="openOrdersPopup()">
                    <span>سفارش ها</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="1.25rem"
                        height="1.25rem"
                        fill="none"
                        viewBox="0 0 20 20"
                    >
                        <path
                            fill="#3A3D42"
                            fill-rule="evenodd"
                            d="M5.833 2.5c-.92 0-1.666.746-1.666 1.667v13.01l1.403-.468a.833.833 0 01.573.017l1.774.71 1.774-.71c.198-.08.42-.08.618 0l1.774.71 1.774-.71a.833.833 0 01.573-.017l1.403.468V4.167c0-.92-.746-1.667-1.666-1.667H5.833zM2.5 4.167A3.333 3.333 0 015.833.833h8.334A3.333 3.333 0 0117.5 4.167v14.166a.833.833 0 01-1.097.79l-2.21-.736-1.8.72a.833.833 0 01-.62 0L10 18.397l-1.774.71a.833.833 0 01-.619 0l-1.8-.72-2.21.737a.833.833 0 01-1.097-.79V4.166zm4.167 1.666c0-.46.373-.833.833-.833h5a.833.833 0 010 1.667h-5a.833.833 0 01-.833-.834zm0 4.167c0-.46.373-.833.833-.833h5a.833.833 0 010 1.666h-5A.833.833 0 016.667 10zm0 4.167c0-.46.373-.834.833-.834h5a.833.833 0 010 1.667h-5a.833.833 0 01-.833-.833z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
                <svg
                    @click="openRegisterPopup()"
                    class="register-icon"
                    width="14"
                    height="18"
                    viewBox="0 0 1418"
                    fill="rgb(58, 61, 66)"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9.49992 10.666C11.8011 10.666 13.6666 12.5315 13.6666 14.8327V16.4993C13.6666 16.9596 13.2935 17.3327 12.8333 17.3327C12.373 17.3327 11.9999 16.9596 11.9999 16.4993V14.8327C11.9999 13.452 10.8806 12.3327 9.49992 12.3327H4.49992C3.11921 12.3327 1.99992 13.452 1.99992 14.8327V16.4993C1.99992 16.9596 1.62682 17.3327 1.16659 17.3327C0.706348 17.3327 0.333252 16.9596 0.333252 16.4993V14.8327C0.333252 12.5315 2.19873 10.666 4.49992 10.666H9.49992ZM6.99992 0.666016C9.3011 0.666016 11.1666 2.5315 11.1666 4.83268C11.1666 7.13387 9.3011 8.99935 6.99992 8.99935C4.69873 8.99935 2.83325 7.13387 2.83325 4.83268C2.83325 2.5315 4.69873 0.666016 6.99992 0.666016ZM6.99992 2.33268C5.61921 2.33268 4.49992 3.45197 4.49992 4.83268C4.49992 6.21339 5.61921 7.33268 6.99992 7.33268C8.38063 7.33268 9.49992 6.21339 9.49992 4.83268C9.49992 3.45197 8.38063 2.33268 6.99992 2.33268Z"
                    ></path>
                </svg>
                <svg
                    class="mini-search-logo search-icon"
                    width="17"
                    height="17"
                    viewBox="0 0 17 17"
                    fill="#A6AAAD"
                    @click="openSearchPopup()"
                >
                    <path
                        d="M7.75008 0.666016C11.6621 0.666016 14.8334 3.83733 14.8334 7.74935C14.8334 9.40479 14.2655 10.9276 13.3139 12.1336L16.5477 15.3684C16.8731 15.6939 16.8731 16.2215 16.5477 16.5469C16.2222 16.8724 15.6946 16.8724 15.3692 16.5469L12.1343 13.3132C10.9283 14.2648 9.40552 14.8327 7.75008 14.8327C3.83806 14.8327 0.666748 11.6614 0.666748 7.74935C0.666748 3.83733 3.83806 0.666016 7.75008 0.666016ZM7.75008 2.33268C4.75854 2.33268 2.33341 4.75781 2.33341 7.74935C2.33341 10.7409 4.75854 13.166 7.75008 13.166C10.7416 13.166 13.1667 10.7409 13.1667 7.74935C13.1667 4.75781 10.7416 2.33268 7.75008 2.33268Z"
                    ></path>
                </svg>
            </div>
            <div dir="rtl" class="search-bar" @click="openSearchPopup()">
                <svg
                    class="search-icon"
                    width="17"
                    height="17"
                    viewBox="0 0 17 17"
                    fill="#A6AAAD"
                >
                    <path
                        d="M7.75008 0.666016C11.6621 0.666016 14.8334 3.83733 14.8334 7.74935C14.8334 9.40479 14.2655 10.9276 13.3139 12.1336L16.5477 15.3684C16.8731 15.6939 16.8731 16.2215 16.5477 16.5469C16.2222 16.8724 15.6946 16.8724 15.3692 16.5469L12.1343 13.3132C10.9283 14.2648 9.40552 14.8327 7.75008 14.8327C3.83806 14.8327 0.666748 11.6614 0.666748 7.74935C0.666748 3.83733 3.83806 0.666016 7.75008 0.666016ZM7.75008 2.33268C4.75854 2.33268 2.33341 4.75781 2.33341 7.74935C2.33341 10.7409 4.75854 13.166 7.75008 13.166C10.7416 13.166 13.1667 10.7409 13.1667 7.74935C13.1667 4.75781 10.7416 2.33268 7.75008 2.33268Z"
                    ></path>
                </svg>
                <p class="search-text">
                    {{
                        searchInput == "" ? "جست‌وجو در اسنپ‌فود" : searchInput
                    }}
                </p>
            </div>
            <router-link :to="{ name: 'landingPage' }"
                ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="68"
                    height="34"
                    viewBox="0 0 56 28"
                    fill="none"
                    role="button"
                    tabindex="0"
                    class="main-logo"
                >
                    <path
                        d="M51.2573 12.569C50.09 12.5709 49.4104 11.7833 49.4087 10.758C49.407 9.76415 50.084 8.92704 51.2513 8.92505C52.4186 8.92316 53.0983 9.75807 53.0999 10.7518C53.1016 11.7772 52.4246 12.567 51.2573 12.569Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        d="M51.3587 1.0703H51.5032V0.407269H51.2702L51.1208 0.799469L50.9715 0.407269H50.7385V1.0703H50.8828V0.535313H50.8861L51.0781 1.0703H51.1635L51.3555 0.535313H51.3587V1.0703Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        d="M50.4562 0.535313H50.658V0.407269H50.0951V0.535313H50.297V1.0703H50.4562V0.535313Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        d="M50.2727 8.04699H51.909C52.7008 8.04699 53.3924 7.5112 53.5902 6.74444L55.2156 0.432777C55.2189 0.419923 55.2091 0.407269 55.1957 0.407269H52.2565C52.2473 0.407269 52.2391 0.413547 52.2368 0.422615L50.2727 8.04699Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M42.3678 5.12392C42.3565 5.12392 42.3474 5.11476 42.3474 5.1035V4.22942C42.3474 4.21816 42.3383 4.20899 42.327 4.20899H39.4968C39.4855 4.20899 39.4764 4.21816 39.4764 4.22942V15.6938C39.4764 15.705 39.4855 15.7142 39.4968 15.7142H40.6382C41.5822 15.7142 42.3474 14.949 42.3474 14.005V11.5823C42.3474 11.5635 42.3704 11.5549 42.3831 11.5688C42.9994 12.2509 43.9426 12.5695 44.8556 12.5695C47.2533 12.5695 48.9097 10.6135 48.9097 8.27885C48.9097 5.95994 47.2376 3.94085 44.824 3.94085C43.8811 3.94085 42.9069 4.31651 42.3849 5.11476C42.3812 5.12044 42.3746 5.12392 42.3678 5.12392ZM44.0984 10.0771C42.931 10.0771 42.2528 9.28845 42.2528 8.26311C42.2528 7.26926 42.931 6.43325 44.0984 6.43325C45.2657 6.43325 45.944 7.26926 45.944 8.26311C45.944 9.28845 45.2657 10.0771 44.0984 10.0771Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M32.3982 5.12392C32.3869 5.12392 32.3777 5.11476 32.3777 5.1035V4.20899H29.5068V15.7142H30.6685C31.6126 15.7142 32.3777 14.949 32.3777 14.005V11.5354C32.3777 11.533 32.3807 11.5318 32.3823 11.5337C32.9977 12.2399 33.9576 12.5695 34.886 12.5695C37.2837 12.5695 38.94 10.6135 38.94 8.27885C38.94 5.95994 37.268 3.94085 34.8544 3.94085C33.9115 3.94085 32.9373 4.31651 32.4153 5.11476C32.4115 5.12044 32.405 5.12392 32.3982 5.12392ZM34.1288 10.0771C32.9614 10.0771 32.2831 9.28845 32.2831 8.26311C32.2831 7.26926 32.9614 6.43325 34.1288 6.43325C35.2961 6.43325 35.9744 7.26926 35.9744 8.26311C35.9744 9.28845 35.2961 10.0771 34.1288 10.0771Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M25.7781 12.3014H26.9194C27.8633 12.3014 28.6286 11.5361 28.6286 10.5921V4.22942C28.6286 4.21816 28.6195 4.20899 28.6082 4.20899H25.7781C25.7668 4.20899 25.7577 4.21816 25.7577 4.22942V4.94287C25.7577 4.9618 25.7344 4.97037 25.7218 4.95622C25.1197 4.27436 24.1619 3.94085 23.2495 3.94085C20.8517 3.94085 19.1954 5.92845 19.1954 8.24727C19.1954 10.5662 20.8833 12.5695 23.281 12.5695C24.2238 12.5695 25.2135 12.2096 25.7201 11.4117C25.7239 11.4058 25.7303 11.4022 25.7372 11.4022C25.7485 11.4022 25.7577 11.4114 25.7577 11.4226V12.281C25.7577 12.2922 25.7668 12.3014 25.7781 12.3014ZM24.0066 10.0771C22.8394 10.0771 22.161 9.28845 22.161 8.26311C22.161 7.26926 22.8394 6.43325 24.0066 6.43325C25.174 6.43325 25.8523 7.26926 25.8523 8.26311C25.8523 9.28845 25.174 10.0771 24.0066 10.0771Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        d="M13.0077 5.25007C12.9964 5.25007 12.9873 5.241 12.9873 5.22964V4.22942C12.9873 4.21816 12.9782 4.20899 12.9668 4.20899H10.1368C10.1255 4.20899 10.1163 4.21816 10.1163 4.22942V12.281C10.1163 12.2922 10.1255 12.3014 10.1368 12.3014H11.2782C12.2221 12.3014 12.9873 11.5362 12.9873 10.5922V8.10538C12.9873 7.09578 13.3186 6.22818 14.4859 6.22818C15.8027 6.22818 15.7896 7.3951 15.7808 8.18111C15.7801 8.24258 15.7794 8.30171 15.7794 8.35777V12.281C15.7794 12.2922 15.7886 12.3014 15.7998 12.3014H16.9413C17.8852 12.3014 18.6504 11.5362 18.6504 10.5922V7.30085C18.6504 5.31325 17.7828 3.94085 15.6059 3.94085C14.4893 3.94085 13.6863 4.27008 13.0249 5.24121C13.0212 5.24669 13.0145 5.25007 13.0077 5.25007Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        d="M6.61553 2.80052C7.40571 3.03429 8.25049 2.67686 8.62665 1.94378L9.06608 1.08744C9.07116 1.07758 9.06757 1.06562 9.05801 1.06014C8.00238 0.466359 6.54468 0.0917969 5.35224 0.0917969C2.97035 0.0917969 1.25089 1.66926 1.25089 4.08274C1.25089 6.38592 2.52863 6.89071 4.4689 7.44284C4.50035 7.45182 4.53304 7.46106 4.56679 7.47058C5.24401 7.6618 6.34609 7.97298 6.34609 8.7994C6.34609 9.63551 5.57315 9.99831 4.84744 9.99831C3.79062 9.99831 2.87569 9.44619 2.10275 8.76791L0.786149 11.2442C0.781366 11.2533 0.784056 11.2648 0.792526 11.2707C2.0043 12.1163 3.46548 12.6169 4.95795 12.6169C6.15677 12.6169 7.40302 12.2856 8.33369 11.4969C9.28021 10.6923 9.5641 9.47778 9.5641 8.2946C9.5641 6.37007 8.28636 5.53406 6.63008 5.04501L5.8413 4.80845L5.83558 4.8066C5.29909 4.63297 4.4689 4.36427 4.4689 3.67261C4.4689 3.01007 5.22609 2.67886 5.79396 2.67886C6.07426 2.67886 6.35028 2.7221 6.61553 2.80052Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M38.2256 27.6413V14.5484H35.3546V20.3377C34.7552 19.6278 33.7771 19.2808 32.8465 19.2808C30.4487 19.2808 28.7924 21.2684 28.7924 23.5873C28.7924 25.9061 30.4803 27.9094 32.878 27.9094C33.8245 27.9094 34.8182 27.5466 35.323 26.7421H35.3546V27.6413H38.2256ZM33.6037 21.7731C34.771 21.7731 35.4493 22.6092 35.4493 23.603C35.4493 24.6283 34.771 25.4171 33.6037 25.4171C32.4363 25.4171 31.7581 24.6283 31.7581 23.603C31.7581 22.6092 32.4363 21.7731 33.6037 21.7731Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M23.5605 27.9094C26.1633 27.9094 28.4348 26.3478 28.4348 23.603C28.4348 20.8425 26.1633 19.2808 23.5605 19.2808C20.9577 19.2808 18.6862 20.8425 18.6862 23.603C18.6862 26.3635 20.9735 27.9094 23.5605 27.9094ZM23.5605 21.7731C24.7278 21.7731 25.4061 22.6092 25.4061 23.603C25.4061 24.6283 24.7278 25.4171 23.5605 25.4171C22.3932 25.4171 21.7149 24.6283 21.7149 23.603C21.7149 22.6092 22.3932 21.7731 23.5605 21.7731Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M13.4681 27.9094C16.0708 27.9094 18.3424 26.3478 18.3424 23.603C18.3424 20.8425 16.0708 19.2808 13.4681 19.2808C10.8653 19.2808 8.59369 20.8425 8.59369 23.603C8.59369 26.3635 10.881 27.9094 13.4681 27.9094ZM13.4681 21.7731C14.6353 21.7731 15.3137 22.6092 15.3137 23.603C15.3137 24.6283 14.6353 25.4171 13.4681 25.4171C12.3007 25.4171 11.6225 24.6283 11.6225 23.603C11.6225 22.6092 12.3007 21.7731 13.4681 21.7731Z"
                        fill="#FF00A6"
                    ></path>
                    <path
                        d="M4.79525 20.3535V18.3659H8.5339V15.7473H1.70349V27.6413H4.79525V22.972H8.18684V20.3535H4.79525Z"
                        fill="#FF00A6"
                    ></path></svg
            ></router-link>
        </div>
        <hr />
    </header>
    <pop-up
        v-if="showSearchPopup"
        @closePopup="closeSearchPopup()"
        v-slot="slotProps"
    >
        <search-popup
            :searchInput="searchInput"
            @update:searchInput="(newValue) => (searchInput = newValue)"
            :closePopup="slotProps.closePopup"
        />
    </pop-up>
    <pop-up
        v-if="showRegisterPopup"
        @closePopup="closeRegisterPopup()"
        v-slot="slotProps"
    >
        <register-popup :closePopup="slotProps.closePopup" />
    </pop-up>
    <pop-up
        v-if="showOrdersPopup"
        @closePopup="closeOrdersPopup()"
        v-slot="slotProps"
    >
        <orders-popup :closePopup="slotProps.closePopup" />
    </pop-up>
</template>

<script setup>
import PopUp from "../PopUp.vue";
import SearchPopup from "../popups/SearchPopup.vue";
import { watch } from "@vue/runtime-core";
import { ref } from "@vue/reactivity";
import RegisterPopup from "../popups/RegisterPopup.vue";
import OrdersPopup from "../popups/OrdersPopup.vue";
import { useRoute } from "vue-router";
const showSearchPopup = ref(false);
const route = useRoute();
const showRegisterPopup = ref(false);
const showOrdersPopup = ref(false);
const searchInput = ref(route.query.search ?? "");

const openSearchPopup = () => {
    showSearchPopup.value = true;
    document.body.classList.add("ov-hid");
};

const closeSearchPopup = () => {
    showSearchPopup.value = false;
    document.body.classList.remove("ov-hid");
};

const openRegisterPopup = () => {
    showRegisterPopup.value = true;
    document.body.classList.add("ov-hid");
};

const closeRegisterPopup = () => {
    showRegisterPopup.value = false;
    document.body.classList.remove("ov-hid");
};

const openOrdersPopup = () => {
    showOrdersPopup.value = true;
    document.body.classList.add("ov-hid");
};

const closeOrdersPopup = () => {
    showOrdersPopup.value = false;
    document.body.classList.remove("ov-hid");
};

watch(
    () => route.query.search,
    (newS, prevS) => {
        searchInput.value = newS ?? "";
    }
);
</script>

<style lang="scss" scoped>
@use "../../abstracts" as *;

header {
    position: sticky;
    left: 0;
    right: 0;
    top: 0;
    z-index: 4;
    background-color: white;
}

.header-container {
    padding: 1em 1.5em;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

hr {
    position: sticky;
    left: 0;
    right: 0;
    top: 0;
}

.orders {
    display: flex;
    align-items: center;
    gap: 0.4em;
    font-size: 1.1rem;
    font-weight: bolder;
    color: rgb(58, 61, 66);
    background-color: white;
    span {
        display: none;
    }
}

.reg-orders-container {
    display: flex;
    align-items: center;
    gap: 1em;
    padding-left: 0.7em;
}

.main-logo {
    margin-top: 0.15em;
}

.search-bar {
    position: absolute;
    display: none;
    left: 0;
    right: 0;
    margin-inline: auto;
    gap: 0.5em;
    align-items: center;
    padding: 0.6em 1.2em;
    width: clamp(15em, 20vw + 10em, 33em);
    background-color: rgb(235, 237, 240);
    border-radius: 0.8em;
}

.search-text {
    color: rgb(166, 170, 173);
    font-size: 1.2rem;
}

.search-icon {
    cursor: pointer;
}

.register-icon {
    cursor: pointer;
}

@media (min-width: $sm-view) {
    .orders span {
        display: block;
    }

    .search-bar {
        display: flex;
    }
    .reg-orders-container {
        gap: 1.5em;
    }

    .mini-search-logo {
        display: none;
    }
}
@media (min-width: $md-view) {
    .reg-orders-container {
        gap: 3em;
    }
}
</style>
