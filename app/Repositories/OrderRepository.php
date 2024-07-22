<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderRepository extends Repository
{
    public function getAll(Request $request)
    {
        $orders = User::query();

        if ($request->has('user_id')) {
            $orders->where('user_id', $request->user_id);
        }

        return $orders->paginate($request->paginate ?? 20);
    }
}
