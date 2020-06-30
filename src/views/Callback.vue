<template>
  <section id="callback">
    <div class="wrapper">
      <div class="name_section">Заказать звонок</div>
      <div class="center">
          <img src="@/assets/images/callback_image_1.jpg" alt="">
        <form method="POST" id="callback" class="form" @submit.prevent="" >
          <h4 v-html="response">
          </h4>
          <label>
            <input type="text" name="name" placeholder="Ваше имя" id="name" v-model="name" required />
            <span v-if="error_name" class="error">
              Вы пропустили поле
            </span>
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
            <span v-if="error_tel" class="error">
              Проверте указанные данные 
            </span>
          </label>
          <button type="submit" class="form_button orange" @click="onSubmit">
            <i class="fa fa-phone" aria-hidden="true"></i>Заказать звонок
          </button>
          <router-link :to="'/calculation/'+$route.params.id" class="blue form_button" type="button"><i class="fa fa-calculator" aria-hidden="true"></i>Расчитать стоимость</router-link>
        </form>
      </div>
    </div>
  </section>
</template>
<script>
import Vue from 'vue'
import "@/assets/styles_calculator.scss";
export default {
  data: () => ({
    name: "",
    telephone: "",
    error_name: false,
    error_tel: false,
    response: "",
  }),
  methods: {
    onSubmit() {
      
      if(this.name.length <= 2){
        this.error_name = true
        return false;
      }else{
        this.error_name = false
      }
      if(this.telephone.length <= 11){
        this.error_tel = true
        return false;
      }else{
        this.error_tel = false
      }
      var param = {
        name: this.name, 
        telephone: this.telephone,
        from: "Заявка",
        text: "Оставили заявку на звонок",
        area: this.area
      }
      const str = JSON.stringify(param)
      Vue.axios.post('/method/send.php', str).then((response) =>{
        this.response = "<span class='success'>Наши операторы скоро с Вами свяжутся</span>"
        this.name = ""
        this.telephone = ""
      }).catch((error) =>{
        this.response = "<span class='error'>Упс, попробуйте позже ♥</span>"
        this.name = ""
        this.telephone = ""
        return false
      })
    },
    tel() {
      if (this.telephone.indexOf("+7") == -1) {
        this.telephone = "+7";
      }
      if (this.telephone.length == 0) {
        this.telephone = "";
      }
    }
  }
};
</script>
