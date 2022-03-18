<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="flex justify-between items-center mb-4">
            <strong>Task List</strong>
            <a href="{{ route('tasks.create') }}">
                <x-button class="ml-3">{{ __('Add New') }}</x-button>
            </a>
        </div>
        <hr>

        <ul class="list-disc mt-3 ml-3">
            @foreach ($tasks as $task)
                <li>{{ $task->title }}</li>
            @endforeach
        </ul>
    </x-auth-card>
</x-guest-layout>
