<x-card class="mb-4">
  <div class="mb-4 flex justify-between">
    <h2 class="text-lg font-medium">{{ $job->title }}</h2>
    <div class="text-slate-500">
      Rp{{ number_format($job->salary, 0, ',', '.') }}
    </div>
  </div>

  <div class="mb-4 flex items-center justify-between text-sm text-slate-500">
    <div class="flex items-center space-x-4">
      <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 21V9a1 1 0 011-1h14a1 1 0 011 1v12M9 21v-6h6v6M3 21h18" />
        </svg>
        <span>{{ $job->employer->company_name }}</span>
      </div>

      <div class="flex items-center space-x-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 2C8.686 2 6 4.686 6 8c0 4.418 6 10 6 10s6-5.582 6-10c0-3.314-2.686-6-6-6z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8a2 2 0 110-4 2 2 0 010 4z" />
        </svg>
        <span>{{ $job->location }}</span>
      </div>
      
      @if ($job->deleted_at)
      <span class="text-xs text-red-500">Deleted</span>
    @endif
    </div>
    <div class="flex space-x-1 text-xs">
      <x-tag>
        <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
          {{ Str::ucfirst($job->experience) }}
        </a>
      </x-tag>
      <x-tag>
        <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
          {{ $job->category }}
        </a>
      </x-tag>
    </div>
  </div>

  {{ $slot }}
</x-card>