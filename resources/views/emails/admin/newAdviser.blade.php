こんにちは{{$adviser->name}}さん
<br>
あなたのアカウント情報は以下の通りです。
<a href="{{ route("adviser.auth.login") }}">{{ route("adviser.auth.login") }}</a>
からログインしてください。
<br>

<table>
<tr>
    <th>ユーザー名</th>
    <td>{{$adviser->name}}</td>
</tr>
<tr>
    <th>メールアドレス</th>
    <td>{{$adviser->email}}</td>
</tr>
<tr>
    <th>パスワード</th>
    <td>{{$pass}}</td>
</tr>
</table>
