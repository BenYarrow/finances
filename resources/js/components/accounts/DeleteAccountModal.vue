<script setup lang="ts">
    import { useForm } from '@inertiajs/vue3';
    import { Button } from '@/components/ui/button';
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

    defineProps<{
        account: Account;
    }>();

    const form = useForm({});

    const deleteAccount = (e: Event, id: number) => {
        e.preventDefault();

        form.delete(route('accounts.destroy', { account: id }), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
            onFinish: () => form.reset(),
        });
    };

    const closeModal = () => {
        form.clearErrors();
        form.reset();
    };
</script>

<template>
    <Dialog>
        <DialogTrigger as-child>
            <button variant="destructive" class="p-1 rounded bg-red-600 text-white">
                <Icon :name="'minus'" class="group-hover:scale-[1.3] transition-transform duration-300" />
            </button>
        </DialogTrigger>
        <DialogContent>
            <form class="space-y-6" @submit="(e: Event) => deleteAccount(e, account.id)">
                <DialogHeader class="space-y-3">
                    <DialogTitle>Are you sure you want to delete this account?</DialogTitle>
                    <DialogDescription>
                        Once your account is deleted, all of its resources and data will also be permanently deleted. Please enter your
                        password to confirm you would like to permanently delete your account.
                    </DialogDescription>
                </DialogHeader>

                <DialogFooter class="gap-2">
                    <DialogClose as-child>
                        <Button variant="secondary" @click="closeModal">
                            Cancel
                        </Button>
                    </DialogClose>

                    <Button variant="destructive" :disabled="form.processing">
                        <button type="submit">Delete account</button>
                    </Button>
                </DialogFooter>
            </form>
        </DialogContent>
    </Dialog>
</template>
