<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-4 px-6">
        <h3 class="text-lg font-bold mb-4">Users & Savings</h3>

        @foreach ($users as $user)
            <div class="border-b py-2">
                <p><strong>{{ $user->name }}</strong> - {{ $user->email }}</p>
                <p>Total Savings: {{ $user->savings->sum('amount') ?? 0 }} TZS</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
