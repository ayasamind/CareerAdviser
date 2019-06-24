@extends('layouts.adviser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アドバイザー編集</div>

                <div class="card-body">
                    {!! Form::model($adviser, ['route' => ['adviser.advisers.update', $adviser->id], 'method' => 'put', 'files' => true]) !!}
                        @csrf
                        @include('adviser.advisers._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset("js/edit_adviser.js") }}"></script>
@endsection

@section('script')
    <script src="{{ asset("js/adviser_edit.js") }}"></script>
@endsection
