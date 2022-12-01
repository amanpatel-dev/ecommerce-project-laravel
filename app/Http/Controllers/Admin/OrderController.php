<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class OrderController extends Controller
{


    public function index(Request $request)
    {
        $todayDate = Carbon::now();
        $orders = Order::when(
            $request->date != null,
            function ($q) use ($request) {
                return $q->whereDate('created_at', $request->date);
            },
            function ($q) use ($todayDate) {
                $q->whereDate('created_at', $todayDate);
            }
        )
            ->when(
                $request->status != null,
                function ($q) use ($request) {
                    return $q->where('status_message', $request->status);
                }
            )
            ->paginate(10);

        return view('admin.order.index', compact('orders'));
    }
    public function show($orderId)
    {
        $orders = Order::where('id', $orderId)->first();
        if ($orders) {
            return view('admin.order.view', compact('orders'));
        } else {
            return redirect()->back()->with('message', 'no order found');
        }
    }
    public function updateOrderStatus(int $orderId, Request $request)
    {
        $orders = Order::where('id', $orderId)->first();
        if ($orders) {
            $orders->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orders->id)->with('message', 'Order Status Updated');
        } else {
            return redirect()->back()->with('message', 'no order found');
        }
    }
}
