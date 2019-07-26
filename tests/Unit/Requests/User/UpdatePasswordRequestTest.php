<?php

namespace Tests\Feature\Requests\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Adviser;
use App\Http\Requests\User\UpdateUniversityRequest;
use Illuminate\Support\Facades\Validator;
use App\Enums\Prefecture;

class UpdateUniversityRequestTest extends TestCase
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
        $request = new UpdateUniversityRequest();

        $rules = $request->rules();

        $validator = Validator::make($data, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function validationErrorProvider()
    {
        return [
            '正常' => [
                [
                    'university'      => '九州大学',
                    'graduate_year'   => 1,
                    'birthday'        => '1995-01-13'
                ],
                true
            ],
            '大学必須エラー' => [
                [
                    'university'       => null,
                    'graduate_year'    => 1,
                    'birthday'         => '1995-01-13'
                ],
                false
            ]
        ];
    }
}
