<template>
  <section id="callback">
    <div class="wrapper">
      <div class="name_section">Заказать звонок</div>
      <div class="center">
        <img src="/img/callback_image_1.jpg" alt="Картинкой с уборкой" />
        <form method="POST" id="callback" class="form" @submit.prevent>
          <h4 class="good_text">Перезвоним за 5 минут!</h4>
          <h4 v-html="response"></h4>
          <label>
            <input type="text" name="name" placeholder="Ваше имя" id="name" v-model="name" required />
            <span v-if="error_name" class="error">Вы пропустили поле</span>
          </label>
          <label>
            <input
              type="tel"
              name="telephone"
              placeholder="Ваш телефон"
              @keyup="tel"
              v-model="telephone"
              @focus="telephone = '+7'"
              required
            />
            <span v-if="error_tel" class="error">Проверте указанные данные</span>
          </label>
          <label id="privacy" for="policy">
            <input type="checkbox" id="policy" v-model="policy"> <span>согласен с <router-link to="/policy">политикой конфиденциальности</router-link></span>
            <span v-if="error_policy" class="error">Вы пропустили поле</span>
          </label>
          <div class="just_text">Оставленная заявка ни к чему Вас не обязывает <hr> Вы можете отказаться в любой момент</div>
          <button type="submit" class="form_button orange" @click="onSubmit">
            <i class="fa fa-phone" aria-hidden="true"></i>Заказать звонок
          </button>
          
          <router-link
            :to="'/calculation/'+$route.params.id"
            class="blue form_button"
            type="button"
          >
            <i class="fa fa-calculator" aria-hidden="true"></i>Рассчитать стоимость
          </router-link>
        </form>
      </div>
    </div>
  </section>
</template>
<script>
import Vue from "vue";
import "@/assets/styles_calculator.scss";
export default {
  data: () => ({
    name: "",
    telephone: "",
    error_name: false,
    error_tel: false,
    error_policy: false,
    response: "",
    policy: false,
    
  }),
  methods: {
    onSubmit() {
      if (this.name.length <= 2) {
        this.error_name = true;
        return false;
      } else {
        this.error_name = false;
      }
      if (this.telephone.length <= 11) {
        this.error_tel = true;
        return false;
      } else {
        this.error_tel = false;
      }
      if(this.policy == false){
        this.error_policy = true;
        return false;
      }
      else{
        this.error_policy = false
      }

      var param = {
        name: this.name,
        telephone: this.telephone,
        city: this.$route.params.id,
        from: "Заявка",
        text: "Оставили заявку на звонок",
        area: this.area,
      };
      const str = JSON.stringify(param);
      Vue.axios
        .post("/method/send.php", str)
        .then(response => {
          console.log(response.data)
          this.response =
            "<span class='success'>Наши операторы скоро с Вами свяжутся</span>";
          this.name = "";
          this.telephone = "";
        })
        .catch(error => {
          console.log(error)
          this.response = "<span class='error'>Упс, попробуйте позже ♥</span>";
          this.name = "";
          this.telephone = "";
          return false;
        });
    },
    tel() {
      if (this.telephone.indexOf("+7") == -1) {
        this.telephone = "+7";
      }
      if (this.telephone.length == 0) {
        this.telephone = "";
      }
    },
    full_screen() {
      var nav = document.querySelector("nav").clientHeight;
      var header = document.querySelector("header").clientHeight;
      var footer = document.querySelector("footer").clientHeight;

      var full = window.innerHeight - nav - header - footer;

      document.querySelector("section").style.height = full + "px";
    }
  },
  mounted(){
    this.full_screen();
    
  }
};
</script>
