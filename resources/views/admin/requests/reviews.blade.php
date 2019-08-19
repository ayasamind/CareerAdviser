@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">レビュー一覧</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ユーザー名</th>
                            <th>アドバイザー名</th>
                            <th>評価</th>
                            <th>コメント</th>
                            <th></th>
                        </tr>
                    @foreach ($meetingRequests as $request)
                        <tr>
                            <td>
                                <a href="{{ route('admin.users.show', [
                                    'id' => $request['User']['id']
                                ]) }}">
                                {{ $request['User']['name'] }}
                            </td>
                            <td>
                                <a href="{{ route('admin.advisers.show', [
                                    'id' => $request['Adviser']['id']
                                ]) }}">
                                {{ $request->Adviser->name }}
                            </td>
                            <td>{{ $request->star }}</td>
                            <td>{!! nl2br(e($request->review)) !!}</td>
                            <td>
                                <form style="display:inline" onsubmit="return confirm('本当に削除しますか？');" action="{{ route('admin.review.destroy',['requests' => $request->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="POST" />
                                    <button class="btn btn-danger" type="submit">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    {{ $meetingRequests->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
