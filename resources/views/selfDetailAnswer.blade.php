@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-transparent mb-0">
          <h3 class="text-center">Pertanyaan</h3>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead class="text-left thead-dark">
              <th style="width:20px">No</th>
              <th style="width:150px">Waktu Post</th>
              <th style="width:150px">Nama</th>
              <th style="width:500px">Pertanyaan</th>
            </thead>
            <tbody>
              <tr class="text-left">
                @foreach ($question as $key => $q)
                <td>{{$key + $question->firstItem()}}</td>
                <td>{{$q->updated_at}}</td>
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
          <h3 class="text-center">Detail Jawaban</h3>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead class="text-left thead-dark">
              <th style="width:20px">No</th>
              <th style="width:100px">Waktu Post</th>
              <th style="width:450px">Jawaban</th>
              <th style="width:90px">Tindakan</th>
            </thead>
            <tbody>
              @foreach ($answer as $key => $a)
              <tr class="text-left">
                <td>{{$key + $answer->firstItem()}}</td>
                <td>{{$a->updated_at}}</td>
                <td>{{$a->jawaban}}</td>
                <td>
                  <a href="{{route('edit_answer', $a->id_answer)}}" class="btn btn-warning btn-block">Edit</a>
                  <a href="{{route('delete_answer', $a->id_answer)}}" onclick="return confirm('Yakin dihapus?')"class="btn btn-danger btn-block">Hapus</a>
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
