<?php

namespace Tests\Feature\Requests\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Adviser;
use App\Http\Requests\User\UpdateUserNameRequest;
use Illuminate\Support\Facades\Validator;
use App\Enums\Prefecture;

class UpdateUserNameRequestTest extends TestCase
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
        $request = new UpdateUserNameRequest();

        $rules = $request->rules();

        $validator = Validator::make($data, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function validationErrorProvider()
    {
        return [
            '正常' => [
                [
                    'name'       => 'ユーザー',
                    'gender'     => 1,
                    'prefecture' => Prefecture::HOKKAIDO
                ],
                true
            ],
            '名前必須エラー' => [
                [
                    'name'       => null,
                    'gender'     => 1,
                    'prefecture' => Prefecture::HOKKAIDO
                ],
                false
            ],
            '都道府県必須エラー' => [
                [
                    'name'       => 'ユーザー',
                    'gender'     => 1,
                    'prefecture' => null
                ],
                false
            ],
        ];
    }
}
