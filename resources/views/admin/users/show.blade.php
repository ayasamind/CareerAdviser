@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー詳細</div>

                <div class="card-body">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">戻る</a>
                    <a class="nav-link" href="{{ route('admin.users.destroy', [
                        'user' => $user->id
                    ]) }}">削除</a>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>登録日</th>
                        </tr>
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
