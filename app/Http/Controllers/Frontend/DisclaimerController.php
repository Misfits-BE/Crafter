<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * DisclaimerController 
 * 
 * Controller voor het informeren van de gebruiker omtrent de algemene voorwaarden.
 *
 */
class DisclaimerController extends Controller
{
	/**
	 * De pagina voor de disclaimer informatie. 
	 *
	 * @return View
	 */
    public function index(): View 
    {
    	return view('frontend.disclaimer.index');
    }
}
