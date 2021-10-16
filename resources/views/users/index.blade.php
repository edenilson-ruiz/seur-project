@extends('layouts.app')

@section('title','Administración de usuarios')

@section('card-title')
<h5 class="card-title">Listado de usuarios</h5>
@can('user-create')
<a class="btn btn-success" href="{{ route('users.create') }}"> Crear Usuario</a>
@endcan
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="225px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('users.show', $user->id) }}" role="button">Ver</a>
                            @can('user-edit')
                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Editar</a>
                            @endcan
                            @can('user-delete')
                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style'
                            =>
                            'display:inline']) !!}
                            @endcan
                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->render() !!}
        </div>
    </div>
</div>
@endsection
