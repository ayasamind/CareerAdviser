<?php

namespace App\Http\Utils;

use App\Repositories\Adviser\AdviserInterface;
use App\Adviser;
use App\AdviserProfile;
use App\AdviserCareer;

class AdviserUtils implements AdviserInterface
{
    private $Adviser;

    public function __construct(
        Adviser $adviser,
        AdviserProfile $adviser_profile,
        AdviserCareer $adviser_career
    )
    {
        $this->Adviser = $adviser;
        $this->AdviserProfile = $adviser_profile;
        $this->AdviserCareer = $adviser_career;
    }

    public function saveProfile($adviser, $data, $photo_url)
    {
        $profile = $this->AdviserProfile->where(['adviser_id' => $adviser->id])->first();
        if ($profile) {
            $profile->photo_url = $photo_url ? $photo_url : $profile->photo_url;
            $profile->gender = $data['AdviserProfile']['gender'];
            $profile->prefecture_id = $data['AdviserProfile']['prefecture_id'];
            $profile->comment = $data['AdviserProfile']['comment'];
            $profile->introduce = $data['AdviserProfile']['introduce'];
            $profile->industry = $data['AdviserProfile']['industry'];
            $profile->company_number = $data['AdviserProfile']['company_number'];
            $profile->place = $data['AdviserProfile']['place'];
            $profile->performance = $data['AdviserProfile']['performance'];
            $profile->deny_interview = $data['AdviserProfile']['deny_interview'];
        } else {
            $profile = new AdviserProfile([
                'adviser_id'     => $adviser['id'],
                'photo_url'      => $photo_url,
                'gender'         => $data['AdviserProfile']['gender'],
                'prefecture_id'  => $data['AdviserProfile']['prefecture_id'],
                'comment'        => $data['AdviserProfile']['comment'],
                'introduce'      => $data['AdviserProfile']['introduce'],
                'industry'       => $data['AdviserProfile']['industry'],
                'company_number' => $data['AdviserProfile']['company_number'],
                'place'          => $data['AdviserProfile']['place'],
                'performance'    => $data['AdviserProfile']['performance'],
                'deny_interview' => $data['AdviserProfile']['deny_interview']
            ]);
        }
        $profile->save();
    }

    public function saveCareers($adviser, $data)
    {
        $this->AdviserCareer->where('adviser_id', $adviser->id)->delete();
        foreach ($data['AdviserCareer'] as $career) {
            $adviser->AdviserCareer()->firstOrCreate(
                ['year' => $career['year'], 'career' => $career['career']]
            );
        }
    }

    public function saveTags($adviser, $data)
    {
        $adviser->Tag()->sync($data['Tag']);
    }
}
