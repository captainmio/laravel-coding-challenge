<?php
namespace App\Services\Products;

use App\Models\Product;

class GetProductService {

  public function execute($id) {
    return Product::where('id', $id)->first();
  }
  
}