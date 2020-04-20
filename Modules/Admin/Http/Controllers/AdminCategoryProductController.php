<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategoryProduct;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use function Psy\debug;

class AdminCategoryProductController extends Controller
{

    public function index()
    {
        $categoryProduct = CategoryProduct::select('id', 'name', 'avatar', 'active', 'status')->orderByDesc('id')->get();
        $categoryProduct = CategoryProduct::paginate(15);
        $viewData = [
            'categoryProduct' => $categoryProduct,
        ];

        return view('admin::CategoryProduct.index', $viewData);
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

    public function edit($id)
    {
        $categoryProduct = CategoryProduct::find($id);
        return view('admin::CategoryProduct.update', compact('categoryProduct'));

    }

    public function update(RequestCategoryProduct $requestCategoryProduct, $id)
    {
        $this->insertOrUpdate($requestCategoryProduct, $id);
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

            // Điều kiện để kiểm tra tồn tại file
            if($requestCategoryProduct->hasFile('avatar'))
            {
                $file = upload_image('avatar');
//                dd($file);
                if (isset($file['path_img']))
                {
                    $categoryProduct->avatar = $file['path_img'];
                }
            }
            $categoryProduct->save();
        }
        catch (\Exception $exception)
        {
            $code = 0;
            Log::error("[ Error insertOrUpdate Categories ]".$exception->getMessage());
        }

        return $code;
    }

    public function action($action, $id)
    {
        if ($action){
            $categoryProduct = CategoryProduct::find($id);
            switch ($action){
                case 'delete':
                    $categoryProduct->delete();
                    break;
            }
        }
        return redirect()->back();
    }

}
