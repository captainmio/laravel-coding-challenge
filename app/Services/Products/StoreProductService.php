<?php
namespace App\Services\Products;

use App\Models\Product;

class StoreProductService {

  public function execute($name, $description, $image_url) {
    $product = new Product();
    $product->name = $name;
    $product->description = $description;
    $product->image_url = $image_url;

    $product->save();
    return $product->id;
  }
  
}