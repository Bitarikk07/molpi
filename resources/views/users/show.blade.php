@extends('use.app')
@section('title', 'home')

@section('content')

    <div class="container py-4">
        <div class="row">
            @include('layout.navigation')
            <div class="col-6">
                @include('shared.success-mess')
                <div class="mt-3">
                    @include('shared.user-card')
                </div>
            </div>
            <div class="col-3">
                @include('shared.search')
                @include('shared.follow-box')
            </div>
        </div>

    </div>
@endsection
