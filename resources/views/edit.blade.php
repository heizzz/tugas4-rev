@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    @foreach($question as $q)
                    <form method="POST" action="{{ route('update') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" class="form-control" name="id_question" value="{{ $q->id_question}}">
                        <div class="form-group row">
                            <label for="pertanyaan" class="col-md-4 col-form-label text-md-right">{{ __('Pertanyaan') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pertanyaan" value="{{ $q->pertanyaan}}">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ubah') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
