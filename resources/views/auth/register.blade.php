<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
        Create an account
    </h1>

    <x-card class="py-8 px-16">
        <form action="{{ route('auth.storeRegister') }}" method="POST">
            @csrf

            <div class="mb-8">
                <label for="name" class="mb-2 block text-sm font-medium text-slate-900">Name</label>
                <x-text-input name="name" />
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-8">
                <label for="email" class="mb-2 block text-sm font-medium text-slate-900">E-mail</label>
                <x-text-input name="email" />
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-8">
                <label for="password" class="mb-2 block text-sm font-medium text-slate-900">Password</label>
                <x-text-input name="password" type="password" />
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-8">
                <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-900">Confirm
                    Password</label>
                <x-text-input name="password_confirmation" type="password" />
                @error('password_confirmation')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <x-button class="w-full bg-green-50">Register</x-button>
        </form>

        <br>
        
        <div class="text-center">
            Already have an account?
            <a href="{{ route('auth.create') }}" class="text-indigo-600 hover:underline">Sign In</a>
        </div>

    </x-card>
</x-layout>