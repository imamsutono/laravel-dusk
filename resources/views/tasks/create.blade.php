<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <!-- Title -->
            <div>
                <x-label for="title" :value="__('Task')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3 btn-add">
                    {{ __('Add Task') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
