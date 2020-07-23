@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center text-success">
                      {{ __('You are logged in!') }}
                    </div>
                    <br>
                    <br>
                    <a class="btn btn-primary btn-block" href="{{route('listQuestion')}}">List Pertanyaan</a>
                    <a class="btn btn-primary btn-block" href="{{route('selfQuestion')}}">List Pertanyaan yang Dibuat</a>
                    <a class="btn btn-primary btn-block" href="{{route('selfAnswer')}}">List Jawaban yang Dibuat</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
