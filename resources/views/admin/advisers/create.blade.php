@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アドバイザー作成</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'admin.advisers.store']) !!}
                        @include('admin.advisers._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
