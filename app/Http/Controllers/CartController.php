<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Models\ProductSku;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    // 利用 Laravel 的自动解析功能注入 CartService 类
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        // 用来预加载购物车里的商品和 SKU 信息
        $cartItems = $this->cartService->get();
        $addresses = $request->user()->addresses()->orderBy('last_used_at', 'desc')->get();

        return view('cart.index', ['cartItems' => $cartItems, 'addresses' => $addresses]);
    }

    public function add(AddCartRequest $request)
    {
        $skuId = $request->input('sku_id');
        $amount = $request->input('amount');

        $this->cartService->add($skuId, $amount);
        return [];
    }

    public function remove(ProductSku $sku)
    {
        $this->cartService->remove($sku->id);

        return [];
    }
}
