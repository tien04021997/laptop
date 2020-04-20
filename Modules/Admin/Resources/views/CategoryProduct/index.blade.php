@extends('admin::layouts.master')
@section('title','Danh mục sản phẩm');
@section('content')
    <div class="container-fluid">
        <div class="text-general clearfix">
            <div class="text-general-title pull-left">
                <h3>Danh mục sản phẩm</h3>
            </div>
            <div class="text-general-list pull-right">
                <ul>
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh mục sản phẩm</li>
                </ul>
            </div>
        </div>

        <div class="list-option-data">
            <ul>
                <li>
                    <a href="{{ route('admin.get.create.CategoryProduct') }}">
                        <i class="fa fa-plus"></i> Thêm mới
                    </a>
                </li>
            </ul>
        </div>
        <div class="list-data">
            <div class="list-data-table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Avatar</th>
                            <th>Nổi bật</th>
                            <th>Trạng thái</th>
                            <th width="10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($categoryProduct))
                        <?php $i = 1 ?>
                        @foreach($categoryProduct as $key=>$value)

                            <tr>
                                <td>{{ ($i) }}</td>
                                <td>{{ $value->name }}</td>
                                <td><img src="{{ isset($value->avatar) ? asset($value->avatar) : '' }}" style="width: 60px; height: 60px; object-fit: cover;"/></td>
                                <td>{{ $value->status }}</td>
                                <td>{{ $value->active }}</td>
                                <td>
                                    <p>
                                        <a href="{{ route('admin.get.update.CategoryProduct', $value->id) }}" title="Sửa">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </p>
                                    <p>
                                        <a href="{{ route('admin.get.action.CategoryProduct', ['delete', $value->id]) }}" title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </p>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="pagination-page">
                {{ $categoryProduct -> links() }}
            </div>
        </div>
    </div>
@endsection