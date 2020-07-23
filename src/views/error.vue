<template>
  <div class="main_preview">
    <section class="main_section" id="error_page">
      <div class="wrapper">
        <div class="center">
            <div class="name_section">
            Страница не <span class="error">найдена</span>
          </div>
        </div>
        <div class="left">
        </div>
        <div class="right"></div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
    props:['ct'],
    data:()=>({
        
    }),
    computed:{
        
    },
    methods:{
        full_screen(){
            var nav = document.querySelector('nav').clientHeight
            var header = document.querySelector('header').clientHeight
            var footer = document.querySelector('footer').clientHeight

            var full = window.innerHeight-nav-header-footer

            document.querySelector("section").style.height = full +"px"
        }
    },
    mounted(){
        this.full_screen();
        document.title = "Ошибка | Империя чистоты | " + this.ct
    }
}
</script>
