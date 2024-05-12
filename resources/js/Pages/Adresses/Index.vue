<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps(["adresses"]);

</script>

<template>

  <Head title="Cadastrar Endereço" />

  <AuthenticatedLayout>
    <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
      <div class="mb-4">
        <Link class="px-3 py-1 bg-gray-800 text-white rounded" :href="route('adresses.create')">Novo Endereço</Link>
      </div>
      <table class="w=full">
        <tr class="bg-gray-800 text-white">
          <th class="px-2 py-1 text-sm font-bold text-left">Cidadão</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Tipo</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Logradouro</th>
          <th class="px-2 py-1 text-sm font-bold text-left">CEP</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Número</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Complemento</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Bairro</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Cidade</th>
          <th class="px-2 py-1 text-sm font-bold text-left">Estado</th>
        </tr>

        <tr v-for="adress in adresses" :class="{ 'bg-gray-300': index % 2 == 0 }" key={{adress.id}}>
          <td class="px-2 py-1 text-sm text-left">{{ adress.citizen.name }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ adress.adress_type }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ adress.street }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ adress.cep }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ adress.number }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ adress.complement }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ adress.neighborhood }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ adress.city }}</td>
          <td class="px-2 py-1 text-sm text-left">{{ adress.state }}</td>
        </tr>
      </table>
    </div>
  </AuthenticatedLayout>
</template>