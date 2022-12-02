<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function index()
    {
        return view('Admin.category');

    }

    public function getData()
    {
        $category = Category::select('name');
        return DataTables::of($category)->make(true);

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
