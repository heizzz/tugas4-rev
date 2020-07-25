@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-transparent mb-0">
          <h3 class="text-center">List Jawaban yang Telah Anda Post</h3>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead class="text-left thead-dark">
              <th>No</th>
              <th>Time</th>
              <th class="col-xl">Jawaban</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($answer as $key => $a)
              <tr class="text-left">
                <td>{{$key + $question->firstItem()}}</td>
                <td>{{$a->updated_at}}</td>
                <td>{{$a->jawaban}}</td>
                <td><a class="btn btn-primary" href="{{route('selfDetailAnswer', $a->id_answer)}}">Lihat</a></td>
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
