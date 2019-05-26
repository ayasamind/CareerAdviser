@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">アドバイザー一覧</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('admin.advisers.create') }}">アドバイザー新規登録</a>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>登録日</th>
                            <th></th>
                        </tr>
                    @foreach ($advisers as $adviser)
                        <tr>
                            <td>{{ $adviser->id }}</td>
                            <td>{{ $adviser->name }}</td>
                            <td>{{ $adviser->email }}</td>
                            <td>{{ $adviser->created_at }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.advisers.show', [
                                    'adviser' => $adviser->id
                                ]) }}">詳細</a>
                                <a class="btn btn-primary" href="{{ route('admin.advisers.edit', [
                                    'adviser' => $adviser->id
                                ]) }}">編集</a>
                                <form style="display:inline" onsubmit="return confirm('本当に{{ $adviser->name }}を削除しますか？');" action="{{ route('admin.advisers.destroy',['adviser' => $adviser->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-danger" type="submit">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    {{ $advisers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
