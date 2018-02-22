<template>
  <span>{{ message }}</span>
</template>

<script>
  define(['Vue'], function(Vue){
    Vue.component('vue-demo', {
        template: template,
        props: ['users'],

    })
  })
</script>