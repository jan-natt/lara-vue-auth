<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    email: '',
    otp: '',
});

const submit = () => {
    form.post(route('verify-otp.post'), {
        onFinish: () => form.reset('otp'),
        onSuccess: () => {
            // Redirect to login or dashboard after successful verification
            window.location.href = route('login');
        },
    });
};
</script>

<template>
    <Head title="Verify OTP" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="email"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="otp" value="OTP" />
                <TextInput
                    id="otp"
                    v-model="form.otp"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="one-time-code"
                />
                <InputError class="mt-2" :message="form.errors.otp" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Verify OTP
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
