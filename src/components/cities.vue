<template>
  <ul>
      <li v-for="(citi, i) in citi_data" :key="i" :class="{active_curren_city: current_city(i, citi)}">
          <a :href="go_to(i)">{{citi}}</a>
      </li>
  </ul>
</template>
<script>
export default {
  props: ["pref"],
  data: () => ({
    citi_data: [
      "Тула",
      "Алексин",
      "Донской",
      "Саратов",
      "Балаково",
      "Энгельс",
      "Ростов-на-Дону",
      "Москва",
      "Мытищи",
      "Санкт-Петербург",
      "Одинцово",
      "Новомосковск",
      "Липецк",
      "Люберцы",
      "Дмитров",
      "Демидов",
      "Брянск",
      "Белгород",
    //   "TEST",
    ],
    dom: [
      "tula",
      "aleksin",
      "dnsk",
      "srtv",
      "blkv",
      "engls",
      "rstvnd",
      "msc",
      "mtszh",
      "spb",
      "odnc",
      "nvmsc",
      "lpc",
      "lbrc",
      "dmit",
      "dmdv",
      "br",
      "blgr"
    //   "localhost",
    ],
  }),
  methods: {
    go_to(i) {
      var link = "https://"+this.dom[i]+".imperiaclean.ru"
      return link;
    },
    current_city(i, citi){
        if(this.pref == this.dom[i]){
            return true
        }
        if(this.pref == "localhost" || this.pref == "imperiaclean"){
          if(this.citi_data[i] == "Москва"){
            return true
          }
        }
    }
  }
};
</script>