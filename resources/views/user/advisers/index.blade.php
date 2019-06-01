@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">アドバイザー一覧</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>名前</th>
                            <th>登録日</th>
                            <th></th>
                        </tr>
                    @foreach ($advisers as $adviser)
                        <tr>
                            <td>{{ $adviser->name }}</td>
                            <td>{{ $adviser->created_at }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('advisers.show', [
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
