<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import { User, Mail, Phone, MapPin, MessageSquare, Plus } from '@lucide/vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Contacts',
                href: '/contact',
            },
        ],
    },
});

defineProps<{
    contacts: Array<{
        id: number;
        name: string;
        email: string;
        phone: string | null;
        address: string | null;
        message: string | null;
        status: string | null;
        created_at: string;
    }>;
}>();
</script>

<template>
    <Head title="Contacts" />

    <div class="flex h-full flex-1 flex-col gap-6 overflow-x-auto rounded-xl p-4">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Contacts</h1>
                <p class="text-muted-foreground text-sm mt-1">All contact submissions received.</p>
            </div>
            <div class="flex items-center gap-4">
                <Badge variant="secondary" class="text-sm px-3 py-1 hidden sm:inline-flex">
                    {{ contacts.length }} total
                </Badge>
                <Button as-child>
                    <Link href="/contact" class="flex items-center gap-2">
                        <Plus class="h-4 w-4" />
                        Add contact
                    </Link>
                </Button>
            </div>
        </div>

        <!-- Empty state -->
        <div v-if="contacts.length === 0"
            class="flex flex-1 items-center justify-center rounded-xl border border-dashed border-sidebar-border/70 p-12 text-center dark:border-sidebar-border">
            <div class="flex flex-col items-center gap-3">
                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-muted">
                    <User class="h-7 w-7 text-muted-foreground" />
                </div>
                <p class="font-medium">No contacts yet</p>
                <p class="text-sm text-muted-foreground">Contact submissions will appear here.</p>
            </div>
        </div>

        <!-- Contact cards grid -->
        <div v-else class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            <Card v-for="contact in contacts" :key="contact.id"
                class="flex flex-col hover:shadow-md transition-all duration-200 hover:border-primary/30">
                <CardHeader class="pb-3">
                    <div class="flex items-start justify-between gap-2">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary font-semibold text-sm">
                                {{ contact.name.charAt(0).toUpperCase() }}
                            </div>
                            <CardTitle class="text-base leading-tight">{{ contact.name }}</CardTitle>
                        </div>
                        <Badge v-if="contact.status" variant="outline" class="shrink-0 text-xs capitalize">
                            {{ contact.status }}
                        </Badge>
                    </div>
                </CardHeader>

                <CardContent class="flex-1 space-y-2 pt-0">
                    <div class="flex items-center gap-2 text-sm text-muted-foreground">
                        <Mail class="h-3.5 w-3.5 shrink-0" />
                        <span class="truncate">{{ contact.email }}</span>
                    </div>
                    <div v-if="contact.phone" class="flex items-center gap-2 text-sm text-muted-foreground">
                        <Phone class="h-3.5 w-3.5 shrink-0" />
                        <span>{{ contact.phone }}</span>
                    </div>
                    <div v-if="contact.address" class="flex items-center gap-2 text-sm text-muted-foreground">
                        <MapPin class="h-3.5 w-3.5 shrink-0" />
                        <span class="truncate">{{ contact.address }}</span>
                    </div>
                    <div v-if="contact.message" class="flex items-start gap-2 text-sm text-muted-foreground pt-1 border-t border-border mt-2">
                        <MessageSquare class="h-3.5 w-3.5 shrink-0 mt-0.5" />
                        <span class="line-clamp-2">{{ contact.message }}</span>
                    </div>
                </CardContent>
            </Card>
        </div>

    </div>
</template>
