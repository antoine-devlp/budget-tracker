<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Analyse') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto space-y-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between p-6 overflow-hidden text-3xl font-bold bg-white shadow-sm sm:rounded-lg">
                <h2>Total : </h2>
                <p>{{  number_format($total, 2, ',', ' ') }} €</p>
            </div>
            <ul class="space-y-4">
                @forelse ( $categories as $category)
                    <li class="flex justify-between p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <span>{{$category->name}} : </span>
                        <span>{{ number_format($category->transactions_sum_amount ?? 0, 2, ',', ' ') }} €</span>
                    </li>
                @empty
                    <li class="flex justify-between p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <span>Pas de catégories</span>
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
    </div>
</x-app-layout>
