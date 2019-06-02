<?php

namespace App\Interfaces;

interface AdviserInterface
{
    public function saveProfile($adviser, $data, $photo_url);

    public function saveCareers($adviser, $data);
}
