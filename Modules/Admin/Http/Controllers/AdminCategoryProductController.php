<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategoryProduct;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


class AdminCategoryProductController extends Controller
{

    public function index(Request $request)
    {
        $categoryProduct = CategoryProduct::select('id', 'name', 'avatar', 'active', 'status')->get();
        /* Tìm kiếm danh mục sản phẩm */
        $categoryProduct = CategoryProduct::orderByDesc('id')->paginate(15);
        if ($request->name) $categoryProduct->where('name','like','%'.$request->name.'%');

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
        return redirect()->back()->with('success','Thêm thành công');
    }

    public function edit($id)
    {
        $categoryProduct = CategoryProduct::find($id);
        return view('admin::CategoryProduct.update', compact('categoryProduct'));

    }

    public function update(RequestCategoryProduct $requestCategoryProduct, $id)
    {
        $this->insertOrUpdate($requestCategoryProduct, $id);
        return redirect()->back()->with('success-update','Cập nhật thành công');
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

    public function delete($id)
    {
        $categoryProduct = CategoryProduct::find($id);
        $categoryProduct->delete();
        return redirect()->back()->with('notification-delete','Xóa bản ghi thành công');
    }

    public function action($action, $id)
    {
        if ($action){
            $categoryProduct = CategoryProduct::find($id);
            switch ($action){
                case 'active':
                    $categoryProduct->active = $categoryProduct->active ? 0 : 1;
                    $categoryProduct->save();
                    break;

                case 'status':
                    $categoryProduct->status = $categoryProduct->status ? 0 : 1;
                    $categoryProduct->save();
                    break;
            }
        }
        return redirect()->back();
    }

}
