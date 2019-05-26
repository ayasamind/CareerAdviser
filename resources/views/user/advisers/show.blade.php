@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アドバイザー詳細</div>
                <div class="card-body">
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
                            <th>ID</th>
                            <td>{{ $adviser->id }}</td>
                        </tr>
                        <tr>
                            <th>名前</th>
                            <td>{{ $adviser->name }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $adviser->email }}</td>
                        </tr>
                            <th>登録日</th>
                            <td>{{ $adviser->created_at }}</td>
                        </tr>
                    </table>
                    <a class="btn btn-secondary" href="{{ route('user.home') }}">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
