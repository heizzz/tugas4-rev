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
              <th>Time</th>
              <th class="col col-xl">Pertanyaan</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <tr class="text-left">
                @foreach ($question as $key => $question)
                <td>{{$key+1}}</td>
                <td>{{$question->updated_at}}</td>
                <td>{{$question->pertanyaan}}</td>
                <td>
                  <a href="{{route('edit_question', $question->id_question)}}" class="btn btn-warning btn-block">Edit</a>
                  <a href="{{route('delete_question', $question->id_question)}}" class="btn btn-danger btn-block">Delete</a>
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
      </div>
    </div>
  </div>

</div>
@endsection
