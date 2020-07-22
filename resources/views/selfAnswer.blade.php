@extends('layouts.app')

@section('content')
<div>
    <h1>List Jawaban yang Telah Anda Post</h1>
    <table>
        <thead>
            <th>No</th>
            <th>Jawaban</th>
            <th>Aksi</th>
        </thead>answer
        <tbody>
            @foreach($answer as $key => $answer)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$answer->jawaban}}</td>
                <td><a class="btn btn-primary" href="{{route('detailQuestion', $answer->id_question)}}">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection