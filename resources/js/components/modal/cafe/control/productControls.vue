<template>
    <button :class="counts === 0 ? 'btn-control disabled' :'btn-control' " @click.prevent="$emit('minus');price()">
        -
    </button>
    <p class="counts">{{ counts }}</p>
    <button class="btn-control" @click.prevent="$emit('plus');price()">
        +
    </button>
</template>

<script>
export default {
    name: "productControls",
    props: ['counts'],
    emits: ['plus', 'minus'],
    data() {
        return {

            totalPrice: null,
        }
    },
    methods:{
        price() {
            const raws = localStorage.getItem('medProduct')
            const product = JSON.parse(raws)

            const calculatePrice = (total) => {
                if (total === null) {
                    return 0;
                } else if (total.length === 0) {
                    return 0;
                } else {
                    return total.reduce((acc, curr) => (Number(acc) + Number(curr.price)), 0);
                }
            }

            const rawsList = localStorage.getItem('medProductList')
            const productList = JSON.parse(rawsList)
            const calculatePriceList = (totals) => {
                if (totals === null) {
                    return 0;
                } else if (totals.length === null) {
                    return 0;
                } else {
                    return totals.reduce((acc, curr) => (Number(acc) + Number(curr.price)), 0);
                }
            }
            if (calculatePrice(product) === 0) {
                this.totalPrice = 0 + calculatePriceList(productList)
            } else if (calculatePriceList(productList) === 0) {
                this.totalPrice = 0 + calculatePrice(product)
            } else if (calculatePrice(product) === 0 && calculatePriceList(productList) === 0) {
                this.totalPrice = 0
            } else {
                this.totalPrice = calculatePrice(product) + calculatePriceList(productList)
            }
        },
    }
}

</script>

<style scoped>
.btn-control{
    width: 30px;
    background-color: #51D3B7;
    border: none;
    border-radius: 3px;
    text-align: center;
    align-items: center;
}
.counts{
    padding: 0px 5px;
}
</style>
