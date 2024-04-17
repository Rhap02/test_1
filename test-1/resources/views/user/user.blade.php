@extends('layouts.main')
@section('title', 'Users')

@section('content')
<h3>Daftar Pengguna</h3>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Pengguna</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Level</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
      <tr>
        @if($user->level->id !== 1)
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>
              {{ $user->level->role }}
      </td>
      <td class="d-flex ">
        <form id="deleteForm{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" onclick="confirmDelete({{ $user->id }})" class="btn btn-danger btn-sm mr-1">Hapus</button>
        </form>
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
    </td>    
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
@endsection
