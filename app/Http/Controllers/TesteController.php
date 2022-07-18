<?php

namespace App\Http\Controllers;

use App\Services\Vendor\MagnusBilling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesteController extends Controller
{
    protected $magnusApi;

    public function __construct() {
        $this->magnusApi = new MagnusBilling(env('MAGNUS_API_KEY'), env('MAGNUS_API_SECRET'));
        $this->magnusApi->public_url = env('MAGNUS_API_URL');
    }

    public function teste() {
        return $this->plan();
    }

    public function users() {
        $this->magnusApi->setFilter('id_group', 3, 'eq', 'numeric');

        return response()->json($this->magnusApi->read('user'));
    }

    public function me() {
        $this->magnusApi->setFilter('id', Auth::user()->account_id, 'eq', 'numeric');

        return response()->json($this->magnusApi->read('user')['rows'][0]);
    }

    public function plan() {
        $this->magnusApi->setFilter('id', 1, 'eq', 'numeric');

        return response()->json($this->magnusApi->read('plan')['rows'][0]);
    }

    public function services() {
        /* this module doens't work with setFilter, so we need to get all services an filter the collection further */
        return response()->json($this->magnusApi->read('services')['rows']);
    }

    public function calls() {
        return response()->json($this->magnusApi->read('call'));
    }

    public function tarifas() {
        return response()->json($this->magnusApi->read('rate'));
    }

    public function dids() {
        return response()->json($this->magnusApi->read('did'));
    }

}
