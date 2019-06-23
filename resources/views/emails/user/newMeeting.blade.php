こんにちは{{$adviser->name}}さん
<br>
{{ $user->name }}さんから面談の申し込みがありました。
以下のURLから詳細を確認してください。
<br>

<table>
<tr>
    <th>ユーザー名</th>
    <td>{{$user->name}}</td>
</tr>
<tr>
    <th>希望面談日程</th>
    <td>{{$adviser->email}}</td>
</tr>
</table>
