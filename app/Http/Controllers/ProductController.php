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

        return view('Admin.product');

    }

    public function getData()
    {
        $product = Product::select('id','title','price');
        return DataTables::of($product)->addIndexColumn()->make(true);
    }


    public function getStudents(Request $request)
    {

        if ($request->ajax()) {
            $data = User::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()

           ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })

            ->rawColumns(['action'])
                ->make(true);
        }
    }

}
