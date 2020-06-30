<template>
  <section id="callback">
    <div class="wrapper">
      <div class="name_section">Расчитать стоимость</div>
      <div class="center">
        <form method="POST" id="callback" class="form full" @submit.prevent="onSubmit">
          <div class="left">
            <div class="top_option">
              <div class="local">
                <label>Тип уборки</label>
                <select v-model="selected_type_clean">
                  <option
                    v-for="typeC in typesC"
                    v-bind:value="typeC.mask"
                    v-bind:key="typeC.mask"
                  >{{typeC.type}}</option>
                </select>
              </div>
              <div class="local">
                <label>Мойка окон</label>
                <select v-model="selected_type_window">
                  <option
                    v-for="typeW in typesW"
                    v-bind:value="typeW.mask"
                    v-bind:key="typeW.mask"
                  >{{typeW.type}}</option>
                </select>
              </div>
              <div class="local">
                <label>Площадь М</label>
                <input type="number" name="area" placeholder="Площадь"  autocomplete="off"/>
              </div>
            </div>
            <div class="services">
              <div class="name_block">Дополнительные услуги</div>
            </div>
          </div>
          <div class="right">
            <h4 v-html="response" />
            <label>
              <input
                type="text"
                name="name"
                placeholder="Ваше имя"
                id="name"
                v-model="name"
                required
              />
              <span v-if="error_name">Вы пропустили поле</span>
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
              <span v-if="error_tel">Проверте указанные данные</span>
            </label>
            <button type="submit" class="form_button orange" @click="onSubmit">
              <i class="fa fa-paper-plane" aria-hidden="true"></i>Оставить заявку
            </button>
            <router-link :to="'/callBack/'+$route.params.id" class="blue form_button" type="button">
              <i class="fa fa-phone" aria-hidden="true"></i>Заказать звонок
            </router-link>
          </div>
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
    response: "",
    typesC: [
      { type: "Генеральная", mask: 0 },
      { type: "Поддерживающая", mask: 1 },
      { type: "После ремонта", mask: 2 }
    ],
    selected_type_clean: 0,
    typesW: [
      { type: "Простая мойка", mask: 0 },
      { type: "После ремонта", mask: 1 },
      { type: "Не требуется", mask: 2 }
    ],
    selected_type_window: 0
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
      var param = {
        name: this.name,
        telephone: this.telephone,
        from: "Заявка",
        text: "Оставили заявку на звонок"
      };
      const str = JSON.stringify(param);
      Vue.axios
        .post("/method/send.php", str)
        .then(response => {
          this.response =
            "<span class='success'>Наши операторы скоро с Вами свяжутся</span>";
          this.name = "";
          this.telephone = "";
        })
        .catch(error => {
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
    }
  }
};
</script>
