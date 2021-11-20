<?php
namespace App\Services;
use App\Model\Admin\Products;
use App\Model\Admin\ProductSize;


class ProductService
{
    public function __construct(
        Products $products,
        ProductSize $product_size
    )
    {
        $this->product = $products;
        $this->proSize = $product_size; 
       
    }
   

    public function random() {
        return $this->product
        ->inRandomOrder()
        ->limit(3)
        ->get();
    }

    public function getProductNews() 
    {
        return $this->product
        ->join('categories as c','products.id_cat','c.id_cat')
            ->where('products.sale',0)
            ->limit(8)
            ->selectRaw('products.*,c.name_cat')
            ->orderBy('products.created_at','ASC')
            ->get();
    }

    public function getSale()
    {
        return $this->product
        ->join('categories as c','products.id_cat','c.id_cat')
            ->select('products.*','c.name_cat')
            ->where('sale','!=',0)
            ->limit(8)
            ->orderBy('sale','ASC')
            ->get();
    }
//---------------------
    public function getIdPro($id) {
        return $this->product
            ->where('id_product',$id)
            ->join('categories as c','products.id_cat','c.id_cat')
            ->select('products.*','c.name_cat')
            ->first();
    }


    public function getProD() {
        return $this->product
            ->join('categories as c','products.id_cat','c.id_cat')
            ->select('products.*','c.name_cat')
            ->where('products.id_cat',118)
            ->limit(8)
            ->orderBy('id_product','ASC')
            ->get();
    }
    public function getProductCat($id) {
        return $this->product
            ->join('categories as c','products.id_cat','c.id_cat')
            ->select('products.*','c.name_cat')
            ->where('products.id_cat',$id)
            ->orderBy('id_product','ASC')
            ->get();
    }
    public function getChart() {
        return $this->product
            ->orderBy('hot_pay','DESC')
            ->limit(10)
            ->select('name_product as name','hot_pay as y')
            ->get();
    }
    public function selling() {
        return $this->product
            ->orderBy('hot_pay','DESC')
            ->limit(10)
            ->get();
    }
    public function newProduct() {
        return $this->product
            ->orderBy('id_product','DESC')
            ->limit(10)
            ->get();
    }
    public function proSameType($object) {
        return $this->product
            ->where('id_cat',$object->id_cat)
            ->where('id_product','!=',$object->id_product)
            ->limit(4)
            ->get();
    }
    
    public function updateRating($id,$qty) {
        $object = $this->getId($id);
        $object->pro_rating = $qty;
        $object->update();
    }
    
    public function getAll() {
        $products = $this->product
            ->join('categories','products.id_cat','=','categories.id_cat')
            ->select('products.*','categories.name_cat')
            ->orderBy('id_product','DESC')
            ->get();
        foreach ($products as $item) {
            $item = $this->proSize
                ->join('size as s','product_size.id_size','s.id_size')
                ->where('product_size.id_product',$item->id_product)
                ->select('product_size.*','s.size')
                ->get();
        }
        return $products;
    }
    
    
}


