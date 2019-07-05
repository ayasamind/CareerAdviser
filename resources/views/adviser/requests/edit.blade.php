@extends('layouts.adviser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">面談申請編集</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>名前</th>
                            <td>
                                <a href="{{ route('adviser.user.show', [
                                    'id' => $meetingRequest->User->id
                                ]) }}">
                                {{ $meetingRequest->User->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>
                                <a href="mailto:{{ $meetingRequest->User->email }}">
                                    {{ $meetingRequest->User->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>希望面談日時</th>
                            <td>{{ $meetingRequest->date->format('Y年m月d日 H:i') }}</td>
                        </tr>
                        <tr>
                            <th>希望面談形式</th>
                            <td>{{ $meetingRequest->type_label }}
                                @if ($duplicateFlag)
                                    <span role="alert" class="validate-error">
                                        <strong>※既に別の面談予約が入っています</strong>
                                    </span>
                                @endif
                            </td>
                        </tr>
                            <th>ステータス</th>
                            <td>{{ $meetingRequest->status_label }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">操作</div>

                <div class="card-body">
                    @if ($meetingRequest->status == \App\MeetingRequest::STATUS_TYPE_UNAPPROVED)
                        {!! Form::model($meetingRequest, ['route' => ['adviser.requests.update', $meetingRequest->id], 'method' => 'put']) !!}
                        @csrf
                        {!! Form::hidden('id', $meetingRequest->id) !!}
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">コメント</label>

                            <div class="col-md-8">
                                {!! Form::textarea('comment', null, [
                                    'id'=>'comment',
                                    'class'=>'form-control '  . ($errors->has('comment') ? 'is-invalid' : ''),
                                    'required'=>'required',
                                    'cols' => '140',
                                    'rows' => '6',
                                    'placeholder' => '拒否の場合:「求められている企業が紹介できないため」など'
                                ]) !!}
                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                                <button type="submit" name="status" value="{{ \App\MeetingRequest::STATUS_TYPE_DENIED }}" class="btn btn-danger col-md-3">非承認</button>
                                <div class="col-md-2"></div>
                                <button tyoe="submit" name="status" value="{{ \App\MeetingRequest::STATUS_TYPE_APPROVED }}" class="btn btn-primary approve col-md-3">承認</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    @else
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">コメント</label>

                            <div class="col-md-8 col-form-label">
                                {{ $meetingRequest->comment }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
$(document).on("click", ".approve", function() {
    if ({{ $duplicateFlag }} > 0) {
        confirm("同じ日程に別の面談予約が入っていますが、本当に承認しますか？")
    }
})

</script>
