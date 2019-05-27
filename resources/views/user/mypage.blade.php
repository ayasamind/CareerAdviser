@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>名前</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>登録日</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="{{ route('user.users.edit', [
                                    'user' => $user->id
                                ]) }}">編集</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
