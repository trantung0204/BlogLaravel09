@extends('admin/layouts/master')
@section('content')
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">All categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="category-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="table-body">

                @foreach ($categories as $category)
                <tr id="category-row-{{ $category->id }}">
                  <td>{{ $category->id }}</td>
                  <td id="category-name-{{ $category->id }}">{{ $category->name }}</td>
                  <td>{{ $category->created_at->diffForHumans() }}</td>
                  <td>{{ $category->updated_at->diffForHumans() }}</td>
                  <td>
                    <button type="button" class="btn btn-xs btn-info" data-id="{{ $category->id }}" data-url="{{route("categories.getposts", $category->id)  }}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-xs btn-warning" data-url="{{route("categories.show", $category->id)  }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-xs btn-danger" data-id="{{ $category->id }}" data-url="{{route("categories.destroy", $category->id)  }}""><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              <a class="btn btn-success" data-toggle="modal" href='#add' >Thêm danh mục mới</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

 

  <div class="modal fade" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Thêm mới danh mục</h4>
        </div>
        <div class="modal-body">
        <form id="add-new"  method="category" role="form"  data-url='{{route("categories.store")}}' enctype="multipart/form-data">
          {{csrf_field()}}<!-- sinh token -->
          <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" id="name" class="form-control" placeholder="category name" required="true">
          </div>
        
          
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="show">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Danh sách bài viết</h4>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                </tr>
              </thead>
              <tbody id="detail-table-body">

              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Cập nhật thông tin</h4>
        </div>
        <div class="modal-body">
          <form id="edit-form" method="POST" role="form">
            {{csrf_field()}} <!-- sinh token -->
            {{method_field('put')}}
            <div class="form-group">
              <label for="">Tên sản phẩm</label>
              <input name="name" type="text" class="form-control"  placeholder="Input field" id="category-edit-name" value="">
            </div>
        </div>
        <div class="modal-footer">
          <button id="edit-submit" type="submit" class="btn btn-xs btn-primary">Submit</button>
          </form>
          <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('js')
  <script src="{{ asset('admin_assets/js/ajax_category.js') }}"></script>
@endsection