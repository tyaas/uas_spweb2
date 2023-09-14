@extends('layout.master')

@section('judul')
    Edit uas
@endsection

@section('content')
<form action="{{ route('uas.update', $uas->npm) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="npm">Npm</label>
        <input type="text" class="form-control" value="{{ $uas->npm }}" name="npm">
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" value="{{ $uas->nama }}" name="nama">
    </div>
    <div class="form-group">
        <label for="alamat">lAamat</label>
        <input type="text" class="form-control" value="{{ $uas->alamat }}" name="alamat">
    </div>
    <button type="submit" class="btn btn-primary">Update Data</button>
</form>
@endsection
