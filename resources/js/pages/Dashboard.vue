<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { dashboard } from '@/routes';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Contact, GraduationCap, Users, ArrowUpRight } from '@lucide/vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Dashboard',
                href: dashboard(),
            },
        ],
    },
});

defineProps<{
    stats: {
        contacts: number;
        courses: number;
        users: number;
    };
}>();
</script>

<template>
    <Head title="Dashboard" />

    <div class="flex h-full flex-1 flex-col gap-6 overflow-x-auto rounded-xl p-4">

        <div>
            <h1 class="text-2xl font-bold tracking-tight">Dashboard</h1>
            <p class="text-muted-foreground text-sm mt-1">Welcome back! Here's an overview of your data.</p>
        </div>

        <!-- Stat cards -->
        <div class="grid gap-4 md:grid-cols-3">

            <!-- Contacts -->
            <Card class="group hover:shadow-md transition-all duration-200 hover:border-primary/30">
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium text-muted-foreground">Total Contacts</CardTitle>
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-500/10 text-blue-500">
                        <Contact class="h-5 w-5" />
                    </div>
                </CardHeader>
                <CardContent>
                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-4xl font-bold tracking-tight">{{ stats.contacts }}</p>
                            <p class="text-xs text-muted-foreground mt-1">Total registered contacts</p>
                        </div>
                        <Link href="/contacts"
                            class="flex items-center gap-1 text-xs text-primary opacity-0 group-hover:opacity-100 transition-opacity duration-200 hover:underline mb-1">
                            View all <ArrowUpRight class="h-3 w-3" />
                        </Link>
                    </div>
                </CardContent>
            </Card>

            <!-- Courses -->
            <Card class="group hover:shadow-md transition-all duration-200 hover:border-primary/30">
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium text-muted-foreground">Total Courses</CardTitle>
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-500/10 text-violet-500">
                        <GraduationCap class="h-5 w-5" />
                    </div>
                </CardHeader>
                <CardContent>
                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-4xl font-bold tracking-tight">{{ stats.courses }}</p>
                            <p class="text-xs text-muted-foreground mt-1">Available courses</p>
                        </div>
                        <Link href="/course"
                            class="flex items-center gap-1 text-xs text-primary opacity-0 group-hover:opacity-100 transition-opacity duration-200 hover:underline mb-1">
                            View all <ArrowUpRight class="h-3 w-3" />
                        </Link>
                    </div>
                </CardContent>
            </Card>

            <!-- Users -->
            <Card class="group hover:shadow-md transition-all duration-200 hover:border-primary/30">
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium text-muted-foreground">Total Users</CardTitle>
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-500">
                        <Users class="h-5 w-5" />
                    </div>
                </CardHeader>
                <CardContent>
                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-4xl font-bold tracking-tight">{{ stats.users }}</p>
                            <p class="text-xs text-muted-foreground mt-1">Registered users</p>
                        </div>
                    </div>
                </CardContent>
            </Card>

        </div>

        <!-- Bottom placeholder area -->
        <div class="relative min-h-[200px] flex-1 rounded-xl border border-dashed border-sidebar-border/70 dark:border-sidebar-border flex items-center justify-center">
            <p class="text-muted-foreground text-sm">More analytics coming soon…</p>
        </div>

    </div>
</template>
