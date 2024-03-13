<div class="mt-3">
    <a class="btn btn-warning" href="{{ route('set', ['orderBy' => 'recent']) }}">Сортировать по последним</a>
    <a class="btn btn-info" href="{{ route('set', ['orderBy' => 'old']) }}">Сортировать по старым</a>
</div>
{{-- <p>Текущая сортировка: {{ $orderBy }}</p> --}}
