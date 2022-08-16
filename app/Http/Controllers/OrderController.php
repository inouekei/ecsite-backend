<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user){
            $orders = $user->orders()->Paginate(8);
            if($orders){
                foreach ($orders as $order) {
                    unset($order['id']);
                    unset($order['user_id']);
                    unset($order['updated_at']);
                }
                return response()->json([
                    'data' => $orders
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
        }else{
            return response()->json([
                'message' => 'Forbidden',
            ], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $temp = Order::factory(1)->create();
            $uuid = $temp[0]['uuid'];
            Order::where('id', $temp[0]->id)->delete();
            $singleorders = $request->all();
            foreach($singleorders as $singleorder){
                $singleorder['user_id'] = $user->id;
                $singleorder['uuid'] = $uuid;
                Order::create($singleorder);
            }            
            return response()->json([
                'uuid' => $uuid
            ], 201);
        } else {
            return response()->json([
                'message' => 'Forbidden',
            ], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
