@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="nav-link" href="{{ route('admin.advisers.index') }}">戻る</a>
                    <a class="nav-link" href="{{ route('admin.advisers.edit', [
                        'adviser' => $adviser->id
                    ]) }}">編集</a>
                    <a class="nav-link" href="{{ route('admin.advisers.destroy', [
                        'adviser' => $adviser->id
                    ]) }}">削除</a>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>登録日</th>
                        </tr>
                        <tr>
                            <td>{{ $adviser->id }}</td>
                            <td>{{ $adviser->name }}</td>
                            <td>{{ $adviser->email }}</td>
                            <td>{{ $adviser->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
