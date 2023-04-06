@extends('layouts.admin')

@section('content')
    <div class="card">
        <table class="table table table-dark">
            <tr>
                <th>#</th>
                <th>title</th>
                <th>email</th>
                <th>Roles</th>
            </tr>
            @foreach($users as $user)
                <tr>

                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.users.update') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <select name="role" id="">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name)
                                    ? "selected='selected'":'' }}>{{
                                    $role->name
                                    }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success">Save</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
