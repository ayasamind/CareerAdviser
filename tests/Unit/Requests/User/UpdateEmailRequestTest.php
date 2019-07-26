<?php

namespace Tests\Feature\Requests\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Adviser;
use App\Http\Requests\User\UpdateEmailRequest;
use Illuminate\Support\Facades\Validator;
use App\Enums\Prefecture;

class UpdateEmailRequestTest extends TestCase
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
        $request = new UpdateEmailRequest();

        $rules = $request->rules();

        $validator = Validator::make($data, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function validationErrorProvider()
    {
        return [
            '正常' => [
                [
                    'email' => 'user@example.com',
                ],
                true
            ],
            '重複エラー' => [
                [
                    'email' => 'yoshino@fusic.co.jp',
                ],
                false
            ],
            'メールアドレス形式エラー' => [
                [
                    'email' => 'aaaa'
                ],
                false
            ],
            '必須エラー' => [
                [
                    'email' => ''
                ],
                false
            ],
        ];
    }
}
