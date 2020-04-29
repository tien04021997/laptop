<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategoryNews;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminCategoryNewsController extends Controller
{

    public function index()
    {
        return view('admin::CategoryNews.index');
    }

    public function create()
    {
        return view('admin::CategoryNews.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();
        $check = CategoryNews::insert($data);
        $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
        if($check){
            $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
        }
        return Response()->json($arr);
    }

}
