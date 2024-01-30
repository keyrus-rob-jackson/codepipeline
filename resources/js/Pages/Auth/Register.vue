<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.user.data);

const form = useForm({
    first_name: user.value.first_name,
    last_name:  user.value.last_name,
    email:  user.value.email,
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <div class="sm:flex sm:grow">
        <div class="min-h-screen flex flex-col grow sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900 sm:w-0">
            <AuthenticationCard>
                <template #logo>
                    <AuthenticationCardLogo />
                    <h2 class="text-xl text-white pt-10 pb-4">Please Set Your Password</h2>
                    <p class="text-white text-sm">Set a password for the invite to email email@demoaccount.com</p>
                </template>

                <form @submit.prevent="submit">
                    <div class="flex items-center justify-between">
                        <div>
                            <InputLabel for="first_name" value="First name*" />
                            <TextInput
                                id="first_name"
                                v-model="form.first_name"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <InputError class="mt-2" :message="form.errors.first_name" />
                        </div>
                        <div>
                            <InputLabel for="last_name" value="Last name*" />
                            <TextInput
                                id="last_name"
                                v-model="form.last_name"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <InputError class="mt-2" :message="form.errors.last_name" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email address*" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full"
                            required
                            autocomplete="username"
                            disabled
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
                            autocomplete="new-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password_confirmation" value="Confirm Password*" />
                        <TextInput
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            required
                            autocomplete="new-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                        <InputLabel for="terms">
                            <div class="flex items-center">
                                <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                                <div class="ms-2">
                                    I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                                </div>
                            </div>
                            <InputError class="mt-2" :message="form.errors.terms" />
                        </InputLabel>
                    </div>

                    <div class="mt-4">
                        <p class="text-white text-sm italic">
                            By pressing the Create Account button below, you agree to STRAAM Group's <a href="">Terms of Use</a>. See also our <a href="">Privacy Policy</a>.
                        </p>
                        <PrimaryButton class="mt-4 w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Complete Account Registration
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
    background-image: url(/images/register.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
</style>
