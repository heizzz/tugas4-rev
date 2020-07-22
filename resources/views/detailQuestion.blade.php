@extends('layouts.app')

@section('content')
<div>
    <h2>Detail Pertanyaan</h2>
    @foreach ($question as $key => $question)
    {{$question->name}}
    <br>
    {{$question->pertanyaan}}
    @endforeach

    <h2>Jawaban</h2>
    <table>
        <thead>
            <th>Name</th>
            <th>Time</th>
            <th>Answer</th>
        </thead>
        <tbody>
            @foreach ($answer as $key => $answer)
            <tr>
                <td>{{$answer->name}}</td>
                <td>{{$answer->updated_at}}</td>
                <td>{{$answer->jawaban}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form method="POST" action="{{route('addAnswer')}}">
    <input type="hidden" value="{{$question->id_question}}" name="id_question">
        <div class="form-group">
            @csrf
            <label>Jawab</label>
            <input type="text" name="answer" class="form-control">
        </div>
        <a class="btn btn-primary">Tambah Jawaban</a>
    </form>
</div>
@endsection