<?php

namespace App\Repositories\Adviser;

interface AdviserInterface
{
    public function saveProfile($adviser, $data, $photo_url);

    public function saveCareers($adviser, $data);

    public function saveTags($adviser, $data);
}
