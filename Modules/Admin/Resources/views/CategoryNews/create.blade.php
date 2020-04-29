@extends('admin::layouts.master')
@section('title','Thêm mới danh mục tin tức');
@section('content')
    <div class="container-fluid">
        <div class="text-general clearfix">
            <div class="text-general-title pull-left">
                <h3>Danh mục tin tức</h3>
            </div>
            <div class="text-general-list pull-right">
                <ul>
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.get.create.CategoryNews') }}">Danh sách</a></li>
                    <li class="breadcrumb-item active">Danh mục tin tức</li>
                </ul>
            </div>
        </div>

        <div class="form-add">
            @include('admin::CategoryNews.form')
        </div>
    </div>
@endsection
