<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Account } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Accounts',
        href: '/accounts',
    },
];

defineProps<{
    accounts: Account[];
}>();
</script>

<template>
    <Head title="Accounts" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="container mx-auto">
            <ul>
                <li v-for="account in accounts" :key="account.id">
                    {{ account.name }}
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
