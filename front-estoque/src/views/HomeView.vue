<script>
import axios from 'axios';

export default {
  name: 'produtodoDia',
  data(){
    return{
      produtodoDia:Array
    }
  },
  created() {
    this.getprodutodoDia();
  },
  methods: {
    async getprodutodoDia(){
      let url = 'http://127.0.0.1:8000/api/site';
      await axios.get(url).then(response => {
        // console.log(response.data);
        this.produtodoDia = response.data;
      }).catch(error => {
        console.log(error);
      });
    }
  },
}


</script>

<template>
  <main>
    <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:text-center">
        <h2 class="text-base font-semibold leading-7 text-indigo-600">{{produtodoDia.nome}}</h2>
        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{produtodoDia.marca.nome}}</p>
        <p class="mt-6 text-lg leading-8 text-gray-600">Preço: {{ produtodoDia.preco }}</p>
        
      </div>
      <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
        <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
          <div v-for="feature in features" :key="feature.name" class="relative pl-16">
            <dt class="text-base font-semibold leading-7 text-gray-900">
              <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                <component :is="feature.icon" class="h-6 w-6 text-white" aria-hidden="true" />
              </div>
              {{ feature.name }}
            </dt>
            <dd class="mt-2 text-base leading-7 text-gray-600">{{ feature.description }}</dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
  </main>
</template>
