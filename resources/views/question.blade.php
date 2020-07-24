@extends('layouts.app')
@section('content')
<div class="container">
  <a href="{{route('sort')}}">Urutkan Berdasarkan Tanggal</a>
  <form method="POST" action="{{route('addQuestion')}}">
    <div class="form-group">
      @csrf
      <label>Pertanyaan Baru</label>
      <input type="text" name="question" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary" align="center">Tambah Pertanyaan</button>
  </form>
  <div class="row justify-content-center mt-5">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-transparent mb-0">
          <h3 class="text-center">List Pertanyaan</h3>
          </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead class="text-left thead-dark">
              <th>No</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th class="col-xl">Pertanyaan</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($question as $key => $question)
              <tr class="text-left">
                <td>{{$key+1}}</td>
                <td>{{$question->name}}</td>
                <td>{{$question->updated_at}}</td>
                <td>{{$question->pertanyaan}}</td>
                <td><a class = "btn btn-primary" href="{{route('detailQuestion', $question->id_question)}}">Lihat</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
