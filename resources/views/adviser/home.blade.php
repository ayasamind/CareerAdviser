@extends('layouts.adviser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{ route('adviser.advisers.edit') }}">ユーザー情報編集</a>

                    <table class="table">
                        <tr>
                            <th>プロフィール画像</th>
                            <td>@if ($adviser->photo_url)
                                    <img src="{{ $adviser->photo_url }}" width="200"/>
                                @else
                                    <img src="{{ asset('img/no_image.png') }}" width="200"/>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>名前</th>
                            <td>{{ $adviser->name }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $adviser->email }}</td>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
