こんにちは{{$adviser->name}}さん
<br/><br/>
{{ $user->name }}さんから面談の申し込みがありました。
以下のURLから詳細を確認してください。
<br>
<a href="{{ route('adviser.requests.edit', [
    'id' => $meetingRequest->id
]) }}">キャリアドバイザー.comへ</a>
<table>
<tr>
    <th>ユーザー名</th>
    <td>{{$user->name}}</td>
</tr>
<tr>
    <th>希望面談日時</th>
    <td>{{$meetingRequest->date->format('Y年m月d日 H:i')}}</td>
</tr>
</table>
