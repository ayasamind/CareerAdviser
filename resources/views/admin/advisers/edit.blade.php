@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アドバイザー編集</div>

                <div class="card-body">
                    {!! Form::model($adviser, ['route' => ['admin.advisers.update', $adviser->id], 'method' => 'put']) !!}
                        @include('admin.advisers._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
