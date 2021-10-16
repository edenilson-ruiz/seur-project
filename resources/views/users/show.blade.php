@extends('layouts.app')

@section('title','Administración de usuarios')

@section('card-title')
<h5 class="card-title">Mostrando usuario</h5>
<a class="btn btn-primary" href="{{ route('users.index') }}"> Regresar</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table mt-3">
            <tr>
                <th>Nombre:</th>
                <th>{{ $user->name }}</th>
            </tr>
            <tr>
                <th>Email:</th>
                <th>{{ $user->email }}</th>
            </tr>
            <tr>
                <th>Roles:</th>
                <th>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <span class="badge badge-success">{{ $v }}</span>
                    @endforeach
                    @endif
                </th>
            </tr>
        </table>
    </div>
</div>
@endsection
