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
            </thead>
            <tbody>
              <tr class="text-left">
                @foreach ($question as $key => $q)
                <td>{{$key + $question->firstItem()}}</td>
                <td>{{$q->name}}</td>
                <td>{{$q->pertanyaan}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <br>
      @endforeach

      {{$question->links()}}
      
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
              <th>Time</th>
              <th class="col col-xl">Answer</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach ($answer as $key => $a)
              <tr class="text-left">
                <td>{{$a->updated_at}}</td>
                <td>{{$a->jawaban}}</td>
                <td>
                  <a href="{{route('edit_answer', $a->id_answer)}}" class="btn btn-warning btn-block">Edit</a>
                  <a href="{{route('delete_answer', $a->id_answer)}}" class="btn btn-danger btn-block">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{$answer->links()}}

        </div>
      </div>
    </div>
  </div>

</div>
@endsection
