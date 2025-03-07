<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Account } from '@/types';
import Icon from '@/components/Icon.vue';

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
        <div class="p-8 xl:p-12 space-y-8 xl:space-y-12">
            <div>
                <div class="prose max-w-none flex items-center justify-between">
                    <h2>
                        Overview
                    </h2>

                    <Link :href="route('accounts.create')" class="flex items-center gap-x-1 no-underline hover:underline group px-3 py-1 bg-primary rounded-md text-white hover:bg-primary-lighter">
                        Create Account <Icon :name="'plus'" class="group-hover:scale-[1.3] transition-transform duration-300" />
                    </Link>

                </div>
                <p class="prose">
                    Easily access and manage all your bank accounts in one place. Stay on top of your finances with detailed information about each account, including account names, balances, and recent transactions.
                </p>
            </div>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-8 xl:gap-12">
                <li v-for="account in accounts" :key="account.id" class="relative p-8 bg-sidebar flex justify-between border border-primary rounded-md">
                    <button class="absolute top-2 right-2 p-1 rounded bg-red-600 text-white">
                        <Icon :name="'minus'" class="group-hover:scale-[1.3] transition-transform duration-300" />
                    </button>

                    <div>
                        Image goes here
                    </div>
                    <ul class="w-7/12 space-y-2">
                        <li className="flex items-center justify-between space-x-2 p-2">
                            <p className="whitespace-nowrap">
                                Account name:
                            </p>

                            <span className='h-[1px] w-full border-b border-dashed border-gray-400'></span>

                            <p className="font-medium tabular-nums text-right sm:whitespace-nowrap text-brand-grey-700">
                                {{ account.name }}
                            </p>
                        </li>
                        <li className="flex items-center justify-between space-x-2 p-2">
                            <p className="whitespace-nowrap">
                                Account company:
                            </p>

                            <span className='h-[1px] w-full border-b border-dashed border-gray-400'></span>

                            <p className="font-medium tabular-nums text-right sm:whitespace-nowrap text-brand-grey-700">
                                {{ account.company }}
                            </p>
                        </li>
                        <li className="flex items-center justify-between space-x-2 p-2">
                            <p className="whitespace-nowrap">
                                Account type:
                            </p>

                            <span className='h-[1px] w-full border-b border-dashed border-gray-400'></span>

                            <p className="font-medium tabular-nums text-right sm:whitespace-nowrap text-brand-grey-700">
                                {{ account.type }}
                            </p>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>
