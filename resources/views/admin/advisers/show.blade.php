@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アドバイザー詳細</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('admin.advisers.edit', [
                        'id' => $adviser->id
                    ]) }}">アドバイザー情報編集</a>
                    @if ($adviser->AdviserProfile)
                        <a class="btn btn-primary" target="_brank" href="{{ route('advisers.show', [ 'id' => $adviser->id ]) }}">公開画面を確認</a>
                    @endif
                    <table class="table">
                        <tr>
                            <th>プロフィール画像</th>
                            <td>@if ($adviser->AdviserProfile)
                                    <img src="{{ $adviser->AdviserProfile->photo_url }}" width="200"/>
                                @else
                                    <img src="{{ asset('img/no_image.png') }}" width="200"/>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>名前</th>
                            <td>{{ $adviser->name }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $adviser->email }}</td>
                        </tr>
                        @if ($adviser->AdviserProfile)
                            <tr>
                                <th>性別</th>
                                <td>{{ $adviser->AdviserProfile->genderLabel }}</td>
                            </tr>
                            <tr>
                                <th>都道府県</th>
                                <td>{{ $adviser->AdviserProfile->prefecture }}</td>
                            </tr>
                            <tr>
                                <th>一言コメント</th>
                                <td>{{ $adviser->AdviserProfile->comment }}</td>
                            </tr>
                            <tr>
                                <th>自己紹介</th>
                                <td>{{ $adviser->AdviserProfile->introduce }}</td>
                            </tr>
                            <tr>
                                <th>略歴</th>
                                <td>
                                @foreach ($adviser->AdviserCareer as $career)
                                    {{ $career->year }}: {{ $career->career }}<br>
                                @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>面談拒否</th>
                                <td>{{ $adviser->AdviserProfile->deny_interview ? '面談拒否あり' : '面談拒否なし' }}</td>
                            </tr>
                            <tr>
                                <th>紹介できる企業の業界</th>
                                <td>{{ $adviser->AdviserProfile->industry }}</td>
                            </tr>
                            <tr>
                                <th>紹介できる企業の数</th>
                                <td>{{ $adviser->AdviserProfile->company_number }}</td>
                            </tr>
                            <tr>
                                <th>紹介できる企業の所在地</th>
                                <td>{{ $adviser->AdviserProfile->place }}</td>
                            </tr>
                            <tr>
                                <th>面談実績</th>
                                <td>{{ $adviser->AdviserProfile->performance }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
