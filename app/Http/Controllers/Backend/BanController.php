<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;

class BanController extends Controller
{
    /** @var \App\Repositories\UserRepository $user */
    private $user; 

    /**
     * BanController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function lock(int $user): RedirectResponse 
    {

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlock(int $user): RedirectResponse 
    {

    }
}
