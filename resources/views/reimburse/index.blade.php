@extends('layouts.base')

@section('title')
Manage Reimburse
@endsection

@section('content')
@if(!empty(session('notif')))
<p id="notif" style="color: red;">{{ session('notif') }}</p>
{{ session(['notif' => '']) }}
@endif
<a href="{{ route('reimburse.create') }}">
    <button type="button" class="btn btn-primary">
        Create Reimbursement
    </button>
</a>
<br><br>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Tanggal</th>
        <th>Nama Reimbursement</th>
        <th>Diajukan oleh</th>
        <th>Deskripsi</th>
        <th>Status</th>
        <th>File</th>
        @if (Auth::guard('web')->user()->jabatan != 'Staff')
        <th>Actions</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @if (!empty($reimbursements))
        @foreach ($reimbursements as $r)
        <tr>
          <td>{{ $r['id'] }}</td>
          <td>{{ $r['tanggal'] }}</td>
          <td>{{ $r['nama_reimbursement'] }}</td>
          <td>{{ $r->user->nama }}</td>
          <td>{{ $r['deskripsi'] }}</td>
          <td>{{ $r['status'] }}</td>
          <td><a style="color:red" href="{{ asset('storage/'.$r['file_path']) }}" target="_blank">View File</a></td>
          <td>
          @if ($r['status'] == 'pending' && Auth::guard('web')->user()->jabatan != 'Staff')
          <form action="{{ route('reimburse.approve', $r->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to approve?');">Approve</button>
            </form>
            <form action="{{ route('reimburse.reject', $r->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to reject?');">Reject</button>
            </form>
          @endif
          </td>
        </tr>
        @endforeach
      @endif
    </tbody>
  </table>
</div>
@endsection

@section('script')

@endsection