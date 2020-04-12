<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategoryProduct;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminCategoryProductController extends Controller
{

    public function index()
    {
        return view('admin::CategoryProduct.index');
    }

    public function create()
    {
        return view('admin::CategoryProduct.create');
    }

    public function store(RequestCategoryProduct $requestCategoryProduct)
    {
        $this->insertOrUpdate($requestCategoryProduct);
        return redirect()->back();
    }

    public function insertOrUpdate(RequestCategoryProduct $requestCategoryProduct, $id='')
    {
        $code = 1;
        try{
            $categoryProduct = new CategoryProduct();

            if ($id){
                $categoryProduct = CategoryProduct::find($id);
            }

            $categoryProduct->name = $requestCategoryProduct->name;
            $categoryProduct->slug = str_slug($requestCategoryProduct->name);
            $categoryProduct->icon = $requestCategoryProduct->icon;
            $categoryProduct->title_seo = $requestCategoryProduct->title_seo ? $requestCategoryProduct->title_seo : $requestCategoryProduct->name;
            $categoryProduct->description_seo = $requestCategoryProduct->description_seo;
            $categoryProduct->save();
        }
        catch (\Exception $exception)
        {
            $code = 0;
            Log::error("[ Error insertOrUpdate Categories ]".$exception->getMessage());
        }

        return $code;
    }

}
