<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return Product::select("id",'title','price','details')->get();
    }


    public function store(Request $request)
    {
       Product::create($request->post());
       return response()->json([
            'message' => 'item added'
       ]);
    }

    public function show(Product $product)
    {
        return response()->json([
            'product'  => $product
        ]);
    }

    public function update(Request $request,Product $product)
    {
        $product->fill($request->post())->update();
       return response()->json([
            'message' => 'item added'
       ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
       return response()->json([
            'message' => 'item delete'
       ]);
    }


}
