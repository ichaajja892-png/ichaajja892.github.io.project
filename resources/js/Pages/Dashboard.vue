<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

// Ambil data user yang sedang login dari Inertia props
const user = usePage().props.auth.user;
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-8 bg-gray-300 min-h-screen">
            <div class="mx-auto max-w-5xl sm:px-6 lg:px-8 space-y-4">
                
                <!-- Tombol Tambah Data -->
                <div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow uppercase text-sm">
                        TAMBAH DATA
                    </button>
                </div>

                <!-- Card Tabel Data -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="py-3 px-4 text-sm font-bold uppercase text-gray-700 w-1/3">NAME</th>
                                <th class="py-3 px-4 text-sm font-bold uppercase text-gray-700 w-1/3">EMAIL</th>
                                <th class="py-3 px-4 text-sm font-bold uppercase text-gray-700 text-right w-1/3">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Baris ini otomatis ngambil data dari akun yang lagi login -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 px-4 text-sm text-gray-800">{{ user.name }}</td>
                                <td class="py-4 px-4 text-sm text-gray-800">{{ user.email }}</td>
                                <td class="py-4 px-4 text-sm text-right space-x-2">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1.5 px-3 rounded text-xs uppercase">
                                        EDIT
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1.5 px-3 rounded text-xs uppercase">
                                        DELETE
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>