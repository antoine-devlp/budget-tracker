<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mes Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('transactions.create')" :active="request()->routeIs('transaction.*')">
                    {{ __('Ajouter une transaction') }}
                </x-nav-link>
            </div>
            @forelse ($transactions as $transaction)
                <div class="mt-4 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                    <p>{{$transaction->label}}</p>
                    <p>{{$transaction->amount}}</p>
                    <p>{{$transaction->transaction_date}}</p>
                    </div>
                </div>
            @empty
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>Aucune transaction.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>