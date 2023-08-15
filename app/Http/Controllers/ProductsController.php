<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\Products\GetProductService;
use App\Services\Products\StoreProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(StoreProductRequest $request, StoreProductService $storeProductService, GetProductService $getProductService) {
      if($request->validated()) {

        $id = $storeProductService->execute($request->name, $request->description, $request->image_url);

        // fetch newly added data
        $data = $getProductService->execute($id);

        $return = response()->json(['success' => true, 'data' => $data]);
      } else {
        $return = response()->json(['success' => false, 'error_message' => 'Please fill-in necessary details']);
      }
      

      return $return;
    }

    public function show($id, GetProductService $getProductService) {
      $data = $getProductService->execute($id);

      return response()->json(['success' => true, 'data' => $data]);
    }

    public function index() {

    }
}
