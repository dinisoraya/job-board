<x-layout>

    <x-breadcrumbs class="mb-4"
        :links="[
            ['title' => 'Jobs', 'url' => route('jobs.index')],
            ['title' => $job->title, 'url' => '#']
        ]"
    />

    <x-job-card :job="$job">
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>

</x-layout>
