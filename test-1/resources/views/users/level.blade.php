@extends('layouts.main')
@section('title', 'Level')

@section('content')
<div class="container">
    <h3>Level User</h3>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('add.index') }}" class="btn btn-primary">Tambah</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->role }}</td>
                    <td class="d-flex" style="align-items: center;">
                        <form id="deleteForm{{ $data->id }}" action="{{ route('levels.destroy', $data->id) }}" method="POST" class="mr-2">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $data->id }})" class="btn btn-danger">Hapus</button>
                        </form>
                        <a href="{{ route('levels.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
