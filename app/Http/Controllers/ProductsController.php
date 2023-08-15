<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\Products\GetProductService;
use App\Services\Products\GetProductsService;
use App\Services\Products\StoreProductService;
use App\Services\Products\DeleteProductService;
use App\Services\Products\UpdateProductService;

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

    public function index(GetProductsService $getProductsService) {
      $data = $getProductsService->execute();

      return response()->json(['success' => true, 'data' => $data]);
    }

    public function update($id, UpdateProductRequest $request, UpdateProductService $updateProductService, GetProductService $getProductService) {

      if($request->validated()) {

        $id = $updateProductService->execute($id, $request->name, $request->description, $request->image_url);
        
        // fetch newly added data
        $data = $getProductService->execute($id);

        $return = response()->json(['success' => true, 'data' => $data]);

      } else {
        $return = response()->json(['success' => false, 'error_message' => 'Please fill-in necessary details']);
      }
      

      return $return;
    }

    public function destroy($id, DeleteProductService $deleteProductService) {
      $deleteProductService->execute($id);

      return response()->json(['success' => true]);
    }
}
