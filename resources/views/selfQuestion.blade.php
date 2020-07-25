@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-transparent mb-0">
          <h3 class="text-center">List Pertanyaan yang Telah Anda Post</h3>
        </div>
        <form action="{{route('selfQuestion')}}" method="GET" class="navbar-form navbar-left" style="width:500px; margin: 20px 0  0 20px; float:right">
          <div class="input-group">
            <input name="search" type="search" aria-label="Search" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-primary">Cari</button></span>
          </div>
        </form>
        <div class="card-body">
          <table class="table table-striped">
            <thead class="text-left thead-dark">
              <th style="width:20px">No</th>
              <th style="width:100px">Waktu Post</th>
              <th style="width:450px">Pertanyaan</th>
              <th style="width:90px">Tindakan</th>
            </thead>
            <tbody>
              @foreach($question as $key => $q)
              <tr class="text-left">
                <td>{{$key + $question->firstItem()}}</td>
                <td>{{$q->updated_at}}</td>
                <td>{{$q->pertanyaan}}</td>
                <td><a class="btn btn-primary" href="{{route('selfDetailQuestion', $q->id_question)}}">Lihat</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{$question->links()}}

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
