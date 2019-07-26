<?php

namespace Tests\Feature\Requests\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Adviser;
use App\Http\Requests\User\UserRequest;
use Illuminate\Support\Facades\Validator;

class UserRequestTest extends TestCase
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
        $request = new UserRequest();

        $rules = $request->rules();

        $validator = Validator::make($data, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function validationErrorProvider()
    {
        return [
            '正常' => [
                [
                    'name'  => 'ユーザー',
                    'email' => 'user@example.com'
                ],
                true
            ],
            '名前必須エラー' => [
                [
                    'name'  => '',
                    'email' => 'user@example.com'
                ],
                false
            ],
            'メールアドレス重複エラー' => [
                [
                    'name'  => '',
                    'email' => 'yoshino@fusic.co.jp'
                ],
                false
            ],
        ];
    }
}
