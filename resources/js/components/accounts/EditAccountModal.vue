<script setup lang="ts">
    import { useForm } from '@inertiajs/vue3';
    import { Button } from '@/components/ui/button';
    import { Input } from '@/components/ui/input';
    import { Label } from '@/components/ui/label';
    import {
        Dialog,
        DialogClose,
        DialogContent,
        DialogDescription,
        DialogFooter,
        DialogHeader,
        DialogTitle,
        DialogTrigger,
    } from '@/components/ui/dialog';

    import { Account } from '@/types';

    import Icon from '@/components/Icon.vue';

    const props = defineProps<{
        account: Account;
    }>();

    const form = useForm({
        name: props.account.name,
        company: props.account.company,
        type: props.account.type,
    });

    const closeModal = () => {
        form.clearErrors();
        form.reset();
    };

    const updateAccount = (e: Event, id: number) => {
        e.preventDefault();

        form.post(route('accounts.update', { account: id }), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
            onFinish: () => closeModal(),
        });
    }
</script>

<template>
    <Dialog>
        <DialogTrigger >
            <button class="p-1 rounded border border-gray-400 text-gray-400">
                <Icon :name="'pencil'" class="group-hover:scale-[1.3] transition-transform duration-300" />
            </button>
        </DialogTrigger>

        <DialogContent>
            <DialogHeader class="space-y-3">
                <DialogTitle>edit?</DialogTitle>

                <DialogDescription>
                    Some shit goes here
                </DialogDescription>
            </DialogHeader>

            <form
                class="space-y-6"
                @submit="(e: Event) => updateAccount(e, account.id)"
            >
                <Label for="name">Name</Label>
                <Input
                    name="name"
                    type="text"
                    v-model="form.name"
                />

                <Label for="company">Company</Label>
                <Input
                    name="company"
                    type="text"
                    v-model="form.company"
                />

                <Label for="type">Type</Label>
                <Input
                    name="type"
                    type="text"
                    v-model="form.type"
                />

                <DialogFooter class="gap-2">
                    <DialogClose as-child>
                        <Button variant="secondary" @click="closeModal">
                            Cancel
                        </Button>
                    </DialogClose>

                    <Button :disabled="form.processing">
                        <button type="submit">Save</button>
                    </Button>
                </DialogFooter>
            </form>
        </DialogContent>
    </Dialog>
</template>

