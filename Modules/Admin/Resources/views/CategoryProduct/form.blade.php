<form action="" method="POST" id="myDiv" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-9">
            <div class="form-left">
                <div class="frm-item">
                    <div class="frm-title">
                        <i class="fas fa-file"></i> Tên và mô tả danh mục
                    </div>
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', isset($categoryProduct->name) ? $categoryProduct->name : '') }}">
                        @if($errors->has('name'))
                            <span class="error-text">
                            {{$errors->first('name')}}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Icon:</label>
                        <input type="text" class="form-control" name="icon" value="{{ old('icon', isset($categoryProduct->icon) ? $categoryProduct->icon : '') }}">
                        @if($errors->has('icon'))
                            <span class="error-text">
                                {{$errors->first('icon')}}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Title Seo:</label>
                        <input type="text" class="form-control" name="title_seo" value="{{ old('title_seo', isset($categoryProduct->title_seo) ? $categoryProduct->title_seo : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Description Seo:</label>
                        <input type="text" class="form-control" name="description_seo" value="{{ old('description_seo', isset($categoryProduct->description_seo) ? $categoryProduct->description_seo : '') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="form-right">
                <div class="frm-item">
                    <div class="frm-title">
                        <i class="far fa-image"></i> Ảnh đại diện
                    </div>

                    <div class="form-group">
                        <label for="name">Ảnh đại diện:</label>
                        <input type="file" name="avatar" class="form-file form-control" id="input_img" value="{{ old('avatar', isset($categoryProduct->avatar) ? $categoryProduct->avatar : '') }}">
                    </div>

                    <div class="form-group">
                        <div class="image-form">
                            <img id="output_img" src="{{ isset($categoryProduct->avatar) ? asset(old('avatar', $categoryProduct->avatar)) : asset("images/image.png") }}"  alt=""/>
                        </div>
                    </div>
                </div>

                <div class="frm-item">
                    <div class="frm-title">
                        <i class="fas fa-cloud-upload-alt"></i> Đăng bài
                    </div>

                    <div class="list-button">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success btnSubmit">
                                    <i class="fa fa-check"></i> Cập nhật
                                </button>
                            </div>
                            <div class="col-6">
                                 <button type="" class="btn btn-success btnSync">
                                    <i class="fas fa-sync-alt"></i> Nhập lại
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
@section('script')
@stop
