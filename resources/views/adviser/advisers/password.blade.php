@extends('layouts.adviser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">パスワード変更</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('adviser.password.update') }}">
                        @csrf
                        <table class="table">
                            <tr>
                                <th>新規パスワード</th>
                                <td>
                                <input type="password" name="password" class="form-control" required>
                                @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>新規パスワード（確認）</th>
                                <td><input type="password" name="password_confirmation" class="form-control" required></td>
                            </tr>
                        </table>
                        <button class="btn btn-primary">パスワードを変更</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
