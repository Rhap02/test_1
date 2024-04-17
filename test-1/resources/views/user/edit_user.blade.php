@extends('layouts.main')
@section('title', 'Edit Pengguna')

@section('content')
    <h3>Edit Pengguna</h3>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="form-group">
            <label for="level_id">Level:</label>
            <select class="form-control" id="level_id" name="level_id">
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ $user->level_id == $level->id ? 'selected' : '' }}>
                        {{ $level->role }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
