@extends('layouts.base')

@section('title')
Create Account
@endsection

@section('content')
@if(!empty(session('notif')))
<p id="notif" style="color: red;">{{ session('notif') }}</p>
{{ session(['notif' => '']) }}
@endif
<div class="container">
    <form action="{{ route('account.store') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
        <label><h5>Nip</h5></label>
        <input class="form-control" type="text" name="nip" value="{{ old('nip') }}" required><br>
        <label><h5>Nama</h5></label>
        <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" required><br>
        <label><h5>Jabatan</h5></label>
        <select class="form-control" name="jabatan" required>
          <option value="Staff" {{ old('jabatan') == 'Staff' ? 'selected' : '' }}>Staff</option>
          <option value="Finance" {{ old('jabatan') == 'Finance' ? 'selected' : '' }}>Finance</option>
          <option value="Direktur" {{ old('jabatan') == 'Direktur' ? 'selected' : '' }}>Direktur</option>
        </select><br>
        <label><h5>Password</h5></label>
        <input class="form-control"  type="password" name="password" value="{{ old('password') }}" required><br>
      <input class="btn btn-dark" type="submit" name="submit" value="Create Account"><br><br>
    </form>
</div>
@endsection