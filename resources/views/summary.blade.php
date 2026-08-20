<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Analyse') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto space-y-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between p-6 overflow-hidden text-3xl font-bold bg-white shadow-sm sm:rounded-lg">
                <h2>{{ now()->translatedFormat('F Y') }} :</h2>
                <p>{{  number_format($total, 2, ',', ' ') }} €</p>
            </div>
            <ul class="space-y-4">
                @forelse ( $categories as $category)
                    <li class="flex justify-between p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <span>{{$category->name}} : </span>
                        <span>{{ number_format($category->transactions_sum_amount, 2, ',', ' ') }} €</span>
                    </li>
                @empty
                    <li class="flex justify-between p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <span>Aucune dépense ce mois-ci</span>
                    </li>
                @endforelse
                @if ($uncategorized > 0)
                    <li class="flex justify-between p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <span>Sans catégories : </span>
                        <span>{{number_format($uncategorized, 2, ',', ' ')}} €</span>
                    </li>
                @endif
            </ul>
        </div>
        <div class="px-4 py-4 mx-auto space-y-4 max-w-7xl sm:px-6 lg:px-8">
            <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($monthly as $month)
                    <li class="flex flex-col p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::createFromDate($month->year, $month->month, 1)->translatedFormat('F Y') }}</span>
                        <span class="text-2xl font-bold">{{ number_format($month->total, 2, ',', ' ') }} €</span>
                    </li>
                @empty
                    <li class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <span>Aucune transaction enregistrée</span>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>
