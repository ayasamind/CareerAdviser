<div class="form-group row">
    <label for="photo" class="col-md-4 col-form-label text-md-right">プロフィール画像</label>

    <div class="col-md-6">
        @if ($adviser->AdviserProfile)
            <img src="{{ $adviser->AdviserProfile->photo_url }}" width="200"/>
            {!! Form::hidden('PhotoExist', 'photo_url', ['id'=>'photo', 'class'=>'form-control-file '  . ($errors->has('adviser_profile.photo') ? 'is-invalid' : '')]) !!}
        @else
            <img src="{{ asset('img/no_image.png') }}" width="200"/>
        @endif
        {!! Form::file('AdviserProfile[photo]', null, ['id'=>'photo', 'class'=>'form-control-file '  . ($errors->has('adviser_profile.photo') ? 'is-invalid' : '')]) !!}
        @if ($errors->has('AdviserProfile.photo'))
            <span class="validate-error">
                <br/>
                <strong>{{ $errors->first('AdviserProfile.photo') }}</strong>
            </span>
        @endif
    </div>
</div>

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
    <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>

    <div class="col-md-6">
        {!! Form::select('AdviserProfile[gender]', [null => '選択してください', 1 => '男性', 2 => '女性'], null, ['id'=>'gender', 'class'=>'form-control '  . ($errors->has('adviser_profile.gender') ? 'is-invalid' : ''), 'required'=>'required']) !!}

        @if ($errors->has('adviser_profile.gender'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('adviser_profile.gender') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="prefecture" class="col-md-4 col-form-label text-md-right">都道府県</label>

    <div class="col-md-6">
        {!! Form::select('AdviserProfile[prefecture_id]', $prefectures, null, ['id'=>'prefecture', 'class'=>'form-control '  . ($errors->has('adviser_profile.prefecture') ? 'is-invalid' : ''), 'required'=>'required']) !!}

        @if ($errors->has('adviser_profile.prefecture'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('adviser_profile.prefecture') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="comment" class="col-md-4 col-form-label text-md-right">一言コメント</label>

    <div class="col-md-6">
        {!! Form::textarea('AdviserProfile[comment]', null, ['id'=>'comment', 'rows' => 2, 'class'=>'form-control '  . ($errors->has('adviser_profile.comment') ? 'is-invalid' : ''), 'required'=>'required']) !!}

        @if ($errors->has('adviser_profile.comment'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('adviser_profile.comment') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="introduce" class="col-md-4 col-form-label text-md-right">自己紹介</label>

    <div class="col-md-6">
        {!! Form::textarea('AdviserProfile[introduce]', null, ['id'=>'introduce', 'rows' => 5, 'class'=>'form-control '  . ($errors->has('adviser_profile.introduce') ? 'is-invalid' : ''), 'required'=>'required']) !!}

        @if ($errors->has('adviser_profile.introduce'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('adviser_profile.introduce') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="industry" class="col-md-4 col-form-label text-md-right">紹介できる企業の業界</label>

    <div class="col-md-6">
        {!! Form::text('AdviserProfile[industry]', null, ['id'=>'industry', 'class'=>'form-control '  . ($errors->has('adviser_profile.industry') ? 'is-invalid' : ''), 'required'=>'required']) !!}
        @if ($errors->has('adviser_profile.industry'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('adviser_profile.industry') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="company_number" class="col-md-4 col-form-label text-md-right">紹介できる企業の数</label>

    <div class="col-md-6">
        {!! Form::text('AdviserProfile[company_number]', null, ['id'=>'industry', 'class'=>'form-control '  . ($errors->has('adviser_profile.company_number') ? 'is-invalid' : ''), 'required'=>'required']) !!}
        @if ($errors->has('adviser_profile.company_number'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('adviser_profile.company_number') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="place" class="col-md-4 col-form-label text-md-right">紹介できる企業の所在地</label>

    <div class="col-md-6">
        {!! Form::text('AdviserProfile[place]', null, ['id'=>'place', 'class'=>'form-control '  . ($errors->has('adviser_profile.place') ? 'is-invalid' : ''), 'required'=>'required']) !!}
        @if ($errors->has('adviser_profile.place'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('adviser_profile.place') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="performance" class="col-md-4 col-form-label text-md-right">面談実績</label>

    <div class="col-md-6">
        {!! Form::text('AdviserProfile[performance]', null, ['id'=>'performance', 'class'=>'form-control '  . ($errors->has('adviser_profile.performance') ? 'is-invalid' : ''), 'required'=>'required']) !!}
        @if ($errors->has('adviser_profile.performance'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('adviser_profile.performance') }}</strong>
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
