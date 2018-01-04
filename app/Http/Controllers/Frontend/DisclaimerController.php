<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

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
