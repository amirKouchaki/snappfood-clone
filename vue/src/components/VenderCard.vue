<template>
    <RouterLink
        :to="{ name: 'venders.show', params: { vender: vender.id } }"
        class="vendor-card"
    >
        <div class="vender-coupon" v-if="vender.has_coupon">
            <p class="coupon">{{ vender.coupons[0].body }}</p>

            <svg
                width="16"
                height="16"
                viewBox="0 0 16 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M11 2.5C11 2.20107 11.0525 1.9144 11.1487 1.64869L10 0.5L7.10355 3.39645L8.20711 4.50001L7.5 5.20712L6.39644 4.10356L0.5 10L1.72462 11.1226C1.96873 11.043 2.22934 11 2.5 11C3.88071 11 5 12.1193 5 13.5C5 13.6947 4.97775 13.8841 4.93565 14.066L6.5 15.5L11.9938 9.70096L10.7929 8.50002L11.5 7.79291L12.6818 8.97474L15.5 6L14.3513 4.85131C14.0856 4.94754 13.7989 5 13.5 5C12.1193 5 11 3.88071 11 2.5ZM10.7071 7.00001L9 5.29291L8.29289 6.00001L10 7.70712L10.7071 7.00001Z"
                    fill="url(#paint0_linear_24519_2824)"
                ></path>
                <defs>
                    <linearGradient
                        id="paint0_linear_24519_2824"
                        x1="15"
                        y1="0.999986"
                        x2="1"
                        y2="15"
                        gradientUnits="userSpaceOnUse"
                    >
                        <stop stop-color="#008542"></stop>
                        <stop
                            offset="1"
                            stop-color="#008542"
                            stop-opacity="0.5"
                        ></stop>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="bg-wrapper">
            <img class="vendor-card-bg" :src="vender.background_image" alt="" />
            <div class="featured-wrapper">
                <img
                    class="vender-card-featured"
                    :src="vender.title_image"
                    alt=""
                />
            </div>
        </div>

        <p class="vender-title">{{ vender.title }}</p>
        <div class="score-rating">
            <div class="rating">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="#FFCE00">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M5.99984 9.62097L2.42572 11.5L3.10832 7.52016L0.216797 4.70163L4.21278 4.12098L5.99984 0.5L7.7869 4.12098L11.7829 4.70163L8.89136 7.52016L9.57395 11.5L5.99984 9.62097Z"
                    ></path>
                </svg>
                <span>{{ vender.average_ratings }}</span>
            </div>
            <span class="score">(امتیاز{{ vender.total_ratings }})</span>
        </div>
        <p class="description">{{ vender.description }}</p>
        <button class="delivery">
            <svg
                viewBox="0 0 20 20"
                fill="#676A70"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M14.5832 9.58325C14.1229 9.58325 13.7498 9.95635 13.7498 10.4166C13.7498 10.8768 14.1229 11.2499 14.5832 11.2499C15.0434 11.2499 15.4165 10.8768 15.4165 10.4166C15.4165 9.95635 15.0434 9.58325 14.5832 9.58325Z"
                ></path>
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.55167 17.6256C5.58545 18.4597 3.42815 17.2569 2.99477 15.2849L2.80188 15.3599C2.54548 15.4596 2.25639 15.4264 2.02933 15.2711C1.80228 15.1157 1.6665 14.8584 1.6665 14.5833L1.6665 9.16659C1.6665 6.62223 2.7184 4.66703 4.31719 3.36431C5.89569 2.07812 7.96582 1.45825 9.99984 1.45825C12.0339 1.45825 14.104 2.07812 15.6825 3.36431C17.2813 4.66703 18.3332 6.62223 18.3332 9.16659V12.4999C18.3332 12.8344 18.1332 13.1364 17.8253 13.2671L7.55167 17.6256ZM9.90247 7.08896L3.45858 7.84706C3.73253 6.47175 4.43547 5.41782 5.36998 4.65636C6.60398 3.65088 8.28385 3.12492 9.99984 3.12492C11.7158 3.12492 13.3957 3.65088 14.6297 4.65636C15.8434 5.64531 16.6665 7.12761 16.6665 9.16659V11.9482L6.90075 16.0913C5.83543 16.5432 4.65792 15.7992 4.58658 14.6659L10.3019 12.4433C10.6222 12.3187 10.8332 12.0103 10.8332 11.6666V7.91659C10.8332 7.67861 10.7314 7.45199 10.5536 7.29386C10.3758 7.13572 10.1388 7.06115 9.90247 7.08896ZM9.1665 11.0965L3.33317 13.365L3.33317 9.53998L9.1665 8.85371L9.1665 11.0965Z"
                ></path>
            </svg>
            <span class="delivery-type">{{
                vender.is_express ? "ارسال اکسپرس" : "پیک فروشنده"
            }}</span>
            <span class="delivery-fee">{{
                vender.delivery_fee == 0 ? "رایگان" : vender.delivery_fee
            }}</span
            ><span v-if="vender.delivery_fee != 0">تومان</span>
        </button>
    </RouterLink>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import axiosClient from "../../axios";
const props = defineProps({ vender: Object });
</script>

<style lang="scss" scoped>
.vendor-card {
    position: relative;
    border-radius: 0.5em;
    overflow: hidden;
    border: 1px solid rgba(58, 61, 66, 0.06);
    direction: rtl;
    text-align: center;
    box-shadow: rgba(58, 61, 66, 0.06) 0px 1px 0px,
        rgba(0, 0, 0, 0.05) 0px 2px 8px -2px;
    height: fit-content;
    &:hover {
        box-shadow: rgba(58, 61, 66, 0.06) 0px 1px 0px,
            rgba(0, 0, 0, 0.3) 0px 8px 32px -16px;
        scale: 1.01;
        transition: all 0.1s ease-in-out;
    }
}

.vender-coupon {
    position: absolute;
    display: flex;
    align-items: center;
    flex-direction: row-reverse;
    z-index: 2;
    top: 1em;
    padding: 0.2em 0.6em;
    justify-content: space-between;
    background-color: white;
    width: 98%;
    direction: rtl;
    border-radius: 5em 0 0 5em;
    svg {
        min-width: 16px;
        aspect-ratio: 1;
    }
}

.coupon {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    width: 92%;
    direction: rtl;
    text-align: right;
    color: rgb(0, 133, 66);
    font-size: 0.8rem;
}

.vendor-card-bg {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.bg-wrapper {
    position: relative;
    width: 100%;
    aspect-ratio: 1.9;
    flex-grow: 1;
    max-height: 11em;
}

.featured-wrapper {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    margin-inline: auto;
    transform: translateY(25%);
    box-shadow: rgba(58, 61, 66, 0.06) 0px 1px 0px,
        rgba(0, 0, 0, 0.3) 0px 8px 32px -16px;
    border: 4px solid white;
    border-radius: 0.8em;
    width: 85px;
    background-color: white;
    aspect-ratio: 1;
    overflow: hidden;
}
.vender-card-featured {
    width: 100%;
    height: 100%;
    border: 1.5px solid rgba(58, 61, 66, 0.06);
    object-fit: contain;
}

.vender-title {
    margin-top: 2em;
    text-align: center;
    font-size: 1.22rem;
    font-weight: bold;
    color: rgb(58, 61, 66);
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

.score-rating {
    margin-top: 0.7em;
    margin-bottom: 0.4em;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5em;
}

.score,
.description {
    color: rgb(166, 170, 173);
    font-size: 0.9rem;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    padding: 0.3em;
}

.description {
    margin-bottom: 2em;
    padding-inline: 0.5em;
}

.rating {
    color: rgb(58, 61, 66);
    font-size: 0.95rem;
}

.delivery {
    direction: rtl;
    padding: 0.3em 1em 0.7em 1em;
    border-radius: 2em;
    margin-bottom: 2em;
    background-color: white;
    color: rgb(58, 61, 66);
    font-size: 0.95rem;
    box-shadow: rgba(58, 61, 66, 0.06) 0px 1px 0px,
        rgba(0, 0, 0, 0.05) 0px 2px 8px -2px;
    svg {
        transform: translateY(25%);
        width: 1.25em;
        aspect-ratio: 1;
    }
}

.delivery-type {
    margin-inline: 0.7em;
}

.delivery-fee {
    margin-left: 0.3em;
}
</style>
