<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List of companies
            </h2>
            <jet-dropdown-link :href="route('company.create')" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-primary hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-primary-50 active:bg-gray-50 transition ease-in-out duration-150">
                Add Company
            </jet-dropdown-link>
            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <table class="center">
                <thead>
                    <th> Id </th>
                    <th> Name </th>
                    <th> Action </th>
                </thead>
                <tbody>
                    <tr v-for="post in companies" :key="post.id">
                        <td>  {{ post.id }} </td>
                        <td>  {{ post.name }} </td>  
                    </tr>
                </tbody>
                </table>
                </div>
            </div>
        </template>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetButton from "@/Jetstream/Button";

export default {
    props: ["companies"],
    components: {
        AppLayout,
        JetDropdownLink,
        JetButton,
    },
};
</script>
<style>
    .center{
         margin-left: auto;
  margin-right: auto;
    }
</style>