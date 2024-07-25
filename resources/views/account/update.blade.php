@extends('layouts.base')

@section('title')
Update Account
@endsection

@section('content')
@if(!empty(session('notif')))
<p id="notif" style="color: red;">{{ session('notif') }}</p>
{{ session(['notif' => '']) }}
@endif
<div class="container">
    <form action="{{ route('account.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label><h5>Nip</h5></label>
        <input class="form-control" type="text" name="nip" value="{{ $user['nip'] }}" required><br>
        <label><h5>Nama</h5></label>
        <input class="form-control" type="text" name="nama" value="{{ $user['nama'] }}" required><br>
        <label><h5>Jabatan</h5></label>
        <select class="form-control" name="jabatan"" required>
          <option value="Staff" {{ $user['jabatan'] == 'Staff' ? 'selected' : '' }}>Staff</option>
          <option value="Finance" {{ $user['jabatan'] == 'Finance' ? 'selected' : '' }}>Finance</option>
          <option value="Direktur" {{ $user['jabatan'] == 'Direktur' ? 'selected' : '' }}>Direktur</option>
        </select><br>
        <label><h5>Password</h5></label>
        <input class="form-control"  type="password" name="password" value="" required><br>
      <input class="btn btn-dark" type="submit" name="submit" value="Update Account"><br><br>
    </form>
</div>
@endsection