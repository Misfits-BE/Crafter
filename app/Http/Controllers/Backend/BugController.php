<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BugValidator;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use Illuminate\View\View; 
use Illuminate\Http\RedirectResponse;

/**
 * Helpdeks controller voor het melden van bugs in de applicatie. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten 
 * @package     \App\Http\Controllers\Backend
 */
class BugController extends Controller
{
    /** @var \App\Repositories\TicketRepository $tickets */
    private $tickets; 

    /**
     * BugController constructor 
     * 
     * @param  TicketRepository $tickets    De abstractie laag tussen controller en database. 
     * @return void
     */
    public function __construct(TicketRepository $tickets) 
    {
        $this->middleware(['auth', 'forbid-banned-user']);
        $this->tickets = $tickets;
    }

    /**
     * Weergave van de ticket creatie pagina. 
     * 
     * @todo Implementatie PHPUnit test 
     * @todo Registratie routering 
     * @todo Opbouwen weergave
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View 
    {
        return view('backend.tickets.create');
    }

    /**
     * Opslag van een ticket iàn het systeem.
     * 
     * @todo Implementatie PHPUnit 
     * @todo Implementatie routering 
     * @todo opbouwen validator 
     * 
     * @param  BugValidator $input  De gegeven gebruikers invoer. (Gevalideerd)
     * @return \Illuminate\View\RedirectResponse
     */
    public function store(BugValidator $input): RedirectResponse 
    {
        return back(302);
    }
}
