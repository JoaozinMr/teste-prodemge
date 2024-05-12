<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps(["citizens"]);

</script>

<template>

  <Head title="Cidadão" />

  <AuthenticatedLayout>
    <div v-for="citizen in citizens" class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8 lg:max-w-4xl">
      <h1 class="text-2xl font-semibold text-gray-900 mb-4 border-b-4 border-red-300 rounded"> Cidadão {{ citizen.id }}
      </h1>
      <form>
        <div class="mb-4">
          <h2 class="text-xl font-semibold text-gray-900 mb-4 underline">Nome</h2>
          {{ citizen.name }}
        </div>
        <div class="mb-4">
          <h2 class="text-xl font-semibold text-gray-900 mb-4 underline">Nome Social</h2>
          {{ citizen.social_name ?? 'Não informado' }}
        </div>
        <div class="mb-4">
          <h2 class="text-xl font-semibold text-gray-900 mb-4 underline">Email</h2>
          {{ citizen.email }}
        </div>
        <div class="mb-4">
          <h2 class="text-xl font-semibold text-gray-900 mb-4 underline">CPF</h2>
          {{ citizen.cpf }}
        </div>
        <div class="mb-4">
          <h2 class="text-xl font-semibold text-gray-900 mb-4 underline">Telefone</h2>
          {{ citizen.phone ?? 'Não informado' }}
        </div>
        <div class="mb-4">
          <h2 class="text-xl font-semibold text-gray-900 mb-4 underline">Nome do pai</h2>
          {{ citizen.father_name ?? 'Não informado' }}
        </div>
        <div class="mb-4">
          <h2 class="text-xl font-semibold text-gray-900 mb-4 underline">Nome da mãe</h2>
          {{ citizen.mother_name ?? 'Não informado' }}
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>