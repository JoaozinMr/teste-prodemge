<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";


const form = useForm({
  name: "",
  social_name: "",
  email: "",
  phone: "",
  cpf: "",
  father_name: "",
  mother_name: "",
});
</script>

<template>

  <Head title="Cadastrar Cidadão" />

  <AuthenticatedLayout>
    <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8 lg:max-w-4xl">
      <form @submit.prevent="
        form.post(route('citizens.store'), {
          onSuccess: () => form.reset(),
        })
        ">
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Nome *</label>
          <InputError :message="form.errors.name" class="my-2" />
          <input type="text" id="name" v-model="form.name" required
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="socialName" class="block text-sm font-medium text-gray-700">Nome Social</label>
          <InputError :message="form.errors.social_name" class="my-2" />
          <input type="text" id="socialName" v-model="form.social_name"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
          <InputError :message="form.errors.email" class="my-2" />
          <input type="email" id="email" v-model="form.email" required placeholder="seuemail@gmail.com"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="cpf" class="block text-sm font-medium text-gray-700">CPF *</label>
          <InputError :message="form.errors.cpf" class="my-2" />
          <input type="text" id="cpf" v-model="form.cpf" placeholder="000.000.000-00" required maxlength="14"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
          <InputError :message="form.errors.phone" class="my-2" />
          <input type="tel" id="phone" v-model="form.phone" placeholder="(99) 99999-9999"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="fatherName" class="block text-sm font-medium text-gray-700">Nome do Pai</label>
          <InputError :message="form.errors.father_name" class="my-2" />
          <input type="text" id="fatherName" v-model="form.father_name"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="motherName" class="block text-sm font-medium text-gray-700">Nome da Mãe</label>
          <InputError :message="form.errors.mother_name" class="my-2" />
          <input type="text" id="motherName" v-model="form.mother_name"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <PrimaryButton type="submit">Cadastrar</PrimaryButton>
      </form>
    </div>
  </AuthenticatedLayout>
</template>