<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create Account',
        href: '/accounts',
    },
];

const page = usePage();
console.log(page.props['csrf_token'])
</script>

<template>
    <Head title="Create Account" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-8 lg:p-12">
            <Form
                method="post"
                :action="route('accounts.store')"
            >
                <input type="hidden" name="_token" :value="page.props['csrf_token']" />

                <Label for="name">Name</Label>
                <Input
                    name="name"
                    type="text"
                />

                <Label for="company">Company</Label>
                <Input
                    name="company"
                    type="text"
                />

                <Label for="type">Type</Label>
                <Input
                    name="type"
                    type="text"
                />

                <Button type="submit">
                    Create
                </Button>
            </Form>
        </div>
    </AppLayout>
</template>
