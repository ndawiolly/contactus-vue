<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, Form } from '@inertiajs/vue3';
import { store as contactStore } from '@/routes/contact';
import { Button } from '@/components/ui/button';
import { Card, CardHeader, CardTitle, CardDescription, CardContent, CardFooter } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import InputError from '@/components/InputError.vue';
import { Alert, AlertTitle, AlertDescription } from '@/components/ui/alert';
import { AlignCenter, LoaderCircle, ArrowLeft } from '@lucide/vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Contact',
                href: '/contact',
            },

        ],
    },
});
</script>

<template>

    <Head title="Contact" />
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
        <!-- Back button -->
        <div>
            <Button variant="ghost" as-child class="gap-2 pl-0 hover:bg-transparent hover:opacity-70">
                <Link href="/contacts">
                    <ArrowLeft class="h-4 w-4" />
                    Back to Contacts List
                </Link>
            </Button>
        </div>
        <!-- <div class="relative min-h-[100vh] flex-1 pr-2 rounded-xl border border-sidebar-border/70 md-min-h-min"> -->
        <Card class="pr-2 pl-2 mx-full my-6">
            <CardHeader>
                <CardTitle>Contact</CardTitle>
                <CardDescription>Send us your details and w'll get back to you</CardDescription>
            </CardHeader>


            <Form v-bind="contactStore.form()" reset-on-success:options="{preserveScroll:true}"
                v-slot="{ errors, processing, recentlySuccessful }">
                <CardContent class="space-y-6">
                    <Alert v-if="recentlySuccessful" class="bg-green-50 text-green-900 border-green-200 dark:bg-green-900/20 dark:text-green-400 dark:border-green-800">
                        <AlertTitle>Success</AlertTitle>
                        <AlertDescription>Your message has been sent successfully.</AlertDescription>
                    </Alert>
                    <div class="grid gap-2">

                        <Label for="name">
                            Name
                        </Label>
                        <Input id="name" name="name" type="text" autocomplete="name" required
                            :aria-invalid="errors?.name ? 'true' : undefined" />
                        <InputError :message="(errors?.name as string)" />

                        <Label for="email">
                            Email
                        </Label>
                        <Input id="email" name="email" type="email" autocomplete="email" required
                            :aria-invalid="errors?.email ? 'true' : undefined" />
                        <InputError :message="(errors?.email as string)" />

                        <Label for="phone">
                            Phone
                        </Label>
                        <Input id="phone" name="phone" type="tel" autocomplete="tel" required
                            :aria-invalid="errors?.phone ? 'true' : undefined" />
                        <InputError :message="(errors?.phone as string)" />

                        <Label for="address">
                            Address
                        </Label>
                        <Input id="address" name="address" type="text" autocomplete="address" required
                            :aria-invalid="errors?.address ? 'true' : undefined" />
                        <InputError :message="(errors?.address as string)" />

                        <Label for="message">
                            Message
                        </Label>
                        <Input id="message" name="message" type="text" role="4" autocomplete="message" required
                            :aria-invalid="errors?.message ? 'true' : undefined"
                            class="placeholder:text-muted-foreground selection:text-primary-foreground dark:bg-input/30 border-input flex min-h[120px] w-full min-w-0 rounded-md border bg-background" />
                        <InputError :message="(errors?.message as string)" />
                    </div>
                </CardContent>

                <CardFooter class="flex justify-end mt-2">
                    <Button type="submit" :disabled="processing" :aria-busy="processing ? 'true' : undefined">
                        {{ processing ? 'Sending...' : 'Send Message' }}
                        <LoaderCircle v-if="processing" class="mr-2 h-4 w-4 animate-spin" />
                    </Button>
                </CardFooter>
            </Form>
        </Card>
    </div>
</template>
