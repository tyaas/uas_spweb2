@extends('layout.master')

@section('judul')
    Daftar uas
@endsection


@push('script')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    <script>
        $(function(){
            $('#example1').DataTable();
        });
    </script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush


    

@section('content')
<a class="btn btn-secondary mb-3" href="{{url('uas/create')}}">Tambah Data</a>
<table class="table" id="example1">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nm</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($uas as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->npm}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->alamat}}</td>
            <td>
                <a href='{{url('uas/'.$item->npm.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                <form class="d-inline" action="{{url('uas/'.$item->npm)}}" method="post">
                    @csrf
                    @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                </form>
            </td>
            
            
            
        </tr>
        @empty
        <h2>Data tidak ada</h2>
        @endforelse
    </tbody>
    
</table>
@endsection