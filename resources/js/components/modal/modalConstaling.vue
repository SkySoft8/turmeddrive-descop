<template>
    <div v-if="state.user === ''">
        <transition name="modal-animation">
            <div v-show="modalActive" class="modal-med">
                <transition name="modal-animation-inner">
                    <div v-show="modalActive" class="modal-inner-med">
                        <div
                            class="modal-content-med"
                            style="width: 49% !important"
                        >
                            <div class="col col-12 hotels-inf-item">
                                <div class="section-label section-label-mob">
                                    <h2>
                                        Заказ услуги возможен только для
                                        зарегистрированных пользователей
                                    </h2>
                                    <hr />
                                </div>
                                <div
                                    class="d-flex justify-content-between align-items-center mt-4 modalRegister"
                                >
                                    <div>
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            <a
                                                href="https://tourmeddriver.com/login"
                                            >
                                                Войти</a
                                            >
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            <a
                                                href="https://tourmeddriver.com/register"
                                            >
                                                Зарегистрироваться
                                            </a>
                                        </button>
                                    </div>
                                    <div>
                                        <button
                                            class="btn btn-danger"
                                            @click.prevent="close"
                                        >
                                            Закрыть
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </transition>
    </div>
    <div v-if="state.user !== ''">
        <transition name="modal-animation">
            <div v-show="modalActive" class="modal-cafe">
                <transition name="modal-animation-inner">
                    <div v-show="modalActive" class="modal-inner-cafe">
                        <div class="container">
                            <div class="content">
                                <div class="right-side">
                                    <!-- Заголовок для формы -->
                                    <div class="topic-text">
                                        Отправьте нам сообщение
                                    </div>
                                    <!-- Какой-то дополнительный текст -->
                                    <!-- Форма обратной связи -->
                                    <form action="">
                                        <!-- Каждый input для выравнивания вкладываем в блок input-box -->
                                        <div class="input-box">
                                            <input
                                                type="text"
                                                placeholder="Название компании"
                                                name="surname"
                                                v-model="company_name"
                                            />
                                        </div>
                                        <div class="input-box message-box">
                                            <textarea
                                                type="text"
                                                name="messages"
                                                v-model="messages"
                                                placeholder="Сообщение"
                                            ></textarea>
                                        </div>
                                        <div class="button">
                                            <input
                                                type="button"
                                                value="Отправить"
                                            />
                                            <button
                                                class="btn modal-close"
                                                @click.prevent="close"
                                            >
                                                Закрыть
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class=" modal-content-cafe">
                        <form action="">
                            <div class="col col-12 col-md-12 hotels-inf-item d-flex justify-content-sm-center">
                                <div class="section-label section-label-mob">
                                    <div class="profile-data-item">
                                        <label class="input_text">Название компании</label>
                                        <input style="width:300px !important;" class="edit-dis" type="text" name="surname" v-model="company_name" >
                                    </div>
                                    <div class="profile-data-item ">
                                        <label class="input_text">Сообщение</label><br>
                                        <textarea style="width:300px !important;" rows="7" class="edit-dis-text" type="text" name="messages"
                                                  v-model="messages" ></textarea>
                                    </div>
                                    <div>
                                    <input   class="button_form"
                                           type="submit"
                                           :value="message"
                                           @click.prevent ='getOrder'
                                    />
                                </div>
                            </div>
                    </div>

                   
                    </form>
                </div> -->
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
    name: "modalConstaling",
    components: { SportListItem, FormPickerSelect, swiper },
    props: ["modalActive", "card"],
    setup(props, { emit }) {
        const { state } = user;
        const close = () => {
            emit("close");
        };
        return { close, state };
    },
    data() {
        return {
            order: [],
            role: "const",
            messages: null,
            company_name: null,
            users: null,
            message: "Отправить заявку",
        };
    },
    methods: {
        getUsers() {
            this.axios.get("/api/users/").then((res) => {
                this.users = res.data.data;
            });
        },
        getOrder() {
            this.axios
                .post(`/api/consulting/orders`, {
                    messages: this.messages,
                    company_name: this.company_name,
                    card_id: this.card.id,
                    user_id: this.state.user,
                })
                .then((res) => {
                    if (this.messages != null || this.company_name != null) {
                        this.messages = "";
                        this.company_name = "";
                        this.message = "Заявка отправлена";
                    }
                });
        },
    },
    mounted() {
        this.getUsers();
    },
};
</script>

<style scoped>
/* Убираем все отступы */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

*,
*::after,
*::before {
    box-sizing: inherit;
}

/* При расчете размеров инпутов учитываем внутренние отступы и границы */
input,
textarea {
    box-sizing: border-box;
}

/* В body устанавливаем шрифт, ширину и высоту, а также фон */
body {
    font-family: "Roboto", sans-serif;
    font-size: 16px;
    line-height: 1.2;
    width: 100%;
    min-height: 100vh;
    background: linear-gradient(45deg, #fff1eb, #ace0f9);
    display: flex;
    justify-content: center; /* чтобы контейнер */
    align-items: center; /* был по центру */
}

/* Ограничиваем контейнер по ширине 1000px */
.container {
    width: 100%;
    max-width: 1000px;
    padding: 0 20px;
}

/* Стили самой формы */
.content {
    display: flex; /* делаем колонки в ряд */
    align-items: center; /* выравниваем по центру */
    justify-content: space-between; /* колонки растянутся на всю ширину */
    background: #fff;
    padding: 40px;
    border-radius: 5px;
    box-shadow: 4px 4px 8px 0 rgba(34, 60, 80, 0.2);
}

/* Стили левой колонки */
.left-side {
    width: 25%; /* занимает 25% общей ширины */
    height: 100%; /* растягиваем на всю высоту */
    position: relative; /* позиционирование относительное (для ::before) */
    display: flex;
    flex-direction: column; /* внутри элементы располагаем в колонку */
}

/* Стили разделительной линии между левой и правой колонкой */
.left-side::before {
    content: ""; /* контент нам не нужен */
    position: absolute; /* позиционируем относительно .left-side */
    height: 70%; /* высота 70% от .left-side */
    width: 2px; /* ширина 2px */
    background: #afafb6;
    right: -15px; /* позиционируем справа + отступ 15px (справа) */
    top: 50%; /* выравниваем по центру */
    transform: translateY(-50%); /* выравниваем по центру */
}

/* Стили правой колонки */
.right-side {
    width: 75%; /* занимает 75% общей ширины */
    margin: auto;
}

/* Элементы левой колонки: адрес, телефон, email */
.details {
    margin-bottom: 15px;
    text-align: center;
}

/* Общие стили для иконок */
.details i {
    font-size: 25px; /* задаем размер */
    color: #3e2093; /* задаем цвет */
    margin-bottom: 10px;
}

/* Стили для заголовков левой колонки */
.topic {
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 7px; /* отступ снизу 7px */
}

/* Стили для текста левой колонки */
.text-one,
.text-two {
    font-size: 14px;
    color: #afafb6;
}

/* Заголовок правой колонки */
.topic-text {
    font-size: 23px;
    font-weight: 600;
    color: #3e2093;
    margin-bottom: 10px;
}

/* Текст правой колонки */
.right-side p {
    margin-bottom: 20px;
}

/* Контейнер для input'ов формы */
.input-box {
    height: 50px; /* по сути задаем высоту input'а */
    width: 100%; /* ширина на всю ширину правой колонки (с учетом padding) */
    margin-bottom: 20px; /* отступаем снизу 20px */
}

/* Стили для input и textarea (поле сообщение) */
.input-box input,
.input-box textarea {
    height: 100%; /* растягиваем на всю высоту контейнера 50px */
    width: 100%; /* растягиваем на всю ширину */
    border: none; /* убираем внешние края */
    border-radius: 5px; /* скругляем края */
    background: #f0f1f8; /* задаем цвет фона */
    padding: 0 20px; /* отступ справа и слева 20px */
}

/* Отдельно стилизуем поле сообщение */
.input-box textarea {
    resize: none; /* чтобы нельзя было менять высоту */
    padding: 20px;
    font-family: "Roboto", sans-serif;
}

/* Это контейнер для поля сообщение */
.message-box {
    min-height: 110px; /* минимальная высота 110px */
}

/* Стили для контейнера кнопки */
.button {
    display: flex;
    justify-content: space-between; /* делаем блочно-строчный элемент */
}

/* Стили для самой кнопки */
.button input[type="button"] {
    color: #fff;
    font-size: 18px;
    background: #3e2093;
    outline: none;
    border: none;
    padding: 10px 20px;
    border-radius: 7px;
    transition: 0.2s; /* чтобы плавно менялся цвет при наведении (:hover) */
}

/* Меняем цвет фона при наведении на кнопку */
.button input[type="button"]:hover {
    background: rgb(0, 0, 207);
}
@media (max-width: 800px) {
    /* Теперь форма (правая колонка) будет сверху, а элементы (левая колонка) снизу */
    .content {
        height: 100%;
        flex-direction: column-reverse; /* располагаем в колонку и реверсивно */
    }

    /* Внутри левой колонки внутренние элементы располагаем в ряд */
    .left-side {
        margin-top: 50px;
        flex-direction: row; /* располагаем элементы (адрес, телефон, email) в ряд */
        width: 100%; /* левая колонка на всю ширину */
        justify-content: center;
        flex-wrap: wrap; /* перенос элементов, если не хватит места */
    }
    .details {
        margin-right: 20px;
    }
    .details:last-child {
        margin-right: 0;
    }

    /* Убираем разделительную линию */
    .left-side::before {
        display: none;
    }

    /* Правая колонка теперь на всю ширину и не имеет отступа слева */
    .right-side {
        width: 100%;
        margin-left: 0;
    }
}
.profile-data-item-textarea {
    height: 230px !important;
}
.content {
    margin-top: 25px;
}
.modal-close {
    color: #fff;
    font-size: 18px;
    background: #3e2093;
    outline: none;
    border: none;
    padding: 10px 20px;
    border-radius: 7px;
    transition: 0.2s;
}

.modal-animation-enter-active,
.modal-animation-leave-active {
    transition: opacity 0.8s cubic-bezier(0.52, 0.02, 0.19, 1.02);
}

.modal-animation-enter-from,
.modal-animation-leave-to {
    opacity: 0;
}

.modal-cafe {
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 25%;
    top: 20%;
    width: 52%; /* Full width */
    height: 50%; /* Full height */
    background-color: rgb(0, 0, 0); /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    overflow: hidden; /* Скрываем scrollbars */
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
    background-color: #51d3b7;
}

.btn-total {
    width: 130px;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    background-color: #51d3b7;
}

.slides {
    width: 170px;
}

.input_text {
    font-weight: 700;
    font-size: 12px;
    color: rgba(81, 211, 183, 1);
}

.button_form {
    width: 200px;
    height: 50px;
    background-color: rgba(81, 211, 183, 1);
    border-radius: 3px;
    border: none;
    color: #fff;
    padding: 12px 24px;
}

.edit-dis-text {
    display: block;
    width: 201px;
    border: 2px solid #51d3b7;
    padding: 4px 12px;
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
        color: #fff;
        font-size: 18px;
        background: #3e2093;
        outline: none;
        border: none;
        padding: 10px 20px;
        border-radius: 7px;
        transition: 0.2s;
        text-transform: capitalize;
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
        background-color: #51d3b7;
        font-size: 16px;
    }
}
.modal-close {
    color: #fff;
    font-size: 18px;
    background: #963232;
    outline: none;
    border: none;
    padding: 10px 20px;
    border-radius: 7px;
    transition: 0.2s;
    text-transform: capitalize;
}

.modal-animation-enter-active,
.modal-animation-leave-active {
    transition: opacity 0.8s cubic-bezier(0.52, 0.02, 0.19, 1.02);
}

.modal-animation-enter-from,
.modal-animation-leave-to {
    opacity: 0;
}

.modal-med {
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

.modal-content-med {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.hide {
    display: none;
}

.price-total {
    margin: 0 !important;
    padding-left: 20px;
    font-size: 24px;
}

.btn-price {
    width: 130px;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    background-color: #51d3b7;
}

.btn-total {
    width: 130px;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    background-color: #51d3b7;
}

@media (max-width: 480px) {
    .modal-content-med {
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
        text-transform: capitalize;
    }

    .service-list-modal {
        padding: 0;
    }
}
@media (max-width: 798px) {
    .modal-cafe{
    position: fixed;
    z-index: 1;
    left: 15%;
    top: 20%;
    width: 70%;
    height: 50%;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
    overflow: hidden;
}
.right-side {
        width: 100%;
        margin-top: 0;
    }
.content {
        height: 90%;
        flex-direction: column-reverse;
    }
}
@media (max-width: 487px) {
    .button{
        display:inline-grid;
    }
    .content {
        height: 93%;
        flex-direction: column-reverse;
    }
    .modal-close[data-v-9cc6f07b] {
    margin-top: 5px;
    width:130px;
}
}
</style>
