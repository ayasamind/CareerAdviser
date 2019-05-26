@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー詳細</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>名前</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $user->email }}</td>
                        <tr>
                            <th>登録日</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    </table>
                    <a class="btn btn-secondary" href="{{ route('admin.users.index') }}">戻る</a>
                    <form style="display:inline" onsubmit="return confirm('本当に{{ $user->name }}を削除しますか？');" action="{{ route('admin.users.destroy',['adviser' => $user->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-danger" type="submit">削除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
