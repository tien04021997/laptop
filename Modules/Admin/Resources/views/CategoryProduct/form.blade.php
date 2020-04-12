<form action="" method="POST" id="myDiv">
    @csrf
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" class="form-control" name="name" value="">
        @if($errors->has('name'))
            <span class="error-text">
                {{$errors->first('name')}}
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="name">Icon:</label>
        <input type="text" class="form-control" name="icon" value="">
        @if($errors->has('icon'))
            <span class="error-text">
                {{$errors->first('icon')}}
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="name">Title Seo:</label>
        <input type="text" class="form-control" name="title_seo" value="">
    </div>

    <div class="form-group">
        <label for="name">Description Seo:</label>
        <input type="text" class="form-control" name="description_seo" value="">
    </div>

    <div class="list-button">
        <button type="submit" class="btn btn-success btnSubmit">
            <i class="fa fa-check"></i> Cập nhật
        </button>
    </div>

</form>
