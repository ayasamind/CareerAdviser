<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

    <div class="col-md-6">
        {!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control '  . ($errors->has('name') ? 'is-invalid' : ''), 'required'=>'required']) !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

    <div class="col-md-6">
        {!! Form::email('email', null, ['id'=>'email', 'class'=>'form-control '  . ($errors->has('email') ? 'is-invalid' : ''), 'required'=>'required']) !!}

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="photo" class="col-md-4 col-form-label text-md-right">プロフィール画像</label>

    <div class="col-md-6">
        @if ($adviser->photo_url)
            <img src="{{ $adviser->photo_url }}" width="200"/>
        @endif
        {!! Form::file('photo', null, ['id'=>'photo', 'class'=>'form-control-file '  . ($errors->has('photo') ? 'is-invalid' : '')]) !!}
        @if ($errors->has('photo'))
            <span class="validate-error">
                <br/>
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            登録
        </button>
    </div>
</div>
