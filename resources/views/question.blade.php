@extends('layouts.app')
@section('content')
<div class="container">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Pertanyaan Baru
  </button>
  <div class="row justify-content-center mt-5">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-transparent mb-0">
          <h3 class="text-center">List Pertanyaan</h3>
        </div>
        <form action="{{route('listQuestion')}}" method="GET" class="navbar-form navbar-left" style="width:500px; margin: 20px 0  0 20px; float:right">
          <div class="input-group">
            <input name="search" type="search" aria-label="Search" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-primary">Cari</button></span>
          </div>
        </form>
        <a href="{{route('sort')}}" style="margin: 0 0 0 730px;">Urut Berdasarkan Tanggal</a>
        <div class="card-body">
          <table class="table table-striped">
            <thead class="text-left thead-dark">
              <th style="width:20px">No</th>
              <th style="width:100px">Waktu Post</th>
              <th style="width:150px">Nama</th>
              <th style="width:450px">Pertanyaan</th>
              <th style="width:90px">Tindakan</th>
            </thead>
            <tbody>
              @foreach($question as $key => $q)
              <tr class="text-left">
                <td>{{$key + $question->firstItem()}}</td>
                <td>{{$q->updated_at}}</td>
                <td>{{$q->name}}</td>
                <td>{{$q->pertanyaan}}</td>
                <td><a class = "btn btn-primary" href="{{route('detailQuestion', $q->id_question)}}">Lihat</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{$question->links()}}
        
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('addQuestion')}}">
          <div class="form-group">
            @csrf
            <label for="exampleFormControlTextarea1">Pertanyaan</label>
            <input type="text" name="question" class="form-control" required></textarea>
          </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
