@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">面談申請詳細</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $meetingRequest->id }}</td>
                        </tr>
                        <tr>
                            <th>アドバイザー名</th>
                            <td>
                                <a href="{{ route('admin.advisers.show', [
                                    'id' => $meetingRequest->Adviser->id
                                ]) }}">
                                {{ $meetingRequest->Adviser->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>ユーザー名</th>
                            <td>
                                <a href="{{ route('admin.users.show', [
                                    'id' => $meetingRequest->User->id
                                ]) }}">
                                {{ $meetingRequest->User->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>希望面談日時</th>
                            <td>{{ $meetingRequest->date->format('Y年m月d日 H:i') }}</td>
                        <tr>
                            <th>希望面談形式</th>
                            <td>{{ $meetingRequest->type_label }}</td>
                        </tr>
                        <tr>
                            <th>ステータス</th>
                            <td>{{ $meetingRequest->status_label }}</td>
                        </tr>
                        <tr>
                            <th>コメント</th>
                            <td>{{ $meetingRequest->comment }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
