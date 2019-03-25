@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アドバイザー一覧</div>

                <div class="card-body">
                    <p>ユーザー情報</p>
                    <table>
                        <tr>
                            <th>ユーザー名</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('user.edit') }}">ユーザー情報編集</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
