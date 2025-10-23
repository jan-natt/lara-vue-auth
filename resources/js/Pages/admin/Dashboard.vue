<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    users: Array,
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Admin Dashboard
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Welcome to the admin dashboard. Here you can manage users and other administrative tasks.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
