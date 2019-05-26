<div class="card">
   <div class="card-body">
      <div class="">
         <button class="btn btn-primary"  @click="viewFilter = !viewFilter">
            <i class="fas fa-filter"></i>
         </button>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <transition name="fade" :duration="{ enter: 600, leave: 800 }">
            <Search
                  id="viewSearchFilter"
                  :total="params.total"
                  @click.native="index"
                  v-show="viewFilter"
            >
               <div class="field">
                  <input @keyup.enter="index()" v-model="filters.name" type="text" placeholder="Nome da Área">
               </div>
            </Search>
         </transition>
      </div>
   </div>

</div>