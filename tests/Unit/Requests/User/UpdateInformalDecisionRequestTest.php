<?php

namespace Tests\Feature\Requests\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Adviser;
use App\Http\Requests\User\UpdateInformalDecisionRequest;
use Illuminate\Support\Facades\Validator;
use App\Enums\Prefecture;

class UpdateInformalDecisionRequestTest extends TestCase
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
        $request = new UpdateInformalDecisionRequest();

        $rules = $request->rules();

        $validator = Validator::make($data, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function validationErrorProvider()
    {
        return [
            '正常' => [
                [
                    'informal_decision' => '1',
                    'situation'         => '悪い',
                ],
                true
            ],
            '必須エラー' => [
                [
                    'informal_decision' => '1',
                    'situation'         => null,
                ],
                false
            ]
        ];
    }
}
