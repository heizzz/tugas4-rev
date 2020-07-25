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
              <th style="width:20px">No</th>
              <th style="width:100px">Waktu Post</th>
              <th style="width:450px">Pertanyaan</th>
              <th style="width:90px">Tindakan</th>
            </thead>
            <tbody>
              <tr class="text-left">
                @foreach ($question as $key => $q)
                <td>{{$key + $question->firstItem()}}</td>
                <td>{{$q->updated_at}}</td>
                <td>{{$q->pertanyaan}}</td>
                <td>
                  <a href="{{route('edit_question', $q->id_question)}}" class="btn btn-warning btn-block">Edit</a>
                  <a href="{{route('delete_question', $q->id_question)}}" onclick="return confirm('Yakin dihapus?')" class="btn btn-danger btn-block">Delete</a>
                </td>
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
              <th style="width:20px">No</th>
              <th style="width:150px">Waktu Post</th>
              <th style="width:150px">Nama</th>
              <th style="width:500px">Jawaban</th>
            </thead>
            <tbody>
              @foreach ($answer as $key => $a)
              <tr class="text-left">
                <td>{{$key + $answer->firstItem()}}</td>
                <td>{{$a->updated_at}}</td>
                <td>{{$a->name}}</td>
                <td>{{$a->jawaban}}</td>
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
