<template>
     <div v-if="state.user !== ''">
    <transition name="modal-animation">
        <div v-show="modalActive" class="modal-cafe">
            <transition name="modal-animation-inner">
                <div v-show="modalActive" class="modal-inner-cafe">
                    <div class=" modal-content-cafe">
                        <div class="col col-12 col-md-12 hotels-inf-item">
                            <div class="section-label section-label-mob">
                                <h2>Номера</h2>
                                <hr>
                            </div>
                            <form-picker-select ref="formDate"></form-picker-select>
                            <div class="rooms" v-for="post in posts">
                                <template v-if="post.id === modalPost">
                                    <div v-if="post.user_id === card.user_id" class="rooms-item  mb-5" id="rooms-item">
                                        <div class="rooms-item__line">
                                            <div class='slides'>
                                                <swiper
                                                    :images="post.image_post"
                                                ></swiper>
                                            </div>
                                        </div>
                                        <label class="item-hostel" :id="`${post.category}`">{{
                                                post.category
                                            }}<br>({{ post.berth }}
                                            спальное
                                            место)</label>
                                        <ul class="item-hostel">
                                            <li v-for="tag in post.tags"><img
                                                src="assets/img/check-list.svg">{{ tag.title }}
                                            </li>
                                        </ul>
                                        <label class="cost item-hostel">{{ post.price }}р за сутки</label>
                                    </div>
                                </template>
                            </div>
                            <div class="col col-12 col-md-6 hotels-inf-item">
                                <div class="section-label section-label-mob">
                                    <h2>Услуги</h2>
                                    <hr>
                                </div>
                                <div class="service-list service-list-modal">
                                    <!-- <div class="service-item"> -->
                                    <div v-for="list in lists" class="category fadeInUp wow animated"
                                         style="visibility: visible; animation-name: fadeInUp;">
                                        <label v-if="list.user_id === card.user_id"><span :id="`${list.title}`"></span>{{
                                                list.title
                                            }}</label>
                                        <sport-list-item
                                            v-for="( subcat ,index) in items"
                                            :ref="`item-${index}`"
                                            :subcat="subcat"
                                            :key="`item-${index}`"
                                            :list="list"
                                            :card="card"
                                            :items="items"
                                            :index="index"
                                            :products="products"
                                        ></sport-list-item>
                                    </div>
                                    <!-- </div> -->
                                </div>
                                <div class="d-flex align-items-center">
                                    <p class="price-total-san "> Общая стоимость заказа : {{ this.itemPrice }}</p>
                                </div>
                                <button class=" btn-price-san" @click.prevent="orderCafe">
                                    {{ message }}
                                </button>
                            </div>
                        </div>
                        <input class="hide" v-model="role" name="medical">
                        <button class="btn  modal-close" @click.prevent="close"
                        >Закрыть
                        </button>
                    </div>

                </div>
            </transition>
        </div>
    </transition>
    </div>
    <div v-if="state.user === ''">
        <transition name="modal-animation">
        <div v-show="modalActive" class="modal-cafe">
            <transition name="modal-animation-inner">
                <div v-show="modalActive" class="modal-inner-cafe">
                    <div class=" modal-content-cafe" style="width:50% !important;">
                        <div class="col col-12  hotels-inf-item">
                            <div class="section-label section-label-mob">
                                <h2>Бронирование возможно только для зарегистрированных пользователей</h2>
                                <hr>
                            </div>
                            <div class='d-flex justify-content-between align-items-center mt-4 modalRegister'>
                                    <div>
                                        <button type="button" class="btn btn-primary"><a  href="https://tourmeddriver.com/login"> Войти</a></button>
                                        <button type="button" class="btn btn-primary"><a  href='https://tourmeddriver.com/register'> Зарегистрироваться </a>  </button>
                                    </div>
                                    <div>
                                        <button class="btn btn-danger" @click.prevent="close">Закрыть</button>
                                    </div>
                                </div>
                    </div>
                </div>
                </div>
            </transition>
        </div>
    </transition>
    </div>
</template>

<script>

import swiper from "../swiper.vue";
import FormPickerSelect from "./FormPickerSelect.vue";
import SportListItem from "./sport/sportListItem.vue";
import user from "../../user";

export default {
    name: "modalSport",
    components: {SportListItem, FormPickerSelect, swiper},
    props: ['modalActive', 'posts', 'card', 'modalPost', 'lists', 'items', 'products',],
    setup(props, {emit}) {
        const {state} = user;
        const close = () => {
            emit('close');
        }
        return {close, state}
    },
    data() {
        return {
            date: [],
            post: this.posts,
            title: null,
            price: null,
            category: null,
            id: null,
            totalPrice: 0,
            message: 'Забронировать',
            sumPrice: null,
            start: null,
            end: null,
            srartnMM: null,
            endMM: null,
            days: null,
            order: [],
            role: 'sport',
            berth: null,
            allPrice:0,
            itemPrice:0,
        }
    },
    methods: {

        storePreOreder() {
            this.axios.post('/api/preOrder', {
                'total_price':  this.totalPrice + (this.price * (this.day-1)),
                'date': '-',
                'products': this.order,
                'user_id': this.state.user,
                'name_product': this.card.title,
                'image_product': this.card.image_url,
                'role': this.role,
                'organization_email': this.card.email
            })
                .then(res => {
                    //localStorage.clear()
                })
        },
        orderCafe() {

            this.days = this.$refs.formDate.date

            this.start = Number(this.days[0].substr(0, 2))
            this.end = Number(this.days[1].substr(0, 2))
            this.startMM = Number(this.days[0].substr(3, 2))
            this.endMM = Number(this.days[1].substr(3, 2))
            if (this.endMM === this.startMM) {
                this.day = (this.end - this.start) + 1
            } else if (this.endMM > this.startMM && this.startMM === 3 || this.startMM === 1 || this.startMM === 5 || this.startMM === 7 || this.startMM === 8 || this.startMM === 10 || this.startMM === 12) {
                this.day = (this.end - this.start) + 32
            } else if (this.endMM > this.startMM && this.startMM === 2) {
                this.day = (this.end - this.start) + 29
            } else if (this.endMM > this.startMM && this.startMM === 4 || this.startMM === 6 || this.startMM === 9 || this.startMM === 11) {
                this.day = (this.end - this.start) + 31
            }

            this.message = 'Заказ добавлен в корзину'
            const raws = localStorage.getItem('sportProduct')
            const product = JSON.parse(raws)

            const rawsList = localStorage.getItem('sportProductList')
            const productList = JSON.parse(rawsList)
            const calculatePrice = (total) => {
                if (total === null) {
                    return 0;
                } else if (total.length === 0) {
                    return 0;
                } else {
                    return total.reduce((acc, curr) => (Number(acc) + Number(curr.price)), 0);
                }
            }
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


            this.posts.forEach(post => {
                if (this.modalPost === post.id) {
                    this.id = post.id
                    this.title = post.title
                    this.price = post.price
                    this.category = post.category
                    this.berth = post.berth
                }
            })


            const totalPrice = this.totalPrice
            this.sumPrice =(this.price * (this.day-1))
            this.itemPrice = this.totalPrice + (this.price * (this.day-1))
            if(this.totalPrice != 0 || this.sumPrice != 0){
                this.order = {
                    date: this.$refs.formDate.date,
                    people: this.$refs.formDate.countPeople,
                    product: product,
                    productList: productList,
                    totalPrice: this.totalPrice + (this.price * (this.day-1)),
                    title: this.title,
                    category: this.category,
                    id: this.id,
                    berth: this.berth,
                    allPrice: this.sumPrice
                }}else{
                this.order={}
            }


            localStorage.setItem('orderProductSport', JSON.stringify(this.order))
            const raw = localStorage.getItem('order')
            const orderProductSport = JSON.parse(raw)

            this.storePreOreder()
        },
    },
    mounted() {

    }

}
</script>

<style scoped>
.modal-close {
    float: right;
    margin-top: -35px;
    text-decoration: none;
    color: #fff;
    background-color: #a11f34 !important;
    z-index: 99999999999;
    position: relative;
}

.modal-animation-enter-active,
.modal-animation-leave-active {
    transition: opacity .8s cubic-bezier(.52, .02, .19, 1.02);

}

.modal-animation-enter-from,
.modal-animation-leave-to {
    opacity: 0;
}

.modal-cafe {
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0, 0, 0); /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

.modal-content-cafe {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.hide {
    display: none;
}

.price-total-san {
    font-size: 14px;
    font-weight: 700;
    color: #505050;
    margin: 0;
    padding-top: 12px;
    padding-bottom: 12px;
}

.btn-price-san {
    width: 230px;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    background-color: #51D3B7;
}

.btn-total {
    width: 130px;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    background-color: #51D3B7;
}

.slides {
    width: 170px;
}

@media (max-width: 480px) {
    .modal-content-cafe {
        width: 100%;
        padding: 10px;
    }

    .section-label-mob {
        padding: 0;
    }

    .modal-close {
        float: right;
        margin-top: -45px;
        text-decoration: none;
        border-radius: 3px;
        border: none;
        z-index: 99999999999;
        position: relative;
        background-color: #a11f34 !important;
    }

    .service-list-modal {
        padding: 0;
    }

    .item-hostel {
        width: 100%;
        margin-left: 0;
    }

    .price-total {
        margin: 0 !important;
        padding-left: 0px;
        font-size: 12px;
    }

    .slides {
        width: 100%;
    }

    .btn-price-san {
        width: 150px;
        border: none;
        padding: 5px;
        margin-top: 5px;
        border-radius: 3px;
        background-color: #51D3B7;
        font-size: 16px;
    }
}
</style>
