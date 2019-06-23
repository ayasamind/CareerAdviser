@extends('layouts.adviser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">面談申請一覧</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>名前</th>
                            <th>希望面談日時</th>
                            <th>希望面談形式</th>
                            <th>ステータス</th>
                            <th></th>
                        </tr>
                    @foreach ($requests as $request)
                        <tr>
                            <td>
                                <a href="{{ route('adviser.user.show', [
                                    'id' => $request->User->id
                                ]) }}">
                                {{ $request->User->name }}
                            </td>
                            <td>{{ $request->date->format('Y年m月d日 H:i') }}</td>
                            <td>{{ $request->type_label }}</td>
                            <td>{{ $request->status_label }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.advisers.show', [
                                    'adviser' => $request->id
                                ]) }}">詳細</a>
                                <a class="btn btn-primary" href="{{ route('admin.advisers.edit', [
                                    'adviser' => $request->id
                                ]) }}">編集</a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    {{ $requests->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
