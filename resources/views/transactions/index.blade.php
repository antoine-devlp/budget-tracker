<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mes Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($transactions as $transaction)
                  <p>{{$transaction->label}}</p>
                  <p>{{$transaction->amount}}</p>
                  <p>{{$transaction->transaction_date}}</p>
                @empty
                    <p>Aucune transaction.</p>
                @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>