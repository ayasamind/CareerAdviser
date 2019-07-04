こんにちは{{$meetingRequest->User->name}}さん
<br>
{{ $meetingRequest->Adviser->name }}さんとの面談が承認されました。
<a href="{{ route('user.mypage') }}">マイページ</a>から詳細を確認してください。
<br>

<table>
    <tr>
        <th>アドバイザー名</th>
        <td>{{$meetingRequest->Adviser->name}}</td>
    </tr>
    <tr>
        <th>面談日程</th>
        <td>{{$meetingRequest->date->format('Y年m月d日 H:i')}}</td>
    </tr>
    <tr>
        <th>コメント</th>
        <td>{{$meetingRequest->comment}}</td>
    </tr>
</table>

@include('emails.element._footer')
