<?php

namespace App\Http\Controllers\Shoes;

use App\Model\Admin\Products;
use App\Model\Admin\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\ProductService;

class RatingController extends Controller
{
    public function __construct(Rating $rating,Products $products,ProductService $productService)
    {
        $this->Rating = $rating;
        $this->Product = $products;
        $this->productService = $productService;
    }

    public function rating($id) {
        if ( Request()->ajax() ) {
            $arAdd = [
                'rating' => Request()->get('rating'),
                'comment' => Request()->get('content'),
                'id_product' => $id,
                'id_user' => Auth::id()
            ];
            $result = $this->Rating->add($arAdd);
            if ( $result==1 ) {
                $arObject = $this->Rating->getRating($id);
                $totalRating = $this->Rating->totalRating($id);
                $update = $this->productServic->updateRating($id,$totalRating);
                $html = view('shoes.page.form_rating',compact('arObject'));
                return $html;
            }else {
                return 0;
            }
        }
    }
}
