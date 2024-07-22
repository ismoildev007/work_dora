<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

//    public function __construct()
//    {
//        $this->middleware('auth:sanctum');
//        $this->orderRepository = app(OrderRepository::class);
//    }
}
