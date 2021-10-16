@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Laravel Livewire CRUD</h2>
                    <a name="" id="" class="btn btn-primary" href="/home" role="button">Home</a>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    @livewire('posts')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
