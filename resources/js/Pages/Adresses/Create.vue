<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
  adress_type: "",
  cep: "",
  street: "",
  number: "",
  complement: "",
  neighborhood: "",
  city: "",
  state: "",
  citizen_id: "",
});
</script>

<template>

  <Head title="Cadastrar Endereço" />

  <AuthenticatedLayout>
    <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8 lg:max-w-4xl">
      <form @submit.prevent="
        form.post(route('adresses.store'), {
          onSuccess: () => {
            form.reset();
            console.log('Endereço cadastrado com sucesso!');
          }
        })
        ">
        <div class="mb-4">
          <label for="citizen_id" class="block text-sm font-medium text-gray-700">Id do Cidadão *</label>
          <InputError :message="form.errors.citizen_id" class="my-2" />
          <input type="text" id="citizen_id" v-model="form.citizen_id" required
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="adress_type" class="block text-sm font-medium text-gray-700">Tipo de Endereço *</label>
          <InputError :message="form.errors.adress_type" class="my-2" />
          <input type="text" id="adress_type" v-model="form.adress_type" required
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="cep" class="block text-sm font-medium text-gray-700">CEP *</label>
          <InputError :message="form.errors.cep" class="my-2" />
          <input type="text" id="cep" v-model="form.cep" required placeholder="00000-000" maxlength="9"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="street" class="block text-sm font-medium text-gray-700">Logradouro *</label>
          <InputError :message="form.errors.street" class="my-2" />
          <input type="text" id="street" v-model="form.street" required
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="number" class="block text-sm font-medium text-gray-700">Número *</label>
          <InputError :message="form.errors.number" class="my-2" />
          <input type="text" id="number" v-model="form.number" required
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="complement" class="block text-sm font-medium text-gray-700">Complemento</label>
          <InputError :message="form.errors.complement" class="my-2" />
          <input type="text" id="complement" v-model="form.complement"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="neighborhood" class="block text-sm font-medium text-gray-700">Bairro *</label>
          <InputError :message="form.errors.neighborhood" class="my-2" />
          <input type="text" id="neighborhood" v-model="form.neighborhood" required
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="city" class="block text-sm font-medium text-gray-700">Cidade *</label>
          <InputError :message="form.errors.city" class="my-2" />
          <input type="text" id="city" v-model="form.city" required
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="state" class="block text-sm font-medium text-gray-700">Estado *</label>
          <InputError :message="form.errors.state" class="my-2" />
          <input type="text" id="state" v-model="form.state" required
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <PrimaryButton type="submit">Cadastrar</PrimaryButton>
      </form>
    </div>
  </AuthenticatedLayout>
</template>