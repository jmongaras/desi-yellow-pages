<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List of companies
            </h2>
            <jet-dropdown-link :href="route('company.create')" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-primary hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-primary-50 active:bg-gray-50 transition ease-in-out duration-150">
                Add Company
            </jet-dropdown-link>
        </template>
        <list-companies :companies="companies"> </list-companies>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetButton from "@/Jetstream/Button";
import ListCompanies from "@/Pages/Companies/Companies";

export default {
    props: ["companies"],
    components: {
        AppLayout,
        JetDropdownLink,
        JetButton,
        ListCompanies,
    },
};
</script>
<style>
    .center{
         margin-left: auto;
  margin-right: auto;
    }
</style>