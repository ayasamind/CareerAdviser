@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アドバイザー一覧</div>

                <div class="card-body">
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
                                <a class="btn btn-primary" href="{{ route('user.advisers.show', [
                                    'adviser' => $adviser->id
                                ]) }}">詳細</a>
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
