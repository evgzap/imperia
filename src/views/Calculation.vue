<template>
  <section id="callback">
    <div class="wrapper">
      <div class="name_section">Расчитать стоимость</div>
      <div class="center">
        <form method="POST" id="callback" class="form full" @submit.prevent="">
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
                <input
                  type="number"
                  name="area"
                  placeholder="Площадь"
                  v-model="area"
                  autocomplete="off"
                />
              </div>
            </div>
            <div class="services">
              <div class="name_block">Дополнительные услуги</div>
              <label
                v-for="(service) in services"
                v-bind:key="service.type"
                v-bind:id="service.type"
              >
                <span>
                  {{service.text}}
                </span>
                <input type="checkbox" v-model="service.check" />
              </label>
            </div>
          </div>
          <div class="right">
            <div class="price">
              Итого:
              <span>{{price()}}</span>
              <i class="fa fa-rub" aria-hidden="true"></i>
            </div>
            <h4 v-html="response" />
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
    selected_type_window: 2,
    area: "",
    services: [
      { check: false, text: "Вынос мусора", type: "trash" },
      { check: false, text: "Химчистка мягкой мебели", type: "soft" },
      { check: false, text: "Химчистка напольных покрытий", type: "floor" },
      { check: false, text: "Мытье холодильника", type: "ref" },
      { check: false, text: "Микроволновая печь", type: "microwave" },
      { check: false, text: "Духовой шкаф", type: "oven" },
      { check: false, text: "Кухонный гарнитур", type: "set" }
    ],
    success_service: "",
    total: "",
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
        from: "Калькулятор",
        text: "Оставили заявку через калькулятор",
        serv: this.success_service,
        total: this.total,
        typeC: this.typesC[this.selected_type_clean].type,
        typeW: this.typesW[this.selected_type_window].type,
      };
      if(this.area <= 10){
        this.response = "<span class='error'>Упс, Меньше 10 м<sup>2</sup></span>"
        return false
      }
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
          console.log(param)
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
    test(e) {
      if (e) {
        return "да";
      } else {
        return "нет";
      }
    },
    price() {
      var price_c = 0;
      var price_w = 0;
      var total;
      var t = 0;
      var serv = '';
      switch (this.selected_type_clean) {
        case 0:
          price_c = 70;
          break;
        case 1:
          price_c = 40;
          break;
        case 2:
          price_c = 90;
          break;
        default:
          break;
      }
      switch (this.selected_type_window) {
        case 0:
          price_w = 250;
          break;
        case 1:
          price_w = 300;
          break;
        case 2:
          price_w = 0;
          break;
        default:
          break;
      }
      for (var i = 0; i < this.services.length; i++) {
        if (this.services[i].check != 0) {
          switch (this.services[i].type) {
            case "trash":
              serv+=this.services[i].text 
              t += 1;
              break;
            case "soft":
              serv+="\n"+this.services[i].text
              t += 2;
              break;
            case "floor":
              serv+="\n"+this.services[i].text
              t += 3;
              break;
            case "ref":
              serv+="\n"+this.services[i].text
              t += 500;
              break;    
            case "microwave":
              serv+="\n"+this.services[i].text 
              t += 300;
              break;  
            case "oven":
              serv+="\n"+this.services[i].text
              t += 500;
              break;  
            case "set":
              serv+="\n"+this.services[i].text 
              t += 1000;
              break;  
            default: break;
          }
        }
      }
      serv+= "\n доп услуги на " + t + "р."
      this.success_service = serv
      price_c *= this.area;
      total = price_c + price_w + t;
      this.total = "На сумму "+total + " Рублей"
      return total;
    }
  }
};
</script>
