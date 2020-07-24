@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-transparent mb-0">
          <h3 class="text-center">Detail Pertanyaan</h3>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead class="text-left thead-dark">
              <th>No</th>
              <th>Nama</th>
              <th class="col col-xl">Pertanyaan</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <tr class="text-left">
                @foreach ($question as $key => $question)
                <td>{{$key+1}}</td>
                <td>{{$question->name}}</td>
                <td>{{$question->pertanyaan}}</td>
                <td>
                  <a href="{{route('edit', $question->id_question)}}" class="btn btn-warning btn-block">Edit</a>
                  <a href="{{route('delete', $question->id_question)}}" class="btn btn-danger btn-block">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <br>
      @endforeach
    </div>
  </div>
  <div class="row justify-content-center mt-5">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-transparent mb-0">
          <h3 class="text-center">Jawaban</h3>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead class="text-left thead-dark">
              <th>Name</th>
              <th>Time</th>
              <th>Answer</th>
            </thead>
            <tbody>
              @foreach ($answer as $key => $answer)
              <tr class="text-left">
                <td>{{$answer->name}}</td>
                <td>{{$answer->updated_at}}</td>
                <td>{{$answer->jawaban}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
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
    </div>
  </div>

</div>
@endsection
