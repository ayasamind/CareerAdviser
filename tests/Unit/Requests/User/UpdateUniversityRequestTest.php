<?php

namespace Tests\Feature\Requests\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Adviser;
use App\Http\Requests\User\UpdatePasswordRequest;
use Illuminate\Support\Facades\Validator;
use App\Enums\Prefecture;

class UpdatePasswordRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

     /**
     * testValidationError
     * @author ayasamind
     * @dataProvider validationErrorProvider
     */
    public function testValidationError($data, $expect)
    {
        $request = new UpdatePasswordRequest();

        $rules = $request->rules();

        $validator = Validator::make($data, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function validationErrorProvider()
    {
        return [
            '正常' => [
                [
                    'password'              => 'password',
                    'password_confirmation' => 'password'
                ],
                true
            ],
            '必須エラー' => [
                [
                    'password'               => '',
                    'password_confirmation'  => ''
                ],
                false
            ],
            '文字数エラー' => [
                [
                    'password'               => 'aaaa',
                    'password_confirmation'  => 'aaaa'
                ],
                false
            ],
            '確認エラー' => [
                [
                    'password'               => 'password',
                    'password_confirmation'  => 'bazzword'
                ],
                false
            ]
        ];
    }
}
