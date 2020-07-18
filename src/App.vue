<template>
  <div id="wrapper">
    <nav>
      <div class="wrapper">
        <div class="center">
          <ul id="nav">
            <li>
              <a href>
                <i class="fa fa-vk" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/imperia_clean/">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </li>
            <li id="double_text">
              <a href="mailto:imperia.clean07@gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>imperia.clean07@gmail.com</span>
              </a>
              <a href="tel:+79771499516">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>8-(977)-149-95-16</span>
              </a>
            </li>
            <li>
              <a @click.prevent="trigger_modal = !trigger_modal">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>{{citi()}}</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <header>
      <div class="wrapper">
        <div class="center">
          <ul>
            <li id="logo">
              <img src="/img/logo.png" alt="Империя чистоты" />
              <div id="name_company">
                <router-link to="/">Империя Чистоты</router-link>
              </div>
            </li>
            <li>О нас</li>
            <li>Услуги</li>
            <li>Отзывы</li>
            <li class="btn">
              <router-link :to="'/callBack/'+citi()" exact>Заказать звонок</router-link>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <div id="modal_cities" v-if="trigger_modal">
      <div class="wrapper">
        <cities v-bind:pref="pref" />
        <hr />
        <button @click.prevent="trigger_modal = !trigger_modal">Закрыть</button>
      </div>
    </div>
    <div id="modal_mobile_menu" v-if="trigger_menu">
      <div class="wrapper">
        <ul>
          <li id="logo">
            <img src="/img/logo.png" alt="Империя чистоты" />
            <div id="name_company" @click="trigger_menu=false">
              <router-link to="/">Империя Чистоты</router-link>
            </div>
          </li>
          <li>О нас</li>
          <li>Услуги</li>
          <li>Отзывы</li>
          <li>Контакты</li>
          <li class="btn" @click="trigger_menu=false">
            <router-link :to="'/callBack/'+citi()">Заказать звонок</router-link>
          </li>
        </ul>
        <div id="contact_us">
          <span>Не хочешь ждать - звони!</span>
          <a href="tel:+79771499516">
            <span>
              <i class="fa fa-phone" aria-hidden="true"></i>8-(977)-149-95-16
            </span>
          </a>
        </div>
      </div>
    </div>
    <div id="mobile_button" :class="{active:trigger_menu}">
      <button @click.prevent="trigger_menu = !trigger_menu" :class="{active:trigger_menu}">+</button>
    </div>
    <main>
      <router-view v-bind:ct="citi()"/>
    </main>
    <footer>
      <div class="wrapper">
        <div class="center">
          <ul>
            <li>© 2020 Империя чистоты.</li>
            <li id="double_text">
              <a href="mailto:imperia.clean07@gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>imperia.clean07@gmail.com</span>
              </a>
              <a href="tel:+79771499516">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>8-(977)-149-95-16</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import cities from "@/components/cities.vue";

export default {
  data: () => ({
    trigger_modal: false,
    trigger_menu: false,
    citi_data: [
      "Тула",
      "Алексин",
      "Донской",
      "Новомосковск",
      "Саратов",
      "Балаково",
      "Энгельс",
      "Ростов-на-Дону",
      "Москва",
      "TEST",
      "Москва"
    ],
    dom: [
      "tula",
      "aleksin",
      "dnsk",
      "nvmsk",
      "srtv",
      "blkv",
      "engls",
      "rstvnd",
      "msc",
      "localhost",
      "imperiacean"
    ],
    pref: window.location.hostname.split(".")[0]
  }),
  components: {
    cities
  },
  methods: {
    citi() {
      var answer = this.citi_data[this.dom.indexOf(this.pref)];
      if (answer == undefined) {
        return this.citi_data[this.dom.indexOf("msc")];
      }
      return answer;
    }
  }
};
</script>
