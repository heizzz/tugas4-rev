@extends('layouts.app')

@section('content')
<div>
    <h1>List Pertanyaan yang Telah Anda Post</h1>
    <table>
        <thead>
            <th>No</th>
            <th>Pertanyaan</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach($question as $key => $question)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$question->pertanyaan}}</td>
                <td><a class="btn btn-primary" href="{{route('detailQuestion', $question->id_question)}}">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection