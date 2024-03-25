<div class="mt-3">
    <a class="btn btn-warning btn-sm" wire:click="increment" href="{{ route('set', ['orderBy' => 'recent']) }}">Сортировать
        по последним</a>
    <a class="btn btn-info btn-sm" wire:click="increment" href="{{ route('set', ['orderBy' => 'old']) }}">Сортировать по
        старым</a>
</div>
{{-- <p>Текущая сортировка: {{ $orderBy }}</p> --}}
