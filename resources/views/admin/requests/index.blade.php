@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">面談申請一覧</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>ユーザー名</th>
                            <th>アドバイザー名</th>
                            <th>希望面談日時</th>
                            <th>希望面談形式</th>
                            <th>ステータス</th>
                            <th></th>
                        </tr>
                    @foreach ($meetingRequests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', [
                                    'id' => $request->User->id
                                ]) }}">
                                {{ $request->User->name }}
                            </td>
                            <td>
                                <a href="{{ route('admin.advisers.show', [
                                    'id' => $request->Adviser->id
                                ]) }}">
                                {{ $request->Adviser->name }}
                            </td>
                            <td>{{ $request->date->format('Y年m月d日 H:i') }}</td>
                            <td>{{ $request->type_label }}</td>
                            <td>{{ $request->status_label }}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{ route('admin.requests.show', [
                                    'request' => $request->id
                                ]) }}">詳細</a>
                            </a>
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
