@extends('admin/layouts/master')
@section('content')
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">All guest user</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="guest-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="table-body">

                @foreach ($guests as $guest)
                <tr id="guest-row-{{ $guest->id }}">
                  <td>{{ $guest->id }}</td>
                  <td id="guest-name-{{ $guest->id }}">{{ $guest->name }}</td>
                  <td id="guest-email-{{ $guest->id }}">{{ $guest->email }}</td>
                  <td>{{ $guest->created_at->diffForHumans() }}</td>
                  <td>{{ $guest->updated_at->diffForHumans() }}</td>
                  <td>
                    <button type="button" class="btn btn-xs btn-info" data-id="{{ $guest->id }}" data-url="{{route("guests.show", $guest->id)  }}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-xs btn-warning" data-url="{{route("guests.show", $guest->id)  }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-xs btn-danger" data-id="{{ $guest->id }}" data-url="{{route("guests.destroy", $guest->id)  }}""><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              <a class="btn btn-success" data-toggle="modal" href='#add' >Thêm tài khoản</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

 

  <div class="modal fade" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Thêm mới tài khoản</h4>
        </div>
        <div class="modal-body">
        <form id="add-new"  method="guest" role="form"  data-url='{{route("guests.store")}}' enctype="multipart/form-data">
          {{csrf_field()}}<!-- sinh token -->
          <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" id="add-name" class="form-control" placeholder="guest name" required="true">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" id="add-email" class="form-control" placeholder="guest email" required="true">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" id="add-password" class="form-control" placeholder="password" required="true">
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
          <h4 class="modal-title">Thông tin tài khoản</h4>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Name</th>
                  <td id="name-detail"></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td id="email-detail"></td>
                </tr>
                <tr>
                  <th>Created at</th>
                  <td id="created_at-detail"></td>
                </tr>
                <tr>
                  <th>Updated at</th>
                  <td id="updated_at-detail"></td>
                </tr>
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
              <label for="">Tên người dùng</label>
              <input name="name" type="text" class="form-control"  placeholder="Input field" id="guest-edit-name" value="">
            </div>
            <div class="form-group">
              <label for="">Email người dùng</label>
              <input name="email" type="email" class="form-control"  placeholder="Input field" id="guest-edit-email" value="">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input name="password" type="password" class="form-control"  placeholder="Input field" id="guest-edit-password" value="">
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
  <script src="{{ asset('admin_assets/js/ajax_guest.js') }}"></script>
@endsection