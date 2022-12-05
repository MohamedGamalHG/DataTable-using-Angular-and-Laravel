<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{

    public function index()
    {
        //return Company::select('*')->get();
        if(request()->ajax())
        {
            $data = Company::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
//                ->addColumn('action','company-action')
//                ->rowColumns(['actions'])

                ->make(true);
        }

        return view('companies');
    }

    public function store(Request $request)
    {

        $companyId = $request->id;

        $company   =   Company::updateOrCreate(
            [
                'id' => $companyId
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address
            ]);

        return Response()->json($company);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Company::where($where)->first();

        return Response()->json($company);
    }



    public function destroy(Request $request)
    {
        $company = Company::where('id',$request->id)->delete();

        return Response()->json($company);
    }








    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Product::select('id','title','price')->get();

    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             // ->addColumn('contractor', function ($row) {
    //             //     $x = $row->contractor->first_name . ' ' . $row->contractor->last_name . ' (' . $row->contractor->company->name . ')';
    //             //     return $x;
    //             // })

    //        ->addColumn('action', function($row){
    //             $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
    //             //return $actionBtn;

    //             $x = '
    //             <a href="{{route(\'project.edit\',$row->id)}}">
    //             <i class="fas fa-cog"></i>
    //             </a>
    //             <form action="{{ route(\'project.destroy\',' . $row->id . ') }}" method="POST">
    //             '.csrf_field().'
    //             '.method_field("DELETE").'
    //             <button type="submit" class="btn btn-danger"
    //                 onclick="return confirm(\'Are You Sure Want to Delete?\')"
    //                 style="padding: .0em !important;font-size: xx-small;">X</a>
    //             </form>
    //         ';
    //             return $x;

    //         })

    //         ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('Admin.product');

    // }

    // public function getData()
    // {
    //     $product = Product::select('id','title','price');
    //     return DataTables::of($product)->addIndexColumn()->make(true);
    // }


    // public function getStudents(Request $request)
    // {

    //     if ($request->ajax()) {
    //         $data = User::latest()->get();

    //         return Datatables::of($data)
    //             ->addIndexColumn()

    //        ->addColumn('action', function($row){
    //             $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
    //             return $actionBtn;
    //         })

    //         ->rawColumns(['action'])
    //             ->make(true);
    //     }
    // }





   /* public function index(Request $request)
    {
        //return $request;
        if ($request->ajax()) {
            $data = Category::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()

           ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })

            ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.category');

    }

    public function getData()
    {
        $category = Category::select('name');
        return DataTables::of($category)
        ->make(true);

    }

    public function getStudents()
    {

    }*/

}
