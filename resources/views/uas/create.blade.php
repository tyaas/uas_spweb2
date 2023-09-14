@extends('layout.master')

@section('judul')
    Tambah uas
@endsection

@section('content')
@csrf

<form method="POST" action="{{url('uas')}}">
    @csrf
    @method('post')
    <div class="form-group">
            <label >Npm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get ('npm')}}" name='npm'>
            </div>
        </div>
        <div class="form-group">
            <label >Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get ('nama')}}" name='nama'>
            </div>
        </div>
        <div class="form-group">
            <label >Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get ('alamat')}}" name='alamat'>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        @endsection