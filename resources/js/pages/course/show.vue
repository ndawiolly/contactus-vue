<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { ArrowLeft, Clock, DollarSign, GraduationCap, BookOpen } from '@lucide/vue';

defineProps<{
    course: {
        id: number;
        title: string;
        description: string;
        price: number;
        duration: string;
        image: string | null;
    };
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Courses',
                href: '/course',
            },
            {
                title: 'Course Details',
                href: '#',
            },
        ],
    },
});
</script>

<template>
    <Head :title="course.title" />

    <div class="flex h-full flex-1 flex-col gap-6 overflow-x-auto rounded-xl p-4">

        <!-- Back button -->
        <div>
            <Button variant="ghost" as-child class="gap-2 pl-0 hover:bg-transparent hover:opacity-70">
                <Link href="/course">
                    <ArrowLeft class="h-4 w-4" />
                    Back to Courses
                </Link>
            </Button>
        </div>

        <!-- Hero section -->
        <div class="relative overflow-hidden rounded-2xl border border-sidebar-border/70 dark:border-sidebar-border">
            <div v-if="course.image" class="absolute inset-0 z-0">
                <img :src="course.image" :alt="course.title"
                    class="h-full w-full object-cover opacity-15" />
                <div class="absolute inset-0 bg-gradient-to-b from-background/70 to-background/98" />
            </div>
            <div v-else class="absolute inset-0 z-0 bg-gradient-to-br from-primary/10 via-background to-secondary/10" />

            <div class="relative z-10 p-8 md:p-12">
                <div class="max-w-3xl">
                    <Badge class="mb-4" variant="secondary">
                        <GraduationCap class="h-3 w-3 mr-1" />
                        Course
                    </Badge>
                    <h1 class="text-3xl md:text-5xl font-bold tracking-tight mb-4 leading-tight">
                        {{ course.title }}
                    </h1>
                    <p class="text-muted-foreground text-lg leading-relaxed mb-8 max-w-2xl">
                        {{ course.description }}
                    </p>
                    <div class="flex flex-wrap gap-6 mb-8">
                        <div class="flex items-center gap-2 text-sm font-medium">
                            <Clock class="h-4 w-4 text-primary" />
                            <span>{{ course.duration }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm font-medium">
                            <DollarSign class="h-4 w-4 text-primary" />
                            <span>${{ course.price }}</span>
                        </div>
                    </div>
                    <Button size="lg"
                        class="gap-2 text-base font-semibold px-8 py-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <BookOpen class="h-5 w-5" />
                        Enroll Now
                    </Button>
                </div>
            </div>
        </div>

        <!-- Course image preview -->
        <div v-if="course.image"
            class="overflow-hidden rounded-2xl border border-sidebar-border/70 dark:border-sidebar-border">
            <img :src="course.image" :alt="course.title" class="w-full max-h-[460px] object-cover" />
        </div>

        <!-- Details grid -->
        <div class="grid gap-6 md:grid-cols-3">
            <Card class="md:col-span-2">
                <CardHeader>
                    <CardTitle class="flex items-center gap-2 text-lg">
                        <BookOpen class="h-5 w-5 text-primary" />
                        About This Course
                    </CardTitle>
                </CardHeader>
                <CardContent>
                    <p class="text-muted-foreground leading-relaxed whitespace-pre-line">
                        {{ course.description }}
                    </p>
                </CardContent>
            </Card>

            <Card>
                <CardHeader>
                    <CardTitle class="text-base">Course Details</CardTitle>
                </CardHeader>
                <CardContent class="space-y-1">
                    <div class="flex items-center justify-between py-3 border-b border-border">
                        <span class="text-sm text-muted-foreground flex items-center gap-2">
                            <Clock class="h-4 w-4" /> Duration
                        </span>
                        <span class="font-semibold text-sm">{{ course.duration }}</span>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-border">
                        <span class="text-sm text-muted-foreground flex items-center gap-2">
                            <DollarSign class="h-4 w-4" /> Price
                        </span>
                        <span class="font-semibold text-sm text-primary">${{ course.price }}</span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-sm text-muted-foreground flex items-center gap-2">
                            <GraduationCap class="h-4 w-4" /> Level
                        </span>
                        <Badge variant="outline">All Levels</Badge>
                    </div>
                    <div class="pt-4">
                        <Button class="w-full gap-2 font-semibold" size="default">
                            Enroll Now — ${{ course.price }}
                        </Button>
                    </div>
                </CardContent>
            </Card>
        </div>

    </div>
</template>
