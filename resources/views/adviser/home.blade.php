@extends('layouts.adviser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('adviser.advisers.edit') }}">ユーザー情報編集</a>
                    @if ($adviser->AdviserProfile)
                        <a class="btn btn-primary" target="_brank" href="{{ route('advisers.show', [ 'id' => $adviser->id ]) }}">公開画面を確認</a>
                    @endif
                    <table class="table">
                        <tr>
                            <th>プロフィール画像</th>
                            <td>
                                @if ($adviser->AdviserProfile)
                                    <img src="{{ $adviser->AdviserProfile->photo_url ? $adviser->AdviserProfile->photo_url : asset('img/service/default_usericon.jpg')}}" width="200"/>
                                @else
                                    <img src="{{ asset('img/service/default_usericon.jpg') }}" width="200"/>
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
                        <tr>
                            <th>公開/非公開</th>
                            <td>{{ $adviser->public_label }}</td>
                        </tr>
                        <tr>
                            <th>日程調整カレンダーの表示</th>
                            <td>{{ $adviser->schedule_label }}</td>
                        </tr>
                            <tr>
                                <th>性別</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->genderLabel }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>都道府県</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->prefecture }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>一言コメント</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->comment }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>自己紹介</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->introduce }}
                                    @endif
                                </td>
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
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->deny_interview ? '面談拒否あり' : '面談拒否なし' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>紹介できる企業の業界</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->industry }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>紹介できる企業の数</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->company_number }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>紹介できる企業の所在地</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->place }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>面談実績</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->performance }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>面談場所住所</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->meeting_place }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>インタビュー記事URL</th>
                                <td>
                                    @if ($adviser->AdviserProfile)
                                        {{ $adviser->AdviserProfile->article_url }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>タグ</th>
                                <td>
                                    @foreach ($adviser->Tag as $key => $tag)
                                        @if ($key+1 != count($adviser->Tag))
                                            {{ $tag->name }},
                                        @else
                                            {{ $tag->name }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
