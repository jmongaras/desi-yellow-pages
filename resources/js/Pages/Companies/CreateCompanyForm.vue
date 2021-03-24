<template>
    <jet-form-section @submitted="createCompany">
        <template #title> Company Details </template>

        <div v-if="$page.flash.success" class="green">
            {{ $page.flash.success }}
        </div>
        <div v-if="$page.flash.error" class="red">
            {{ $page.flash.error }}
        </div>

        <template #form>
            <div class="col-span-6">
                <jet-label value="Team Owner" />

                <div class="flex items-center mt-2">
                    <img
                        class="w-12 h-12 rounded-full object-cover"
                        :src="$page.props.user.profile_photo_url"
                        :alt="$page.props.user.name"
                    />

                    <div class="ml-4 leading-tight">
                        <div>{{ $page.props.user.name }}</div>
                        <div class="text-gray-700 text-sm">
                            {{ $page.props.user.email }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Company Name" />
                <jet-input
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autofocus
                />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-dropdown align="right" width="60" v-if="true">
                    <Options>Test</Options>
                </jet-dropdown>
                
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Create
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetDropDown from "@/Jetstream/Dropdown";

export default {
    components: {
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetDropDown,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: "",
                type: "",
                rate: "",
            }),
        };
    },

    methods: {
        createCompany() {
            this.form.post(route("company.store"), {
                errorBag: "createCompany",
                preserveScroll: true,
            });
        },
    },
};
</script>
