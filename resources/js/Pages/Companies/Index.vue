<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List of companies
            </h2>
            <jet-dropdown-link :href="route('company.create')">
                Add Company
            </jet-dropdown-link>
        </template>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetDropdownLink from "@/Jetstream/DropdownLink";

export default {
    components: {
        AppLayout,
        JetDropdownLink,
    },
};
</script>
