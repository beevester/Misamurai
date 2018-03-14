<template>
  <div>
    <form action="{{path('store.permission')}}" method="POST">
      <div class="card">
        <div class="card-header">
        <h2>Create a new Permission</h2>
        </div>
        <div class="card-body">
            <select v-model="permissionType">
                <option disabled value="">Please select one</option>
                <option>basic</option>
                <option>Crud</option>
            </select>

            <div class="field" v-if="permissionType == 'crud'">

            </div>
            <div class="field" v-if="permissionType == 'Crud'">
              <label for="resource" class="label">Resource</label>
              <p class="control">
                <input type="text" class="input" name="resource" id="resource" v-model="resource" placeholder="The name of the resource">
              </p>{{resource}}
              <input type="checkbox" id="create" value="create" v-model="crudSelected">
              <label for="create">Create</label>
              <input type="checkbox" id="read" value="read" v-model="crudSelected">
              <label for="read">Read</label>
              <input type="checkbox" id="update" value="update" v-model="crudSelected">
              <label for="update">Update</label>
              <input type="checkbox" id="delete" value="delete" v-model="crudSelected">
              <label for="delete">Delete</label>
              <br>
              <input type="hidden" name="crud_selected" :value="crudSelected">
              <div class="column">
                <table class="table" v-if="resource.length >= 3 && crudSelected.length > 0">
                  <thead>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                  </thead>
                  <tbody>
                    <tr v-for="item in crudSelected">
                      <td v-text="crudName(item)"></td>
                      <td v-text="crudSlug(item)"></td>
                      <td v-text="crudDescription(item)"></td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
            <div class="field" v-if="permissionType == 'basic'">basic selected</div>

        </div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit">Create permission</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
  define(['Vue'], function(Vue){
      Vue.component('create-permssion',{
        template: template,
        data() {
          return {
              permissionType: 'Crud',
              resource: '',
              crudSelected: []
          }
        },
        methods: {
              crudName: function(item) {
                return item.substr(0,1).toUpperCase() + item.substr(1) +" " + this.resource.substr(0,1).toUpperCase() + this.resource.substr(1);
              },
              crudSlug: function(item) {
                return item.toLowerCase() + "-" + this.resource.toLowerCase();
              },
              crudDescription: function(item) {
                return "Allow a User to " + item.toUpperCase() + " a " + this.resource.substr(0,1).toUpperCase() + this.resource.substr(1);
              }
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
