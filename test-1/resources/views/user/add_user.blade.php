@extends('layouts.main')
@section('title', 'Tambah Pengguna')

@section('content')
<h3>Tambah Pengguna</h3>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('user.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" id="name" name="name" >
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" >
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" class="form-control" id="phone" name="phone" >
    </div>

    <div class="form-group">
        <label for="level_id" class="form-label">Level</label>
        <select class="form-control" id="level_id" name="level_id">
            <option selected disabled>Pilih level</option>
            @foreach ($levels as $level)
                @if ($level->id !== 1)
                    <option value="{{ $level->id }}">{{ $level->role }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
