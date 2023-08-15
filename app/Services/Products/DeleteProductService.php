<?php
namespace App\Services\Products;

use App\Models\Product;

class DeleteProductService {

  public function execute($id) {
    return Product::where('id', $id)->delete();
  }
  
}