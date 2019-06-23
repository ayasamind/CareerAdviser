<?php
namespace App\Enums\Traits;

use App\Enums\Prefecture;

trait GetPrefectureTrait {

    public static function getPrefectureList()
    {
        $keys = Prefecture::getKeys();
        $values = Prefecture::getValues();

        $list = [
            null => '選択してください'
        ];
        foreach ($values as $index => $value) {
            $list[$value] = Prefecture::getDescription($value);
        }

        return $list;
    }
}
