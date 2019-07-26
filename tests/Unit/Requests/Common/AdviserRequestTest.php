<?php

namespace Tests\Feature\Requests\Common;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Adviser;
use App\Http\Requests\Common\AdviserRequest;
use Illuminate\Support\Facades\Validator;

class AdviserRequestTest extends TestCase
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
        $request = new AdviserRequest();

        $rules = $request->rules();

        $validator = Validator::make($data, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function validationErrorProvider()
    {
        return [
            // 作成時
            '正常' => [
                [
                    'name'  => 'アドバイザー',
                    'email' => 'adviser@example.com'
                ],
                true
            ],
            '名前必須エラー' => [
                [
                    'name'  => '',
                    'email' => 'adviser@example.com'
                ],
                false
            ],
            // 更新時
            '正常' => [
                [
                    'id'    => 1,
                    'name'  => 'アドバイザー',
                    'email' => 'adviser@example.com'
                ],
                true
            ],
            'メールアドレスエラー' => [
                [
                    'id'    => 1,
                    'name'  => 'アドバイザー',
                    'email' => 'adviser'
                ],
                false
            ],
        ];
    }
}
