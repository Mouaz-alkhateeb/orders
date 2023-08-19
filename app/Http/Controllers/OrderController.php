<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Statuses\OrderStatus;
use App\Statuses\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_order()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->type == UserType::USER) {
            $order = new Order();
            $order->title = $request->title;
            $order->description = $request->description;
            $order->user_id = Auth::id();
            $order->save();
            if ($order) {
                return redirect('orders')->with('status', 'Order Created Successfully');
            } else {
                return redirect('orders')->with('status', 'Contact Created Failed');
            }
        } else {
            return redirect('orders')->with('status', 'You Cannot Create Order..!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }
    public function approve($id)
    {
        if (auth()->user()->type == UserType::MANGER) {
            $order = Order::findOrFail($id);
            $order->update([
                'status' => OrderStatus::APPROVED
            ]);
            if ($order) {
                return redirect('orders')->with('status', 'Order Approved Successfully');
            } else {
                return redirect('orders')->with('status', 'Order Approved Failed');
            }
        } else {
            return redirect('orders')->with('status', 'You Cannot Approve Order..!!');
        }
    }
    public function reject($id)
    {
        if (auth()->user()->type == UserType::MANGER) {
            $order = Order::findOrFail($id);
            $order->update([
                'status' => OrderStatus::REJECTED
            ]);
            if ($order) {
                return redirect('orders')->with('status', 'Order Rejected Successfully');
            } else {
                return redirect('orders')->with('status', 'Order Rejected Failed');
            }
        } else {
            return redirect('orders')->with('status', 'You Cannot Reject Order..!!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
