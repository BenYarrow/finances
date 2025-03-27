<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue';
    import { type BreadcrumbItem } from '@/types';
    import { Head, usePage } from '@inertiajs/vue3';
    import { Input } from '@/components/ui/input';
    import { Label } from '@/components/ui/label';
    import { Button } from '@/components/ui/button';


    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Accounts',
            href: '/accounts',
        },
        {
            title: 'Create Account',
            href: '/accounts/create',
        },
    ];

    const page = usePage();
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

                <Button type="submit" class="mt-2">
                    Create
                </Button>
            </Form>
        </div>
    </AppLayout>
</template>
