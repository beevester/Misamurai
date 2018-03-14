<template>
  <div>
    <form action="POST">
      <div class="card">
        <div class="card-header">
          <input type="text" v-model="search" placeholder="Search Nominee" @keyup.enter="available = !available" @keyup.once="available = !available">
            <div>
              <ul :class="{canvas: available}">
                <li v-for="n in filteredUsers" @click="search => n.username">
                  {{n.username}}
                </li>
              </ul>
            </div>
        </div>
        <div class="card-body">
            <label for="">comment</label></br>
            <input type="textarea" name="post"></br>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit">Nominate</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
  define(['Vue'], function(Vue){
      Vue.component('vue-app',{
        template: template,
        props: ['nominees', 'user'],
        data() {
          return {
          available: false,
          nearby: false,
          search: '',
          }
        },
        computed: {
          filteredUsers: function(){
            return this.nominees.filter((n)=> {
              if (!this.search == '')
              return n.username.match(this.search)
            });
          },
        }
      })

      new Vue({
        el: "#app"
      })
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
