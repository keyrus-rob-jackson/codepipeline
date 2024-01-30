<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />

    <div class="sm:flex sm:grow">
        <div class="min-h-screen flex flex-col grow sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900 sm:w-0">
            <AuthenticationCard>
                <template #logo>
                    <AuthenticationCardLogo />
                    <h2 class="text-xl text-white pt-10 pb-4">Reset Password</h2>
                    <a href="mailto:admin@straam.com" class="text-white">Cancel</a>
                </template>

                <div class="mb-4 text-sm text-gray-500">
                    Enter your email, and we will send you a link to reset your password. Need more help? Reach out to our team at <a href="mailto:info@straamgroup.com">info@straamgroup.com</a>
                </div>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email address*" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="mt-4 w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Get Recovery Link
                        </PrimaryButton>
                    </div>
                </form>
            </AuthenticationCard>
        </div>
        <div class="flex grow overlay"></div>
    </div>
</template>

<style scoped>
.overlay {
    background-image: url(/images/forgot.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
</style>
