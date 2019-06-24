<?php
namespace App\Http\Requests\Adviser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdviserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (!$this->PhotoExist) {
            // new profile
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:advisers,email,' . $this->id . ',id'],
                'AdviserProfile.photo' => ['required', 'image', 'mimes:jpeg,jpg,png'],
                'AdviserProfile.gender' => ['required', 'integer'],
                'AdviserProfile.prefecture_id' => ['required', 'integer'],
                'AdviserProfile.comment' => ['required', 'string'],
                'AdviserProfile.introduce' => ['required', 'string'],
                'AdviserProfile.industry' => ['required', 'string'],
                'AdviserProfile.company_number' => ['required', 'string'],
                'AdviserProfile.place' => ['required', 'string'],
                'AdviserProfile.deny_interview' => ['required', 'boolean'],
                'AdviserCareer.*.year' => ['required', 'string'],
                'AdviserCareer.*.career' => ['required', 'string'],
                'Tag' => ['required', 'present', 'max_number:8'],
            ];
        } else {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:advisers,email,' . $this->id . ',id'],
                'AdviserProfile.photo' => ['image', 'mimes:jpeg,jpg,png'],
                'AdviserProfile.gender' => ['required', 'integer'],
                'AdviserProfile.prefecture_id' => ['required', 'integer'],
                'AdviserProfile.comment' => ['required', 'string'],
                'AdviserProfile.introduce' => ['required', 'string'],
                'AdviserProfile.industry' => ['required', 'string'],
                'AdviserProfile.company_number' => ['required', 'string'],
                'AdviserProfile.place' => ['required', 'string'],
                'AdviserProfile.deny_interview' => ['required', 'boolean'],
                'AdviserCareer.*.year' => ['required', 'string'],
                'AdviserCareer.*.career' => ['required', 'string'],
                'Tag' => ['required', 'present', 'max_number:8'],
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'AdviserProfile.photo.required' => 'プロフィール画像は必須です',
            'AdviserProfile.photo.image' => 'プロフィール画像には画像ファイルを指定してください',
            'AdviserProfile.photo.mimes:jpeg,jpg,png' => 'jpeg, jpg, pngのいづれかの拡張子のみ対応しています',
            'Tag.required' => 'タグは最低一つ選択してください'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        \Session::flash('error', 'アドバイザーの保存に失敗しました');
        return parent::failedValidation($validator);
    }
}
