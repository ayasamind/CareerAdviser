<?php

namespace App\Http\Controllers\Adviser;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdviserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
