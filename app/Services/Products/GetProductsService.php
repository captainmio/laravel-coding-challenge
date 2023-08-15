<?php
namespace App\Services\Products;

use App\Models\Product;

class GetProductsService {

  public function execute() {
    return Product::simplePaginate(15);
  }
  
}