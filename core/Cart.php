<?php 

class Cart {
    private $totalPrice;
    private $quantity;
    private $products = [];

    public function setProducts($productsId,$quantity){
        $this->products[$productsId] = $quantity;
    }


    public function getQuantity($productsId){
        return $this->products[$productsId];
    }

    public function getProduct($productsId){
    
        $productInfo = Product::findProduct($productsId);
        return  $productInfo;
    }

    public function calculatorOrder(){
        $totalPrice = 0 ;
        foreach($this->products as $productId => $quantity) {
            $productInfo = Product::findProduct($productId);
            $totalPrice += $productInfo['price'] * $quantity;
        }
        $this->totalPrice = $totalPrice;
        return $this->totalPrice;
    }
  
}