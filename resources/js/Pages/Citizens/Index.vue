<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link } from "@inertiajs/vue3";
import { defineProps } from "vue";

import { ref } from "vue";

defineProps(["citizens"]);

const term = ref('');

/* const search = () => {
  inertia.replace(route('citizens.index', { term: this.term }));
}; */

</script>

<template>

  <Head title="Cidadãos" />

  <AuthenticatedLayout>
    <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
      <div class="p-4 justify-between w-full flex items-center">
        <div class="space-x-4">
          <label for="search">Buscar (Id, CPF ou Nome)</label>
          <input type="text" id="search" v-model="term" class="ml-2 px-2 py-1 text-sm rounded border">
          <button @click="search" class="px-3 py-1 bg-gray-800 text-white rounded">Buscar</button>
        </div>
        <div>
          <Link class="px-3 py-1 bg-gray-800 text-white rounded" :href="route('citizens.create')">Novo Cidadão</Link>
        </div>
      </div>
      <table class="w=full">
        <tr class="bg-gray-800 text-white">
          <th class="px-2 py-1 text-sm font-bold text-left">Id</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Nome</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Nome Social</th>
          <th class="px-2 py-1 text-sm font-bold text-left">CPF</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Email</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Telefone</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Ações</th>
        </tr>

        <tr v-for="citizen in citizens" :class="{ 'bg-gray-300': index % 2 == 0 }" key={{citizen.id}}>
          <td class="px-2 py-1 text-sm text-left">{{ citizen.id }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ citizen.name }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ citizen.social_name }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ citizen.cpf }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ citizen.email }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ citizen.phone }}</td>
          <td class="px-2 py-1 text-sm text-left">
            <Link class="px-3 py-1 bg-blue-500 text-white rounded" :href="route('citizens.edit', citizen.id)">Ver
            </Link>

          </td>
        </tr>
      </table>
    </div>
  </AuthenticatedLayout>
</template>
