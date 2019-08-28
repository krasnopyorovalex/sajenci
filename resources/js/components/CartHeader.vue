<template>
    <div class="cart with_leaf" v-cloak="">
        <a :href="url">
            <div class="icon_box">
                <i class="icon icon_cart"></i>
            </div>
            {{ priceMessage }}
        </a>
        <div class="cart_count">{{ count }}</div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                count: 0,
                message: 'Корзина пуста',
                url: '/cart'
            }
        },
        computed: {
            priceMessage: {
                get: function () {
                    return this.count > 0
                        ? 'Сумма: 10 000'
                        : 'Корзина пуста';
                }
            }
        }
    }
</script>

<style scoped>

</style>
