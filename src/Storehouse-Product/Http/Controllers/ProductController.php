<?php

namespace ResultSystems\Storehouse\Product\Http\Controllers;

use ResultSystems\Storehouse\Product\Http\Controllers\Controller;
use Illuminate\Core\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        return view('storehouse-product::create');
    }
    public function search()
    {
        return view('storehouse-product::search');
    }
}
