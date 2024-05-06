<template>
    <div class="d-flex items-center border border-slate-200 p-4 rounded-xl mb-2">
        <img src="assets/img/menu.svg" alt="" />
        <div class="d-flex flex-col">
            <p class="pl-5 pr-5">название организации</p>
            <div class="d-flex justify-between mt-2">
                <img class="opacity-20 hover:opacity-100 cursor-pointer" src="assets/img/close.svg" alt="" />
            </div>
            <div v-for="list in lists"
                 :id="`${list.title}`"
                 class="category fadeInUp wow animated"
                 style="visibility: visible;  animation-name: fadeInUp;"
            >
                <label v-if="list.user_id === card.user_id" style="color:green;">{{ list.title }}</label>
                <div v-for="subcat in elemsProduct" class="subcategory">
                    <div class="d-flex col justify-content-between">
                        <div><label
                            v-if="subcat.medical_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null" >{{
                                subcat.title
                            }} </label>
                        </div>
                        <div><label
                            v-if="subcat.medical_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">{{
                                subcat.price
                            }} </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import user from "../user";
export default {
    setup() {
        const {state} = user;
        return {state,};
    },
    name: "medicalCard",
    data() {
        return {
            id: this.$route.params.id,
            card: [],
            lists: [],
            items: [],
            elemsProduct:null,
            medicals:[]
        }
    },

    methods: {
        getCard() {
            this.axios.get('/api/medicals/' + this.$route.params.id)
                .then(res => {
                    this.card = res.data.data
                })
        },
        getMedical() {
            this.axios.post('/api/medicals', {})
                .then(res => {
                    this.medicals = res.data.data

                })
        },
        getList() {
            this.axios.get('/api/list')
                .then(res => {
                    this.lists = res.data.data;
                    this.cats = res.data.data;
                })
        },
        getItem() {
            this.axios.get('/api/item')
                .then(res => {
                    this.items = res.data.data
                    const elemProducts = []
                    this.medicals.forEach((med)=>{
                        if(med.id === Number(this.id)){
                            this.lists.forEach((list)=>{
                                this.items.forEach((key)=>{
                                    if(key.medical_todo_list_id === list.id && list.user_id === med.user_id && key.deleted_at === null){
                                        elemProducts.push(key)
                                    }
                                })
                            })
                        }
                        this.elemsProduct = elemProducts;
                    })
                    console.log(this.elemsProduct);
                })
        },
    },
    mounted() {
        this.getList()
        this.getItem()
        this.getCard()
        this.getMedical()
    },
}
</script>

