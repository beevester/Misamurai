<template>
  <div>

  </div>
</template>

<script>
  define(['Vue'], function(Vue){
      Vue.component('vue-app',{
        template: template,
        data() {
          return {
          available: false,
          nearby: false,
          search: '',
          }
        },

      }
    );
  });
</script>
<style scoped>
ul{
  width: 200px;
  height: auto;
  text-align: center;
  border: 1px solid whitesmoke;
  z-index: 1;
  position: absolute;
  background: whitesmoke;
  margin-top: 4px;
  display: none;
}
.canvas {
  display: block;
}

span{
  background:red;
  display: inline-block;
  padding: 10px;
  color: #fff;
  margin: 10px 0;
}

.card{
  width: fit-content;
}
.red span{
  background:green;
}

.nearby span:after{
  content: "nearby";
  margin-left: 10px;
}
</style>
