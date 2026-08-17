<x-app-layout>
     <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Modifier une transaction') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('transactions.update', $transaction) }}">
                    @csrf
                    @method('PUT')
                        <div>
                            <x-input-label for="label" :value="__('Nom de la transaction')" />
                            <x-text-input id="label" name="label" type="text" class="block w-full mt-1" required value="{{ $transaction->label }}"/>
                            <x-input-error :messages="$errors->get('label')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="amount" :value="__('Montant de la transaction')" />
                            <x-text-input id="amount" type="number" step="0.01" name="amount" class="block w-full mt-1" required value="{{ $transaction->amount }}"/>
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="transaction_date" :value="__('Date de la transaction')" />
                            <x-text-input type="date" name="transaction_date" id="transaction_date" class="block w-full mt-1" required value="{{ $transaction->transaction_date->format('Y-m-d') }}"/>
                            <x-input-error :messages="$errors->get('transaction_date')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="categories" :value="__('Séléctionner une catégorie')" />
                            <select name="category_id" id="categories" class="block w-full mt-1" required>
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                        <div><x-primary-button type="submit" class="block w-full mt-3" >{{ __('Sauvegarder') }}</x-primary-button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>