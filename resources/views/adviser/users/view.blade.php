@extends('layouts.adviser')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ユーザー詳細</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th width="20%">プロフィール画像</th>
                                <td>
                                    @if ($user->UserProfile)
                                        <img height="200px" src="{{ $user->UserProfile->photo_url }}">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>名前</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>性別</th>
                                <td>
                                    @if ($user->UserProfile)
                                        {{ $user->UserProfile->gender_label }}
                                    @endif
                                </td>
                            <tr>
                                <th>都道府県</th>
                                <td>
                                    @if ($user->UserProfile)
                                        {{ $user->UserProfile->prefecture }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>大学/学部/学科</th>
                                    <td>
                                        @if ($user->UserProfile)
                                           {{ $user->UserProfile->university  }}
                                        @endif
                                    </td>
                                </tr>
                            <tr>
                                <th>卒業年度</th>
                                <td>
                                    @if ($user->UserProfile)
                                        {{ $user->UserProfile->graduate_year }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>生年月日</th>
                                <td>
                                    @if ($user->UserProfile)
                                        {{ $user->UserProfile->birthday ? $user->UserProfile->birthday->format('Y年m月d日') : "" }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>内定数</th>
                                <td>
                                    @if ($user->UserProfile)
                                        {{ $user->UserProfile->informal_decision }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>選考状況</th>
                                <td>
                                    @if ($user->UserProfile)
                                        {{ $user->UserProfile->situation }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>軸</th>
                                <td>
                                    {{ $user->desire_axis }}
                                </td>
                            </tr>
                            <tr>
                                <th>その理由</th>
                                <td>
                                    @if ($user->UserProfile)
                                        {{ $user->UserProfile->axis_reason }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>業界</th>
                                <td>
                                    {{ $user->desire_industry }}
                                </td>
                            </tr>
                            <tr>
                                <th>職種</th>
                                <td>
                                    {{ $user->desire_job }}
                                </td>
                            </tr>
                            <tr>
                                <th>希望勤務地</th>
                                <td>
                                    {{ $user->desire_prefecture }}
                                </td>
                            </tr>
                            <tr>
                                <th>会社タイプ</th>
                                <td>
                                    {{ $user->desire_company_type }}
                                </td>
                            </tr>
                        </table>
                        <a class="btn btn-secondary" href="{{ route('adviser.requests.index') }}">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
