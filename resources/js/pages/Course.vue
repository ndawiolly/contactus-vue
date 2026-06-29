<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { dashboard } from '@/routes';
import { Card, CardHeader, CardTitle, CardDescription, CardContent } from '@/components/ui/card';
import TextLink from '@/components/TextLink.vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Courses',
                href: '/course',
            },
        ],
    },
});

defineProps<{
    courses: Array<{
        id: number;
        title: string;
        description: string;
        price: number;
        duration: string;
        image: string;
    }>;
}>();
</script>

<template>

    <Head title="Courses" />

    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
        <h1 class="text-2xl font-bold tracking-tight mb-4">Available Courses</h1>

        <div class="grid auto-rows-min gap-4 md:grid-cols-2 lg:grid-cols-3">
            <Card v-for="course in courses" :key="course.id" class="flex flex-col overflow-hidden">
                <img v-if="course.image" :src="course.image" :alt="course.title"
                    class="aspect-video w-full object-cover" />
                <div v-else class="aspect-video w-full bg-muted flex items-center justify-center text-muted-foreground">
                    No image available</div>

                <CardHeader>
                    <CardTitle>
                        <TextLink :href="`/course/${course.id}`">{{ course.title }}</TextLink>
                    </CardTitle>

                    <CardDescription>${{ course.price }} &bull; {{ course.duration }}</CardDescription>
                </CardHeader>

                <CardContent class="flex-1">
                    <p class="text-sm text-muted-foreground">{{ course.description }}</p>
                </CardContent>
            </Card>
        </div>

        <div v-if="courses.length === 0"
            class="flex flex-1 items-center justify-center rounded-xl border border-dashed border-sidebar-border/70 p-8 text-center dark:border-sidebar-border">
            <p class="text-muted-foreground">No courses found.</p>
        </div>
    </div>
</template>
