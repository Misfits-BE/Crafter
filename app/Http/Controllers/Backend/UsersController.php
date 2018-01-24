<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
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


    /** @var \App\Repositories\RoleRepository $roles */
    private $roles; 

    /**
     * UsersController constructor; 
     * 
     * @param  UserRepository $users    Abstractie laag tussen model en controller.
     * @param  RoleRepository $roles    Abstractie laag tussen model en controller.
     * @return void 
     */
    public function __construct(UserRepository $users, RoleRepository $roles) 
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * Index pagina voor de beheers console omtrent gebruikers. 
     * 
     * @todo Register tooltips to the user functions
     * @todo Implement user functions to the view.
     * @todo Implementatie PHPUnit test
     * 
     * @return \Illuminate\View\View
     */
    public function index (): View 
    {
        return view('backend.users.index', ['users' => $this->users->paginateUsers(15, 'simple')]); 
    }

    /**
     * Creatie pagina voor een nieuwe gebruiker. 
     * 
     * @todo Implementatie unit test
     * @todo Opbouwen van de weergave pagina
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View 
    {
        return view('backend.users.create', ['roles' => $this->roles->all(['name'])]);
    }
}
