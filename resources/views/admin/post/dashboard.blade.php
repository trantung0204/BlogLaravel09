@extends('admin/layouts/master')
@section('content')
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Posts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="post-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="table-body">

                @foreach ($posts as $post)
                <tr id="post-row-{{ $post->id }}">
                  <td>{{ $post->id }}</td>
                  <td><img style="width: 70px;" class="center-block img-rounded img-thumbnail img-responsive" src="{{ $post->thumbnail }}" alt=""></td>
                  <td id="post-title-{{ $post->id }}">{{ $post->title }}</td>
                  <td>{{ $post->created_at->diffForHumans() }}</td>
                  <td>@if ($post->status==1)
                    public
                  @else
                    private
                  @endif
                  </td>
                  <td>{{ $post->category->name }}</td>
                  <td>{{ $post->user->name }}</td>
                  <td>
                    <button type="button" class="btn btn-xs btn-info" data-url="{{route("posts.show", $post->id)  }}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-xs btn-warning" data-url="{{route("posts.show", $post->id)  }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-xs btn-danger" data-id="{{ $post->id }}" data-url="{{route("posts.destroy", $post->id)  }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              <a class="btn btn-success" data-toggle="modal" href='#add' >Thêm bài viết mới</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

 

  <div class="modal fade" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Thêm mới bài viết</h4>
        </div>
        <div class="modal-body">
        <form id="add-new"  method="POST" role="form"  data-url='{{route("posts.store")}}' >
          {{csrf_field()}}<!-- sinh token -->
          <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" id="title" class="form-control" placeholder="Post title" required="true">
          </div>
          <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input name="thumbnail" type="file" id="thumbnail" class="form-control" placeholder="Input field" required="true">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required="required"></textarea>
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="editor_content"></textarea>
          </div>
          <div class="form-group">
            <label for="category_id">Category id</label>
            <!-- <input name="category_id" type="text" id="category_id" class="form-control" placeholder="Post title" required="true"> -->
            <select name="category_id" id="category_id" class="form-control" required="required">
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Sửa bài viết</h4>
        </div>
        <div class="modal-body">
        <form id="edit-form"  method="POST" role="form" >
          {{csrf_field()}}<!-- sinh token -->
          <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" id="post-edit-title" class="form-control" placeholder="Post title" required="true" value="">
          </div>
          <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input name="thumbnail" type="file" id="post-edit-thumbnail" class="form-control" placeholder="Input field" value="">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="post-edit-description" class="form-control" rows="3" required="required"></textarea value="">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="post_edit_content"></textarea>
          </div>
          <div class="form-group">
            <label for="category_id">Category id</label>
            <!-- <input name="category_id" type="text" id="category_id" class="form-control" placeholder="Post title" required="true"> -->
            <select name="category_id" id="post-edit-category_id" class="form-control" required="required">
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        
          
        </div>
        <div class="modal-footer">
          <button id="edit-submit"  type="submit" class="btn btn-primary">Submit</button>
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
          <h4 class="modal-title" id="title-detail"></h4>
        </div>
        <div class="modal-body">
          <div class="col-md-8">
            <img id="thumbnail-detail"  class="col-md-6 col-md-offset-3 center-block  img-responsive"  src="" alt="">
          </div>
          <div style="margin: 20px 15px; font-weight: bold" id="description-detail" >
            
          </div>
          <div style="margin: 20px 15px;" id="content-detail" >
            
          </div>
          <small style="float: right;" id="date-detail"></small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
<script src="{{ asset('admin_assets/js/ajax_post.js') }}"></script>
<script>
  
  CKEDITOR.replace( 'editor_content' );
  CKEDITOR.replace( 'post_edit_content' );
  //CKEDITOR.replace( 'econtent' );
  CKEDITOR.editorConfig = function( config ) {
        // Define changes to default configuration here. For example:
        // config.language = 'fr';
        // config.uiColor = '#AADC6E';
        config.width = '400px';

      };
</script>
@endsection