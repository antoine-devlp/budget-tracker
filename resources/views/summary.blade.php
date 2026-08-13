<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Analyse') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @forelse ( $categories as $category)
                <h2>{{$category->name}}</h2>
                <p>{{$category->transactions_sum_amount ?? 0 }} €</p>
            @empty
                <p>Pas de catégories</p>
            @endforelse
            @if ($uncategorized > 0)
                <h2>Sans catégories</h2>
                <p>{{$uncategorized}}</p>
            @endif
        </div>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2>Total</h2>
            <p>{{ $total }} €</p>
        </div>
    </div>
</x-app-layout>
