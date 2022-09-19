<template>
    <section @click="closePopup()" class="popup">
        <div class="popup-card">
            <div v-if="firstPage">
                <div class="popup-header">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="2.5em"
                        height="1.5em"
                        viewBox="0 0 56 28"
                        fill="none"
                        class="snapp-logo"
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
                        ></path>
                    </svg>
                    <svg
                        @click="$emit('closePopup')"
                        xmlns="http://www.w3.org/2000/svg"
                        width="0.675rem"
                        height="0.675rem"
                        viewBox="0 0 14 14"
                        fill="#676A70"
                        class="close-popup"
                    >
                        <path
                            d="M8.41 7.00019L12.71 2.71019C12.8983 2.52188 13.0041 2.26649 13.0041 2.00019C13.0041 1.73388 12.8983 1.47849 12.71 1.29019C12.5217 1.10188 12.2663 0.996094 12 0.996094C11.7337 0.996094 11.4783 1.10188 11.29 1.29019L7 5.59019L2.71 1.29019C2.5217 1.10188 2.2663 0.996094 2 0.996094C1.7337 0.996094 1.4783 1.10188 1.29 1.29019C1.1017 1.47849 0.995908 1.73388 0.995908 2.00019C0.995908 2.26649 1.1017 2.52188 1.29 2.71019L5.59 7.00019L1.29 11.2902C1.19627 11.3831 1.12188 11.4937 1.07111 11.6156C1.02034 11.7375 0.994202 11.8682 0.994202 12.0002C0.994202 12.1322 1.02034 12.2629 1.07111 12.3848C1.12188 12.5066 1.19627 12.6172 1.29 12.7102C1.38296 12.8039 1.49356 12.8783 1.61542 12.9291C1.73728 12.9798 1.86799 13.006 2 13.006C2.13201 13.006 2.26272 12.9798 2.38458 12.9291C2.50644 12.8783 2.61704 12.8039 2.71 12.7102L7 8.41018L11.29 12.7102C11.383 12.8039 11.4936 12.8783 11.6154 12.9291C11.7373 12.9798 11.868 13.006 12 13.006C12.132 13.006 12.2627 12.9798 12.3846 12.9291C12.5064 12.8783 12.617 12.8039 12.71 12.7102C12.8037 12.6172 12.8781 12.5066 12.9289 12.3848C12.9797 12.2629 13.0058 12.1322 13.0058 12.0002C13.0058 11.8682 12.9797 11.7375 12.9289 11.6156C12.8781 11.4937 12.8037 11.3831 12.71 11.2902L8.41 7.00019Z"
                        ></path>
                    </svg>
                </div>
                <h2 class="popup-heading">ورود<span>یا</span>عضویت</h2>
                <form @submit.prevent="sendRegisterEmail" action="#">
                    <p class="form-group">
                        <label class="form-label" for="">ادرس ایمیل</label>
                        <input
                            autocomplete="off"
                            v-model="email"
                            class="form-input"
                            type="email"
                        />
                    </p>
                    <button
                        type="submit"
                        class="popup-submit-btn"
                        :class="{ active: email.length }"
                    >
                        ادامه
                    </button>
                </form>
            </div>
            <div class="second-page-pass" v-else-if="secondPageWithPass">
                <div class="pass-register-header">
                    <span class="editing">ورود با رمز یکبار مصرف</span>

                    <font-awesome-icon
                        @click="goBackToFirstPage()"
                        class="back-icon"
                        icon="angle-right"
                    />
                </div>
                <h2 class="popup-heading">ورود به حساب کاربری</h2>

                <form
                    autocomplete="off"
                    @submit.prevent="verifyRegisterWithPass"
                    action="#"
                >
                    <p class="form-group">
                        <label class="form-label"> رمز عبور </label>
                        <input
                            v-model="password"
                            class="form-input"
                            type="password"
                            placeholder=" رمز عبورتان را وارد کنید"
                        />
                    </p>
                    <p class="editing forgot-pass" @click="forgotPassword">
                        رمز عبورتان را فراموش کرده اید؟
                    </p>
                    <button
                        type="submit"
                        :class="{ active: password.length >= 8 }"
                        class="popup-submit-btn"
                    >
                        ورود
                    </button>
                </form>
            </div>
            <div class="second-page-code" v-else>
                <font-awesome-icon
                    @click="goBackToFirstPage()"
                    class="back-icon"
                    icon="angle-right"
                />
                <h2 class="popup-heading">تایید ایمیل</h2>

                <p class="email-check-guide">
                    کد تأیید به ایمیل <span>{{ email }}</span> فرستاده شد.
                </p>
                <span class="editing" @click="editEmail">
                    <font-awesome-icon icon="edit" />
                    اصلاح ایمیل
                </span>

                <form @submit.prevent="verifyRegisterWithCode" action="#">
                    <p class="form-group">
                        <input
                            v-model="verificationCode"
                            class="form-input"
                            type="text"
                        />
                    </p>
                    <div class="receive-check">
                        <p>کد تأیید را دریافت نکردید؟</p>
                        <span @click="sendRegisterEmail" class="editing"
                            >ارسال دوباره</span
                        >
                    </div>
                    <button
                        type="submit"
                        :class="{ active: verificationCode.length == 8 }"
                        class="popup-submit-btn"
                    >
                        ورود
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import axios from "axios";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import axiosClient from "../../axios";

const emit = defineEmits(["closePopUP"]);
const closePopup = (e) => {};
const email = ref("");
const firstPage = ref(true);
const secondPageWithPass = ref(false);
const verificationCode = ref("");
const password = ref("");
const store = useStore();
const router = useRouter();

const goBackToFirstPage = () => (firstPage.value = true);

const editEmail = () => {
    email.value = "";
    goBackToFirstPage();
};

const sendRegisterEmail = async () => {
    const res = await store.dispatch("sendRegisterEmail", email.value);
    if (res.data.success) firstPage.value = false;
    if (res.data.userPassExists) secondPageWithPass.value = true;
};

const verifyRegisterWithPass = async () => {
    const res = await store.dispatch("verifyRegisterWithPass", {
        email: email.value,
        password: password.value,
    });

    if (res.data.loginSuccess) {
        await router.push({ name: "dashboard" });
    }
};

const verifyRegisterWithCode = async () => {
    const res = await store.dispatch("verifyRegisterWithCode", {
        email: email.value,
        verification_code: verificationCode.value,
    });
    console.log(res);

    if (res.data.loginSuccess) {
        await router.push({ name: "dashboard" });
    }
};

const forgotPassword = () => {};
</script>

<style lang="scss" scoped>
.popup {
    display: flex;
    align-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1000;
    user-select: none;
    background-color: rgba($color: #000000, $alpha: 0.35);
    grid-column: auto;
}

.popup-card {
    min-width: min(80%, 30em);
    max-height: fit-content;
    aspect-ratio: 1.5;
    margin-inline: auto;
    z-index: 1002;
    background-color: white;
    border-radius: 0.8em;
    padding: 0.8em 1.1em;
    box-shadow: rgba(0, 0, 0, 0.08) 0px 2px 8px,
        rgba(0, 0, 0, 0.16) 0px 8px 32px;
}

.popup-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.popup-heading {
    font-size: 1.8rem;
    text-align: right;
    font-weight: 700;
    direction: rtl;
    color: rgb(58, 61, 66);

    span {
        font-weight: 100;
        opacity: 0.7;
        margin: 0.3em;
    }
}

.close-popup {
    cursor: pointer;
    scale: 1.3;
}

.popup-submit-btn {
    padding-block: 0.45em;
    width: 100%;
    font-weight: bold;
    font-size: 1.4rem;
    background-color: rgb(237, 239, 240);
    margin-top: 2em;
    border: none;
    border-radius: 0.6em;
    color: rgb(166, 170, 173);
    cursor: pointer;

    &:hover {
        opacity: 0.85;
    }
}

.active {
    background-color: rgb(255, 0, 166);
    color: white;
    transition: all 250ms ease-in-out;
}

.second-page-code {
    text-align: right;
    color: gray;
    font-size: 0.8em;

    .popup-heading {
        margin-bottom: 1.5em;
        font-size: 1.3rem;
    }

    .popup-submit-btn {
        margin-top: unset;
    }
}

.back-icon {
    margin-bottom: 0.8em;
    scale: 1.3;
    cursor: pointer;
    color: gray;
}

.snapp-logo {
    scale: 1.5;
    margin-left: 0.5em;
    margin-top: 0.5em;
}

.editing {
    display: block;
    color: rgb(0, 184, 98);
    font-size: 1rem;
    font-weight: bolder;
    margin-block: 0.5em;
    padding-inline: 0.2em;
    direction: rtl;
    cursor: pointer;
    svg {
        margin-left: 0.2em;
    }
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-top: 2.5em;
    .form-label {
        direction: rtl;
        font-size: 1.05em;
        font-weight: bold;
        color: rgb(83, 86, 92);
        margin-bottom: 0.5em;
    }

    .form-input {
        padding: 0.8em 0.5em;
        border: 1.2px rgba(58, 61, 66, 0.12) solid;
        border-radius: 0.5em;
        color: rgb(58, 61, 66);
        outline: none;
        direction: rtl;
        font-weight: normal;
        font-size: 1rem;
        &:focus {
            border-color: rgba(58, 61, 66, 0.85);
        }
    }
}

.receive-check {
    display: flex;
    flex-direction: column;
    gap: 1em;
    padding: 1.7em;
    text-align: center;

    span {
        display: block;
    }

    p {
        color: rgb(74, 75, 75);
        font-size: 1rem;
    }

    .editing {
        margin: unset;
    }
}

.email-check-guide {
    direction: rtl;
    font-weight: 500;
    font-size: 1rem;
    color: rgb(58, 61, 66);
    word-spacing: 1.5px;
    max-width: 50ch;
    word-break: break-all;
    span {
        font-size: 0.9rem;
        font-weight: bold;
    }
}

.pass-register-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    .back-icon {
        margin-bottom: unset;
    }
}

.forgot-pass {
    text-align: left;
    margin-top: 3.5em;
}

.second-page-pass {
    .popup-submit-btn {
        margin-top: 1em;
    }
}
</style>
