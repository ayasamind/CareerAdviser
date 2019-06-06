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
    <label for="introduce" class="col-md-4 col-form-label text-md-right">略歴</label>
</div>

<div id="career-form">
    @if (!count($adviser->AdviserCareer))
        <?php $key = 0 ?>
        <div class="row">
            <div class="col-md-10"></div>
            <button type="button" class="deleteCareer btn btn-danger col-md-1 float-right" data-delete="{{ $key }}">x</button>
        </div>
        <div class="{{ 'form'.$key.' form-count' }}">
            <div class="form-group row">
                <label for="introduce" class="col-md-3 col-form-label text-md-right"></label>
                <label for="introduce" class="col-md-2 col-form-label text-md-right">年度</label>
                <div class="col-md-3">
                    {!! Form::text('AdviserCareer['.$key.'][year]', null, ['id'=>'year', 'class'=>'form-control '  . ($errors->has('adviser_career.'.$key.'.year') ? 'is-invalid' : ''), 'required'=>'required']) !!}

                    @if ($errors->has('adviser_career.'.$key.'.year'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('adviser_career.'.$key.'.year') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="introduce" class="col-md-3 col-form-label text-md-right"></label>
                <label for="introduce" class="col-md-2 col-form-label text-md-right">略歴</label>
                <div class="col-md-5">
                    {!! Form::text('AdviserCareer['.$key.'][career]', null, ['id'=>'career', 'class'=>'form-control '  . ($errors->has('adviser_career.'.$key.'.career') ? 'is-invalid' : ''), 'required'=>'required']) !!}

                    @if ($errors->has('adviser_career.'.$key.'.career'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('adviser_career.'.$key.'.career') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="{{ 'row form'.$key }}"><div class="col-md-3"></div><hr class="col-md-6"/></div>
    @else
        @foreach ($adviser->AdviserCareer as $key => $career)
            <div class="row">
                <div class="col-md-10"></div>
                <button type="button" class="deleteCareer btn btn-danger col-md-1 float-right" data-delete="{{ $key }}">x</button>
            </div>
            <div class="{{ 'form'.$key.' form-count' }}">
                <div class="form-group row">
                    <label for="introduce" class="col-md-3 col-form-label text-md-right"></label>
                    <label for="introduce" class="col-md-2 col-form-label text-md-right">年度</label>
                    <div class="col-md-3">
                        {!! Form::text('AdviserCareer['.$key.'][year]', null, ['id'=>'year', 'class'=>'form-control '  . ($errors->has('adviser_career.'.$key.'.year') ? 'is-invalid' : ''), 'required'=>'required']) !!}

                        @if ($errors->has('adviser_career.'.$key.'.year'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('adviser_career.'.$key.'.year') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="introduce" class="col-md-3 col-form-label text-md-right"></label>
                    <label for="introduce" class="col-md-2 col-form-label text-md-right">略歴</label>
                    <div class="col-md-5">
                        {!! Form::text('AdviserCareer['.$key.'][career]', null, ['id'=>'career', 'class'=>'form-control '  . ($errors->has('adviser_career.'.$key.'.career') ? 'is-invalid' : ''), 'required'=>'required']) !!}

                        @if ($errors->has('adviser_career.'.$key.'.career'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('adviser_career.'.$key.'.career') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="{{ 'row form'.$key }}"><div class="col-md-3"></div><hr class="col-md-6"/></div>
        @endforeach
    @endif
</div>

<div class="form-group row">
    <div class="col-md-6"></div>
    <button type="button" id="addCareer" class="btn btn-primary col-md-2 float-right">略歴を追加</button>
</div>

<div class="form-group row">
    <label for="gender" class="col-md-4 col-form-label text-md-right">面談拒否</label>

    <div class="col-md-6">
        {!! Form::select('AdviserProfile[deny_interview]', [null => '選択してください', 0 => '面談拒否なし', 1 => '面談拒否あり'], null, ['id'=>'gender', 'class'=>'form-control '  . ($errors->has('adviser_profile.deny_interview') ? 'is-invalid' : ''), 'required'=>'required']) !!}

        @if ($errors->has('adviser_profile.deny_interview'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('adviser_profile.deny_interview') }}</strong>
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

<div class="form-group row">
    <label for="tag" class="col-md-4 col-form-label text-md-right">タグ</label>
    <div class="col-md-6">
        <div>
            @if ($errors->has('Tag'))
                <span class="validate-error" role="alert">
                    <strong>{{ $errors->first('Tag') }}</strong>
                </span>
            @endif
        </div>
        <br/>
        @foreach ($tags as $key => $tag)
            <div class="form-check">
                {!! Form::checkbox('Tag[]', $tag->id, null,  ['id'=>'tag'.$key, 'class'=>'form-check-input']) !!}
                <label class="form-check-label" for="{{ 'tag'.$key }}">{{ $tag->name }}</label>
            </div>
        @endforeach
    </div>
</div>



<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            登録
        </button>
    </div>
</div>
