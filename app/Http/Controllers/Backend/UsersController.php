<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserValidator;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
     * @todo Implement admin permission check.
     * @todo Implement middlewarr forbid-banned-user
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
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View 
    {
        return view('backend.users.create', ['roles' => $this->roles->all(['name'])]);
    }

    /**
     * Slaag een nieuwe gebruiker op in het systeem 
     * 
     * @todo Implementatie phpunit test
     * 
     * @param  UserValidator De gegeven gebruikers invoer. (Gevalideerd)
     * @return \Illuminate\Http\RedirectResponse 
     */
    public function store(UserValidator $input): RedirectResponse 
    {
        $password = str_random(16);
        $input->merge(['password' => bcrypt($password)]);

        if ($user = $this->users->create($input->except(['_token', 'role']))->assignRole($input->role)) {
            flash("Er is een login voor {$user->name} toegevoegd in het systeem.")->success()->important();
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Verwijder een gebruiker uit het systeem. 
     * 
     * @todo Implementatie phpunit test 
     * 
     * @param  int $user    De unieke identificatie van de gebruiker in de databank
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $user): RedirectResponse 
    {
        $user = $this->users->findOrFail($user);

        if ($user->delete()) {
            flash("De login voor {$user->name} is verwijderd uit het systeem.")->success()->important();
        }

        return redirect()->route('admin.users.index');
    }
}
