@extends('layouts.app')
@section('content')
<a href="{{route('sort')}}">Urutkan Berdasarkan Tanggal</a>
<form method="POST" action="{{route('addQuestion')}}">
    <div class="form-group">
        @csrf
        <label>Pertanyaan Baru</label>
        <input type="text" name="question" class="form-control">
    </div>
    <a class="btn btn-primary">Tambah Pertanyaan</a>
</form>

<h2>List Pertanyaan</h2>
<table>
    <thead>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Pertanyaan</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        @foreach($question as $key => $question)
        <tr>
            <td>{{$question->id_user}}</td>
            <td>{{$question->updated_at}}</td>
            <td>{{$question->pertanyaan}}</td>
            <td><a class = "btn btn-primary" href="{{route('detailQuestion', $question->id_question)}}">Lihat</a></td>
        </tr>
        @endforeach
    </tbody>
<table>
@endsection