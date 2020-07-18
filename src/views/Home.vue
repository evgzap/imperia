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
  </div>
</template>
<script>
export default {
  props: ["ct"]
};
</script>