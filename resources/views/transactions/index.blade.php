<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mes Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <x-btn-link :href="route('transactions.create')" class="mb-5">
                    {{ __('Ajouter une transaction') }}
                </x-btn-link>
            @forelse ($transactions as $transaction)
                <div class="mt-4 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="flex p-6 text-gray-900">
                        <div class="flex-1">
                            <p>{{$transaction->label}}</p>
                            <p>{{$transaction->amount}}</p>
                            <p>{{$transaction->transaction_date}}</p>
                        </div>
                        <div class="flex items-center justify-end flex-1 gap-5">
                            <x-btn-link :href="route('transactions.edit', $transaction)">Modifier</x-btn-link>
                            <form method="POST" action="{{ route('transactions.destroy', $transaction) }}" onsubmit="return confirm('Supprimer cette transaction ?')">
                                @csrf
                                @method('DELETE')
                                <x-danger-button type="submit">Supprimer</x-danger-button>
                            </form>
                        </div>
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