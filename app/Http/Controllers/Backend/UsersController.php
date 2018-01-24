<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controller voor het beheren van gebruikers in de applicatie. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   Tim Joosten
 * @package     \App\Http\Controllers\Backend
 */
class UsersController extends Controller
{
    /** @var \App\Repositories\UserRepository $users */
    private $users; 

    /**
     * UsersController constructor; 
     * 
     * @param  UserRepository $users    Abstractie laag tussen model en controller.
     * @return void 
     */
    public function __construct(UserRepository $users) 
    {
        $this->users = $users;
    }

    /**
     * Index pagina voor de beheers console omtrent gebruikers. 
     * 
     * @return \Illuminate\View\View
     */
    public function index (): View 
    {
        return view('backend.users.index', ['users' => $this->users->paginateUsers(15, 'simple')]); 
    }
}
