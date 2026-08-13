<x-app-layout>
     <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Ajouter une Categories') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                        <div>
                            <x-input-label for="name" :value="__('Nom de la categorie')" />
                            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div><x-primary-button type="submit" class="block w-full mt-3" >{{ __('Sauvegarder') }}</x-primary-button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>