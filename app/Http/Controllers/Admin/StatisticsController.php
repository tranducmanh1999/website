<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Products;
use App\Model\Admin\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductService;

class StatisticsController extends Controller
{
    public function __construct(Transaction $transaction,Products $products,User $user,ProductService $productService)
    {
        $this->Transaction = $transaction;
        $this->Products  = $products;
        $this->User = $user;
        $this->productService = $productService;
    }

    public function index($year) {
        $arResult = [
            'year'  => $this->Transaction->year(),
            'chart' => json_encode($this->Transaction->charts($year)),
            'product' => json_encode($this->productService->getChart()),
            'user' => $this->User->getStatis()
        ];
        
        return view('admin.statistics.index',compact('arResult','year'));
    }
}
