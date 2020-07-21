<template>
  <div class="main_preview">
    <section id="about_us" class="main_section">
      <div class="wrapper">
        <div class="left">
          <div class="name_section">
            <span>порфесиональная</span> уборка
          </div>
          <h1
            class="h_text"
          >Мы осуществляем уборку квартир, домов, офисных помещений, производственных зданий, мойку окон, витражей, химчистку мягкой мебели и ковровых покрытий</h1>
          <div class="btn">
            <router-link :to="'/calculation/'+ct">Расчитать стоимость</router-link>
          </div>
          <div class="mini_section">
            <div class="mini_info">
              <div class="image_info">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
              </div>
              <div class="text_info">Выезд удобное для вас время</div>
            </div>
            <div class="mini_info">
              <div class="image_info">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
              <div class="text_info">Низкие цены на уборку</div>
            </div>
            <div class="mini_info">
              <div class="image_info">
                <i class="fa fa-diamond" aria-hidden="true"></i>
              </div>
              <div class="text_info">8 лет успешной работы</div>
            </div>
            <div class="mini_info">
              <div class="image_info">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>
              </div>
              <div class="text_info">Работаем с юридическими лицами</div>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="main_right_image">
            <img src="/img/woman.png" alt />
          </div>
        </div>
      </div>
    </section>
    <section id="why_me" class="main_section">
      <div class="wrapper">
        <div class="left">
          <div class="name_section">
            <span>почему именно</span> мы
          </div>
        </div>
        <div class="right"></div>
        <div class="center">
          <div class="main_section_about">
            <div class="mini_info">
              <div class="image_info">
                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
              </div>
              <div class="text_info">Профессиональные моющие средства</div>
              <div class="text_info mini">Моющие средства от известных производителей</div>
            </div>
            <div class="mini_info">
              <div class="image_info">
                <i class="fa fa-hourglass" aria-hidden="true"></i>
              </div>
              <div class="text_info">Экономия времени</div>
              <div class="text_info mini">Выезд специалистов в течении часа</div>
            </div>
            <div class="mini_info">
              <div class="image_info">
                <i class="fa fa-magic" aria-hidden="true"></i>
              </div>
              <div class="text_info">Возможность выбора времени уборки</div>
              <div class="text_info mini">Гибкий график приезда наших работников</div>
            </div>
            <div class="mini_info">
              <div class="image_info">
                <i class="fa fa-male" aria-hidden="true"></i>
              </div>
              <div class="text_info">Качество уборки</div>
              <div class="text_info mini">Высокий уровень наших клинеров</div>
            </div>
            <div class="mini_info">
              <div class="image_info">
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
              </div>
              <div class="text_info">Уборка в качестве подарка</div>
              <div class="text_info mini">Подарочный сертификат на уборку</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="main_section" id="sale">
      <div class="wrapper">
        <div class="left">
          <div class="name_section">
            <span>
              Акция
              <hr />
            </span> снижение цены
          </div>
          <div class="main_left_text">
            <div class="sale_text">
              Мойка окон от 200руб/м
              <sup>2</sup>
            </div>
            <div class="sale_text">
              Генеральная уборка от 40руб/м
              <sup>2</sup>
            </div>
            <div
              class="sale_text info"
            >В Генеральную уборку от 40р/м2 входит мытье полов, обеспыливание всех наружних поверхностей, мытье санузлов и сантехники</div>
            <div class="btn">
              <router-link :to="'/calculation/'+ct">Расчитать стоимость</router-link>
            </div>
            <div
              class="sale_text ps"
            >В генеральную уборку от 70р/м2 входит мытье и обеспыливание всех наружних поверхностей,включая стены в комнатах, санузлах, сантехника, двери, выключатели,зеркала,потолок.</div>
          </div>
        </div>
        <div class="right">
          <div class="main_right_image">
            <img src="/img/woman1.png" alt />
          </div>
        </div>
      </div>
    </section>
    <section id="photo" class="main_section">
      <div class="wrapper">
        <div class="left">
          <div class="name_section">
            Наши
            <span>работы</span>
          </div>
         
          
        </div>
        <div class="right">
          
        </div>
        <div class="center">
           <div class="sort">
            <div id="qua" class="sort_input">
              <label>Кол-во фото</label>
              <input type="number" name="qua" v-model="quantity" />
            </div>
            <div id="sorted" class="sort_input">
              <label>Сортировка</label>
              <select v-model="sort">
                <option
                  v-for="type in sort_type"
                  v-bind:value="type.mask"
                  v-bind:key="type.mask"
                >{{type.type}}</option>
              </select>
            </div>
            <div class="btn">
            <a @click.prevent="get_photos()">применить</a>
          </div>
          </div>
          <div class="our_service">
            <div class="response_message" v-if="bool_image">
              <div class="text_response">
                {{text_image_response}}
                <span v-if="!error_load">
                  <i class="fa fa-spinner" aria-hidden="true"></i>
                </span>
              </div>
            </div>
            <div class="block_image" v-if="!bool_image">
              <img
                v-for="image in images"
                v-bind:src="'https://imperiaclean.ru/images/upload/'+image"
                v-bind:key="image"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
import Vue from "vue";
export default {
  props: ["ct"],
  data: () => ({
    quantity: 10,
    sort: "ASC",
    sort_type: [
      { type: "Новее", mask: "DESC" },
      { type: "Страше", mask: "ASC" }
    ],
    images: null,
    bool_image: false,
    text_image_response: "",
    error_load: false
  }),
  methods: {
    get_photos() {
      var param = {
        quantity: this.quantity,
        sort: this.sort
      };

      const str = JSON.stringify(param);
      this.text_image_response = "Загрузка изображений";
      this.bool_image = true;

      Vue.axios
        .post("https://imperiaclean.ru/method/get_photos.php", str)
        .then(response => {
          var answer = response.data;
          this.images = answer;
          this.bool_image = false;
        })
        .catch(error => {
          var answer = error;
          this.text_image_response = "Ошибка загрузки";
          this.bool_image = true;
          this.error_load = true;
          this.images = answer;
        });
    }
  },
  mounted() {
    this.get_photos();
  }
};
</script>