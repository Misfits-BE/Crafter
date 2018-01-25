<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\ActivityLog;

/**
 * Controller
 *
 * De basis controller voor de applicatie.
 *
 * @author    Tim Joosten <tim@activisme.be>
 * @copyright 2018 Tim Joosten
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ActivityLog;
}
