<?php

namespace Tests\Feature\Requests\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Adviser;
use App\Http\Requests\User\UpdateDesireRequest;
use Illuminate\Support\Facades\Validator;
use App\Enums\Prefecture;

class UpdateDesireRequesttTest extends TestCase
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
        $request = new UpdateDesireRequest();

        $rules = $request->rules();

        $validator = Validator::make($data, $rules);

        $this->assertEquals($expect, $validator->passes());
    }

    public function validationErrorProvider()
    {
        return [
            '正常' => [
                [
                    'axis_reason' => '理由',
                    'desire'      => '脂肪'
                ],
                true
            ],
            '必須エラー' => [
                [
                    'axis_reason' => '理由',
                    'desire'      => null
                ],
                false
            ],
        ];
    }
}
