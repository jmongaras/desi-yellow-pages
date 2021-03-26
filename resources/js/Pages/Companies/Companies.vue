<template>
    <div class="mt-10 sm:mt-0">
        <div>
            <div class="hidden sm:block">
                <div class="py-8">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>
            <!-- Add Team Member -->
            <div class="md:grid md:grid-cols-3 md:gap-6">
                
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <table class="center">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr v-for="company in companies" :key="company.id">
                                <td>{{ company.id }}</td>
                                <td>{{ company.name }}</td>
                                <button
                                   @click="confirmCompanyDeletion(company)"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150"
                                >
                                    Delete
                                </button>
                                <button
                                   @click="editCompany(company)"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150"
                                >
                                    Edit
                                </button>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Delete Account
                </template>
                <template #content>
                    Are you sure you want to delete your company?
                </template>
                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Cancel
                    </jet-secondary-button>
                    <jet-danger-button class="ml-2" @click="remove()" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete Company
                    </jet-danger-button>
                </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetButton from "@/Jetstream/Button";
import JetDialogModal from '@/Jetstream/DialogModal'
import JetDangerButton from '@/Jetstream/DangerButton'

export default {
    props: [
        "companies"
    ],
    components: {
        AppLayout,
        JetDropdownLink,
        JetButton,
         JetDangerButton,
            JetDialogModal,
    },
     data() {
            return {
                confirmingUserDeletion: false,
                currentCompany: null,
                form: this.$inertia.form({
                    password: '',
                })
            }
        },
    methods: {
        remove() {
            this.confirmingUserDeletion = true;
            var data = this.currentCompany;
            data._method = "DELETE";
            this.$inertia.post("/company/" + data.id, data);
            this.closeModal();
        },
        getCompanies()
        {
            // console.log('eytey545');
            var con = this.$inertia.get("/get-all-companies");
            console.log(con);
        },
        confirmCompanyDeletion(c) {
            this.currentCompany = c;
                this.confirmingUserDeletion = true;
                setTimeout(() => this.$refs.password.focus(), 250)
        },
            closeModal() {
                this.confirmingUserDeletion = false
                this.form.reset()
            }
    },
    mounted() {
        this.getCompanies();
    },
};
</script>
<style>
.center {
    margin-left: auto;
    margin-right: auto;
}
</style>
