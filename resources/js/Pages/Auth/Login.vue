<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div class="sm:flex sm:grow">
        <div class="min-h-screen flex flex-col grow sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900 sm:w-0">
            <AuthenticationCard>
                <template #logo>
                    <AuthenticationCardLogo />
                    <h2 class="text-xl text-white pt-10 pb-4">Sign in to your account</h2>
                    <p class="text-sm text-white">Haven't you received an invite? <a href="mailto:admin@straam.com" class="text-blue">Email STRAAM</a></p>
                </template>

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

                    <div class="mt-4">
                        <InputLabel for="password" value="Password*" />
                        <TextInput
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-full"
                            required
                            autocomplete="current-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="flex justify-between w-full mt-4">
                        <label class="flex justify-start items-center">
                            <Checkbox v-model:checked="form.remember" name="remember" />
                            <span class="ml-2 text-sm text-white">Remember me</span>
                        </label>

                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="
                                flex
                                justify-end
                                items-center
                                text-sm
                                rounded-md 
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700
                                text-white
                            "
                        >
                            Forgot your password?
                        </Link>
                    </div>

                    <div class="flex items-center">
                        <PrimaryButton class="mt-4 w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Sign In
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
    background-image: url(/images/login.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
</style>
