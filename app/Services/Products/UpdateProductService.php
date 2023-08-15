<?php
namespace App\Services\Products;

use App\Models\Product;

class UpdateProductService {

  public function execute($id, $name, $description, $image_url) {
    $product = Product::where('id', $id)->first();

    $product->name = $name;
    $product->description = $description;
    $product->image_url = $image_url;

    $product->save();

    return $product->id;
  }
  
}