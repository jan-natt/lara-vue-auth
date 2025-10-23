<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome to StudyAI" />

    <div class="relative min-h-screen bg-dots-darker bg-center bg-gray-50 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-primary-500 selection:text-white">
        <!-- Navigation -->
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:end-0 p-6 text-end z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-primary-500">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-primary-500">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ms-4 font-semibold bg-primary-500 text-white px-4 py-2 rounded-lg hover:bg-primary-600 transition-colors">
                    Get Started
                </Link>
            </template>
        </div>

        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16 text-center lg:pt-32">
            <h1 class="mx-auto max-w-4xl text-5xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-7xl">
                Your Personal
                <span class="gradient-text bg-gradient-to-r from-primary-500 to-secondary-500">AI Study Companion</span>
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg text-gray-600 dark:text-gray-400 sm:text-xl">
                Upload your notes and textbooks, and let our AI create personalized quizzes to enhance your learning. Track your progress and master any subject faster.
            </p>
            <div class="mt-10 flex justify-center gap-x-6">
                <Link v-if="canRegister" :href="route('register')" class="rounded-lg bg-primary-500 px-6 py-3 text-lg font-semibold text-white shadow-sm hover:bg-primary-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-500 transition-colors">
                    Start Learning Now
                </Link>
                <a href="#" class="rounded-lg bg-white px-6 py-3 text-lg font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-white dark:ring-gray-700 transition-colors">
                    <i class="fas fa-play-circle mr-2"></i>Watch Demo
                </a>
            </div>
        </div>

        <!-- Features Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1: Upload & Parse -->
                <div class="scale-100 p-8 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-2xl shadow-xl shadow-gray-500/20 dark:shadow-none flex flex-col card-hover">
                    <div class="h-16 w-16 gradient-bg flex items-center justify-center rounded-full mb-6">
                        <i class="fas fa-file-upload text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Upload & Parse</h3>
                    <p class="text-gray-600 dark:text-gray-400 flex-grow">
                        Simply upload your PDFs, textbooks, or notes. Our advanced parsing technology extracts key concepts automatically.
                    </p>
                    <div class="mt-6">
                        <span class="inline-flex items-center gap-x-1.5 rounded-full bg-primary-100 px-3 py-1 text-sm font-medium text-primary-800 dark:bg-primary-900/30 dark:text-primary-300">
                            <i class="fas fa-brain mr-1"></i> AI-Powered
                        </span>
                    </div>
                </div>

                <!-- Feature 2: AI-Generated Quizzes -->
                <div class="scale-100 p-8 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-2xl shadow-xl shadow-gray-500/20 dark:shadow-none flex flex-col card-hover">
                    <div class="h-16 w-16 gradient-bg flex items-center justify-center rounded-full mb-6">
                        <i class="fas fa-question-circle text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">AI-Generated Quizzes</h3>
                    <p class="text-gray-600 dark:text-gray-400 flex-grow">
                        Our AI analyzes your content and creates personalized quizzes with various question types to test your understanding.
                    </p>
                    <div class="mt-6">
                        <span class="inline-flex items-center gap-x-1.5 rounded-full bg-secondary-100 px-3 py-1 text-sm font-medium text-secondary-800 dark:bg-secondary-900/30 dark:text-secondary-300">
                            <i class="fas fa-robot mr-1"></i> Adaptive Learning
                        </span>
                    </div>
                </div>

                <!-- Feature 3: Progress Tracking -->
                <div class="scale-100 p-8 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-2xl shadow-xl shadow-gray-500/20 dark:shadow-none flex flex-col card-hover">
                    <div class="h-16 w-16 gradient-bg flex items-center justify-center rounded-full mb-6">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Progress Tracking</h3>
                    <p class="text-gray-600 dark:text-gray-400 flex-grow">
                        Visualize your learning journey with detailed analytics. Identify strengths and weaknesses to focus your study efforts.
                    </p>
                    <div class="mt-6">
                        <span class="inline-flex items-center gap-x-1.5 rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-800 dark:bg-green-900/30 dark:text-green-300">
                            <i class="fas fa-trophy mr-1"></i> Gamified
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">How StudyAI Works</h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Transform your study materials into an interactive learning experience in just a few steps</p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <div class="relative">
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                            <div class="flex items-center mb-4">
                                <div class="h-10 w-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold mr-4">1</div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Upload Your Materials</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">Upload PDFs, textbooks, or notes in various formats. Our system supports most document types.</p>
                            <div class="border border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center">
                                <i class="fas fa-cloud-upload-alt text-3xl text-primary-500 mb-2"></i>
                                <p class="text-gray-500 dark:text-gray-400">Drag & drop your files here</p>
                            </div>
                        </div>
                        <div class="absolute -bottom-6 -right-6 h-12 w-12 bg-primary-500 rounded-full flex items-center justify-center text-white floating">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 md:pl-12">
                    <div class="space-y-8">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">2</div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">AI Content Analysis</h3>
                                <p class="text-gray-600 dark:text-gray-400 mt-1">Our AI identifies key concepts, topics, and relationships in your materials.</p>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">3</div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Personalized Quiz Generation</h3>
                                <p class="text-gray-600 dark:text-gray-400 mt-1">Receive customized quizzes with multiple question types based on your content.</p>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">4</div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Track & Improve</h3>
                                <p class="text-gray-600 dark:text-gray-400 mt-1">Monitor your progress with detailed analytics and get recommendations for improvement.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="gradient-bg rounded-2xl mx-4 sm:mx-6 lg:mx-8 my-16 p-8 sm:p-12 text-center text-white">
            <h2 class="text-3xl font-bold mb-4">Ready to Transform Your Study Habits?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Join thousands of students who are already studying smarter with AI</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <Link v-if="canRegister" :href="route('register')" class="bg-white text-primary-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Start Free Trial
                </Link>
                <a href="#" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white/10 transition-colors">
                    Schedule a Demo
                </a>
            </div>
            <p class="mt-6 text-sm opacity-80">No credit card required • 14-day free trial</p>
        </div>

        <!-- Footer -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 border-t border-gray-200 dark:border-gray-700">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="h-8 w-8 rounded-full gradient-bg flex items-center justify-center text-white mr-2">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-900 dark:text-white">StudyAI</span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 text-sm">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Import Font Awesome */
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
</style>