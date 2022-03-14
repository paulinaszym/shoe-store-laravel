<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shelf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::ofType('User')->get();
        $todays_users = User::whereDate('created_at',DB::raw('CURDATE()'))->get();

        $orders = Order::whereDate('created_at',DB::raw('CURDATE()'))->get();

        $value = array();
        $amount =array();
        foreach ($orders as $order){
            $val= OrderProduct::where('order_id',$order->id)->sum('tot_price');
            $am = OrderProduct::where('order_id',$order->id)->sum('tot_amount');
            array_push($value,$val);
            array_push($amount,$am);
        }
        $orders_value = array_sum($value);
        $products_amount = array_sum($amount);
;        return view('admin.dashboard')
        ->with('users',$users)
        ->with('todays_users', $todays_users)
        ->with('orders',$orders)
        ->with('orders_value',$orders_value)
        ->with('products_amount',$products_amount);
    }
}
