<template>
    <section class="popup-card" ref="modal">
        <h2 class="order-popup-heading">سفارش‌های پیشین</h2>
        <div class="orders-list">
            <article class="order" v-for="one in four" :key="one">
                <div class="order-main-wrapper">
                    <div class="order-header-wrapper">
                        <h3 class="order-heading">پاچینی بمب بهروز</h3>
                        <time class="order-time">
                            <span>چهارشنبه ۱ آبان</span>
                            <span>۲۲:۵۲</span>
                        </time>
                    </div>
                    <img
                        src="https://cdn.snappfood.ir/media/cache/vendor_logo/uploads/images/vendors/logos/5dc950be15654.gif    "
                        alt=""
                        class="order-img"
                    />
                </div>
                <div class="order-buttons">
                    <button class="order-btn">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="1rem"
                            height="1rem"
                            fill="#3A3D42"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M6.667 14.001a.667.667 0 01-.59.662L6 14.668H2.667a.667.667 0 01-.078-1.33l.078-.004H4.14L2.885 11.93C1.6 10.577 1.064 8.632 1.463 6.774c.401-1.863 1.688-3.386 3.415-4.029a.667.667 0 11.465 1.25c-1.295.482-2.27 1.635-2.576 3.06-.295 1.37.07 2.8.977 3.838l.121.133 1.468 1.642v-2c0-.342.258-.624.59-.663L6 10.001c.342 0 .624.257.662.589l.005.078V14zm7.87-4.773c-.401 1.863-1.688 3.386-3.415 4.029a.667.667 0 01-.465-1.25c1.295-.482 2.27-1.636 2.576-3.06.295-1.37-.07-2.8-.977-3.838l-.121-.133-1.468-1.644v2.002a.667.667 0 01-.59.662L10 6.001a.667.667 0 01-.662-.589l-.005-.078V2.001c0-.342.258-.624.59-.662L10 1.334h3.333a.667.667 0 01.078 1.33l-.078.004h-1.472l1.254 1.404c1.287 1.353 1.821 3.297 1.422 5.156z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <p class="sc-hKwCoD iNbUWE">سفارش مجدد</p>
                    </button>
                    <button class="order-btn">
                        <svg
                            width="17"
                            height="18"
                            viewBox="0 0 17 18"
                            fill="var(--sf-carbon-main)"
                            style="transform: rotate(180deg)"
                        >
                            <path
                                d="M8.49984 0.666016C13.0947 0.666016 16.8332 4.40435 16.8332 8.99935C16.8332 13.5944 13.0948 17.3327 8.49984 17.3327C3.90483 17.3327 0.166504 13.5944 0.166504 8.99935C0.166504 4.40435 3.90483 0.666016 8.49984 0.666016ZM8.49984 2.33268C4.82364 2.33268 1.83317 5.32751 1.83317 8.99935C1.83317 12.6712 4.82364 15.666 8.49984 15.666C12.176 15.666 15.1665 12.6712 15.1665 8.99935C15.1665 5.32755 12.176 2.33268 8.49984 2.33268ZM8.49984 11.0827C9.07915 11.0827 9.5415 11.5491 9.5415 12.1243C9.5415 12.7037 9.07513 13.166 8.49984 13.166C7.92053 13.166 7.45817 12.6996 7.45817 12.1243C7.45817 11.545 7.92454 11.0827 8.49984 11.0827ZM8.49984 4.85086C8.96103 4.85086 9.33523 5.22411 9.3364 5.68531C9.33651 5.72919 9.3366 5.77122 9.33668 5.8114L9.3369 9.02446L9.33134 9.12083C9.2836 9.53182 8.93431 9.85084 8.51052 9.85086H8.49661C8.04022 9.85083 7.67023 9.48085 7.67023 9.02446L7.6699 5.68079C7.6699 5.22243 8.04148 4.85086 8.49984 4.85086Z"
                            ></path>
                        </svg>
                        <p class="sc-hKwCoD iNbUWE">مشاهده فاکتور</p>
                    </button>
                </div>
            </article>
        </div>
    </section>
</template>

<script setup>
import { ref } from "@vue/reactivity";
const props = defineProps({ closePopup: Function });
const four = [1, 2, 3, 4];
const fullW = ref(false);
const modal = ref("");
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
.popup-card {
    transition: all 0.3s;
    width: 27em;
    background: rgba(white, 1);
    animation: left-to-right 0.27s ease-in-out both;
    padding: 1em 0.7em;
    box-shadow: rgba(0, 0, 0, 0.08) 0px 2px 8px,
        rgba(0, 0, 0, 0.16) 0px 8px 32px;
}

.order-popup-heading {
    font-size: 0.92rem;
    color: rgb(76, 79, 84);
    font-weight: bold;
    direction: rtl;
    margin-bottom: 1em;
}

.order {
    border: 0.0625rem solid rgba(58, 61, 66, 0.12);
    border-bottom: unset;
    padding: 0.75em 1em;
    &:first-child {
        border-radius: 0.6em 0.6em 0 0;
    }

    &:last-child {
        border-bottom: 0.0625rem solid rgba(58, 61, 66, 0.12);
        border-radius: 0 0 0.6em 0.6em;
    }
    &:only-child {
        border-radius: 0.6em;
    }
}

.order-header-wrapper {
    margin-right: 1.5em;
}
.order-main-wrapper {
    display: flex;
    justify-content: end;
}

.order-heading {
    color: rgb(58, 61, 66);
    font-size: 1.1rem;
    direction: rtl;
    margin-right: -0.1em;
    margin-bottom: 0.2em;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    width: 25ch;
}

.order-time {
    display: block;
    color: rgb(58, 61, 66);
    font-size: 0.9rem;
    direction: rtl;
}

.order-img {
    width: 48px;
    border-radius: 0.2em;
}

.order-buttons {
    display: flex;
    gap: 1em;
    margin-block: 0.7em;
}

.order-btn {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    align-items: center;
    gap: 0.6em;
    padding: 0.6em 1em;
    flex: 1 1 50%;
    color: rgb(58, 61, 66);
    background-color: rgba(58, 61, 66, 0.06);
    border-radius: 0.4rem;
    transition: all 0.17s ease-in-out;
    font-weight: bold;
    font-size: 1rem;

    &:hover {
        background-color: rgba(58, 61, 66, 0.12);
        color: rgb(24, 27, 31);
    }
}

@media (max-width: $sm-view) {
    .popup-card {
        width: 20em;
    }

    .order-btn {
        font-size: 0.9rem;
    }
}

@keyframes left-to-right {
    0% {
        transform: translateX(-27em);
    }
    100% {
        transform: translateX(0);
    }
}
</style>
