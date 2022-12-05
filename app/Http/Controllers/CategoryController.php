<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        //return $request;
        if ($request->ajax()) {
            $data = Category::select('*');

            return Datatables::of($data)
                ->addIndexColumn()

           ->addColumn('action', function($row){
                $actionBtn = '<a href="'.route('category.edit',$row->id).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.route('category.delete',$row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })

            ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.category');

    }

    public function edit($id)
    {
        $cat = Category::find($id);
        return view('Admin.edit',compact('cat'));
    }
    public function update()
    {

    }
    public function delete($id)
    {
       $del = Category::find($id);
       if($del)
           $del->delete();
       return redirect()->route('category.index');
    }
    public function getData()
    {
        $category = Category::select('name');
        return DataTables::of($category)
        ->make(true);

    }

    public function getStudents()
    {

    }

}
