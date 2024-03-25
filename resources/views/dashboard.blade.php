@extends('use.app')
@section('title', 'home')

@section('content')

    <div class="container py-4">
        <div class="row">
            @include('layout.navigation')
            <div class="col-6">
                @include('shared.success-mess')
                @include('shared.form-molpi')
                <div class="mt-3">
                    <div class="d-flex align-items-center  gap-2">
                        <p class="text  ">Текущая сортировка:</p>
                        @if ($orderBy === 'recent')
                            <p class="text text-warning"> Последние</p>
                        @elseif($orderBy === 'old')
                            <p class="text text-info "> Старые</p>
                        @endif
                    </div>

                    <hr>

                    @forelse ($ideas as $idea)
                        <div class="mt-3">
                            @include('shared.card')
                        </div>
                    @empty
                        <p class="text-center my-4"> No results Found.</p>
                    @endforelse

                    <div class="mt-3"> {{ $ideas->withQueryString()->links() }}</div>
                </div>
            </div>
            <div class="col-3">
                @include('shared.search')
                @include('shared.follow-box')

            </div>

        </div>
    @endsection
