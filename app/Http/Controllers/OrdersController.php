<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\UserAddress;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user = $request->user();
        $address = UserAddress::find($request->input('address_id'));
        $remark = $request->input('remark');
        $items = $request->input('items');

        return $orderService->store($user, $address, $remark, $items);
    }

    public function index(Request $request)
    {
        $orders = Order::query()
            ->with(['items.product', 'items.productSku'])
            ->where(['user_id' => $request->user()->id])
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        return view('orders.index', ['orders' => $orders]);
    }

    public function show(Order $order)
    {
        $this->authorize('own', $order);
        return view('orders.show', ['order' => $order->load(['items.product', 'items.productSku'])]);
    }
}