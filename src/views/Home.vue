<template>
  <div class="main_preview">
    <section id="about_us" class="main_section">
      <div class="wrapper">
        <div class="left">
          <div class="name_section">
            <span>профессиональная</span> уборка
          </div>
          <h1
            class="h_text"
          >Мы осуществляем уборку квартир, домов, офисных помещений, производственных зданий, мойку окон, витражей, химчистку мягкой мебели и ковровых покрытий</h1>
          <div class="btn">
            <router-link :to="'/calculation/'+ct">Рассчитать стоимость</router-link>
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
            <div id="timer">
              <div class="name_timer">До конца акции:</div>
              <div class="time">
                <div id="d">
                  {{convert()[0]}}
                  <span>дней</span>
                </div>
                <div id="h">{{convert()[1]}}:</div>
                <div id="m">{{convert()[2]}}:</div>
                <div id="s">{{convert()[3]}}</div>
              </div>
            </div>
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
              <router-link :to="'/calculation/'+ct">Рассчитать стоимость</router-link>
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
        <div class="right"></div>
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
                @click="full_frame_image"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="main_section" id="services">
      <div class="wrapper">
        <div class="left">
          <div class="name_section">
            Наши
            <span>услуги</span>
          </div>
        </div>
        <div class="right"></div>
        <div class="center">
          <div class="grid">
            <div class="stack first">
              <div class="service_block">
                <div class="card">
                  <div class="name_service">Генеральная уборка</div>
                  <div class="service_image">
                    <img src="/img/2.jpg" alt />
                  </div>
                  <div class="btn">
                    <router-link to="/general">Подробнее</router-link>
                  </div>
                </div>
              </div>
              <div class="service_block">
                <div class="card">
                  <div class="name_service">Химчистка мягкой мебели</div>
                  <div class="service_image">
                    <img src="/img/4.jpg" alt />
                  </div>
                  <div class="btn">
                    <router-link to="/soft">Подробнее</router-link>
                  </div>
                </div>
              </div>
            </div>
            <div class="stack second">
              <div class="service_block">
                <div class="card">
                  <div class="name_service">Уборка после ремонта</div>
                  <div class="service_image">
                    <img src="/img/5.jpg" alt />
                  </div>
                  <div class="btn">
                    <router-link to="/arepair">Подробнее</router-link>
                  </div>
                </div>
              </div>
              <div class="service_block">
                <div class="card">
                  <div class="name_service">Поддерживающая уборка</div>
                  <div class="service_image">
                    <img src="/img/1.jpg" alt />
                  </div>
                  <div class="btn">
                    <router-link to="/clear">Подробнее</router-link>
                  </div>
                </div>
              </div>
            </div>
            <div class="stack three">
              <div class="service_block">
                <div class="card">
                  <div class="name_service margin_transition">Мойка окон</div>
                  <div class="service_image">
                    <img src="/img/3.jpg" alt />
                  </div>
                  <div class="btn">
                    <router-link to="/window">Подробнее</router-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="service_price">
          <div class="center">
            <div class="name_section">
              <span>цены</span> на услуги
            </div>
          </div>
          <div class="left">
            <div class="small_service_name">Основные услуги</div>
            <div class="price_block">
              <div class="name_service">Генеральная уборка</div>
              <div class="price_service">от 70 руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Уборка после ремонта</div>
              <div class="price_service">от 90 руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Мойка окон</div>
              <div class="price_service">от 200 руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Мойка окон после ремонта</div>
              <div class="price_service">от 250 руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Витражи</div>
              <div class="price_service">от 150 руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Выннос мусора (до 5кг - бесплатно)</div>
              <div class="price_service">от 500 руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Химчистка мягкой мебели</div>
              <div class="price_service">от 500 руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Химчистка напольных покрытий</div>
              <div class="price_service">от 150 руб.</div>
            </div>
          </div>
          <div class="right">
            <div class="small_service_name">Дополнительные услуги</div>
            <div class="price_block">
              <div class="name_service">Мытье холодильнка</div>
              <div class="price_service">от 500р руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Микроволновая печь</div>
              <div class="price_service">от 300 руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Духовой шкаф</div>
              <div class="price_service">от 500 руб.</div>
            </div>
            <div class="price_block">
              <div class="name_service">Кухонный гарнитур</div>
              <div class="price_service">от 1000 руб.</div>
            </div>
          </div>
        </div>
        <div class="block_for_button">
          <div class="btn">
            <router-link :to="'/calculation/'+ct">Рассчитать стоимость</router-link>
          </div>
          <div class="btn">
            <router-link :to="'/callBack/'+ct">Заказать звонок</router-link>
          </div>
        </div>
      </div>
    </section>
    <section class="main_section" id="feedback">
      <div class="wrapper">
        <div class="left">
          <div class="name_section">
            Отзывы наших <span>клиентов</span>
          </div>
        </div>
        <div class="right"></div>
        <div class="center">
          <div class="fb">
            <div class="avatar">
              <img src="img/girl_user.png" alt="">
            </div>
            <div class="name_user">
              Наталья
            </div>
            <div class="date">
              20.05.2020
            </div>
            <div class="message">
              Очень довольна результатом. Приобрели квартиру в ужастном состоянии,пытались сделать уборку своими силами, но не справились,результат желал лучшего.Решила обратится в клининговую компанию Империя чистоты , Очень благодарна клинерам Светлане и Ольге,которые привели мою квартиру в порядок.Цена порадовала.Я думала ,что никто не справится .Девушки приехали в удобный мне день .Спасибо вам огромное! Желаю Вам успехов и развития
            </div>
          </div>
          <div class="fb">
            <div class="avatar">
              <img src="img/man_user.png" alt="">
            </div>
            <div class="name_user">
              Юрий
            </div>
            <div class="date">
              19.07.2020
            </div>
            <div class="message">
              Спасибо за качественную уборку офиса. Своевременно оформили все документы и приехали в нужное нам время, клинеры сразу видно опытные, современное оборудование, нам очень понравилось. Будем обращаться еще.
            </div>
          </div>
          <div class="fb">
            <div class="avatar">
              <img src="img/girl_user_2.png" alt="">
            </div>
            <div class="name_user">
              Людмила
            </div>
            <div class="date">
              27.07.2020
            </div>
            <div class="message">
              Хочу выразить благодарность компании Империя чистоты.Заказала уборку своей бабушке. Квартира была запущена.Было очень тяжело,но клинеры справились,отмыли до блеска,идеально.Также понравилась химчистка ковров,хотели с ними расстатся,теперь как новые.Как хорошо что есть такие службы,которые за небольшую плату готовы придти на помощь.Еще раз спасибо вам.
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
    sort: "DESC",
    sort_type: [
      { type: "Новее", mask: "DESC" },
      { type: "Страше", mask: "ASC" },
    ],
    current_time: 0,
    isActive: false,
    timer: null,
    images: null,
    bool_image: false,
    text_image_response: "",
    error_load: false,
  }),
  methods: {
    start_timer() {
      this.timer = setInterval(() => {
        this.current_time--;
      }, 1000);
    },
    stop_timer() {
      clearTimeout(this.timer);
    },
    full_frame_image(event) {
      var src = event.path[0].currentSrc;
      window.location.assign(src);
    },

    get_photos() {
      var param = {
        quantity: this.quantity,
        sort: this.sort,
      };

      const str = JSON.stringify(param);
      this.text_image_response = "Загрузка изображений";
      this.bool_image = true;

      Vue.axios
        .post("https://imperiaclean.ru/method/get_photos.php", str)
        .then((response) => {
          var answer = response.data;
          this.images = answer;
          this.bool_image = false;
        })
        .catch((error) => {
          var answer = error;
          this.text_image_response = "Ошибка загрузки";
          this.bool_image = true;
          this.error_load = true;
          this.images = answer;
          console.log(error.data);
        });
    },
    convert() {
      var d = (this.current_time / 86400) ^ 0;
      var h = (this.current_time / 3600) ^ 0;

      var hs = ((this.current_time - d * 86400) / 3600) ^ 0;

      var m = ((this.current_time - h * 3600) / 60) ^ 0;
      var s = this.current_time - h * 3600 - m * 60;
      return [d, hs, m, s];
    },
  },
  watch: {
    current_time(time) {
      this.convert();
      if (time === 0) {
        this.stop_timer();
      }
    },
  },
  mounted() {
    this.current_time = Math.floor(Math.random() * (892229 - 522229)) + 522229;
    // this.current_time = Math.floor(86401*2)
    this.convert();
    this.get_photos();
    this.start_timer();
  },
};
</script>