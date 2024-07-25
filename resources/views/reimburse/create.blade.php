@extends('layouts.base')

@section('title')
Create Reimbursement
@endsection

@section('content')
@if(!empty(session('notif')))
<p id="notif" style="color: red;">{{ session('notif') }}</p>
{{ session(['notif' => '']) }}
@endif
<div class="container">
    <form action="{{ route('reimburse.store') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
        <label><h5>Tanggal</h5></label>
        <input class="form-control" type="date" name="tanggal" value="{{ old('tanggal') }}" required><br>
        <label><h5>Nama Reimbursement</h5></label>
        <input class="form-control" type="text" name="nama_reimbursement" value="{{ old('nama_reimbursement') }}" required><br>
        <label><h5>Deskripsi</h5></label>
        <input class="form-control" type="text" name="deskripsi" value="{{ old('deskripsi') }}" required><br>
        <label><h5>File Pendukung</h5></label>
        <input class="form-control" type="file" id="photo" name="file" required><br>
      <input class="btn btn-dark" type="submit" name="submit" value="Ajukan Reimburse"><br><br>
    </form>
</div>
@endsection