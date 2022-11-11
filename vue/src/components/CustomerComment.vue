<template>
    <article class="comment">
        <header class="comment-header">
            <h3 class="reviewer">{{ comment.sender.name }}</h3>
            <time class="review-date">{{
                new Date(comment.created_at).toLocaleDateString()
            }}</time>
            <div class="user-rating">
                <Star s-color="#FFCE00" />
                {{ comment.user_rating }}
            </div>
        </header>
        <div class="comment-main">
            <div class="comment-body">
                <p class="comment-text">
                    {{ comment.body }}
                </p>
                <div class="foods">
                    <p
                        class="food"
                        v-for="(food, index) in comment.menu_items"
                        :key="index"
                    >
                        {{
                            food.title === ""
                                ? "سیب زمینی سرخ کرده"
                                : food.title
                        }}
                    </p>
                </div>
            </div>
            <div class="replies">
                <section
                    class="reply"
                    v-if="comment.replies?.length"
                    v-for="(reply, index) in comment.replies"
                    :key="index"
                >
                    <h4 class="reply-title">
                        {{
                            reply.source == "VENDOR"
                                ? "پاسخ رستوران"
                                : "پاسخ اسنپ فود"
                        }}
                    </h4>
                    <p>{{ reply.commentText }}</p>
                </section>
            </div>
        </div>
    </article>
</template>

<script setup>
import moment from "moment";
import Star from "./Star.vue";
const props = defineProps(["comment"]);
</script>

<style lang="scss" scoped>
.comment {
    display: flex;
    gap: 1em;
    border-bottom: 0.0625rem solid rgba(58, 61, 66, 0.12);
    padding-inline: 1em;
}

.reviewer {
    color: rgb(58, 61, 66);
}

.review-date {
    color: rgb(58, 61, 66);
}

.comment-header {
    flex: 1;
}

.comment-main {
    flex: 4;
}

.comment-text {
    color: rgb(58, 61, 66);
}

.foods {
    display: flex;
    flex-wrap: wrap;
    gap: 1em;
    margin-block: 1em;
}

.food {
    display: flex;
    align-items: center;
    background-color: rgb(235, 237, 240);
    padding: 0.4em 0.6em;
    border-radius: 0.4em;
    color: rgb(58, 61, 66);
    font-size: 0.82rem;
}

.reply {
    border: 0.0625rem solid rgba(58, 61, 66, 0.12);
    border-radius: 0.6em;
    padding: 0.5em 0.7em;
    margin-block: 1em;
    width: fit-content;
    margin-right: 0.7em;
}

.reply-title {
    color: rgb(255, 0, 166);
}

.user-rating {
    display: flex;
    align-items: center;
    width: fit-content;
    gap: 0.2em;
    padding-inline: 0.6em;
    border-radius: 0.3em;
    border: 0.0625rem solid rgb(235, 237, 240);
}
</style>
