<x-layout>

    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Create' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('my-jobs.store') }}" method="POST">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" />
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" />
                </div>
            </div>

            
        </form>
    </x-card>

</x-layout>
