<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SearchController;
use App\Http\Requests\DeniedOfferRequest;
use App\Http\Requests\OfferNotificationRequest;

class OffersController extends Controller
{

	// =====================================
    // Variables
    // =====================================
    protected $request = null;          // Inicializada a null
    protected $search = null;           // Buscador

	public function __construct(Request $request)
    {
    	// Almacenamos la petición realizada
        // en una variable de clase
        $this->request = $request;
        $this->search = new SearchController();
    }
    
}
