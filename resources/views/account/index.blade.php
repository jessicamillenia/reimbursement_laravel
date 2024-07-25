@extends('layouts.base')

@section('title')
Account
@endsection

@section('content')
@if(!empty(session('notif')))
<p id="notif" style="color: red;">{{ session('notif') }}</p>
{{ session(['notif' => '']) }}
@endif
<a href="{{ route('account.create') }}">
    <button type="button" class="btn btn-primary">
        Create Account
    </button>
</a>
<br><br>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Nip</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @if (!empty($users)) 
        @foreach ($users as $r)
        <tr>
          <td>{{ $r['id'] }}</td>
          <td>{{ $r['nip'] }}</td>
          <td>{{ $r['nama'] }}</td>
          <td>{{ $r['jabatan'] }}</td>
          <td>
            <a href="{{ route('account.edit', $r->id) }}">
                <button type="button" class="btn btn-primary">
                Edit
                </button>
            </a>
            <form action="{{ route('account.destroy', $r->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btnDelete btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      @else
      @endif
    </tbody>
  </table>
</div>
@endsection

@section('script')
@endsection