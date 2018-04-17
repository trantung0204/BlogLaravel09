	

function slug(title)
{
    var slug;
 
    //Lấy text từ thẻ input title 
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    //document.getElementById('slug').value = slug;
    return slug;
}


	$(function () {
		/*$('.btn-info').click(function () {
			$('#show').modal('show');
		})*/
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('#add-new').on('submit',function (e) {
			e.preventDefault();
			var url = $(this).attr('data-url');
			var thumbnail = $('#thumbnail').get(0).files[0];
			var content= CKEDITOR.instances.editor_content.getData();
			var newPost = new FormData();
			newPost.append('title',$('#title').val());
	        newPost.append('thumbnail',thumbnail);
	        newPost.append('description',$('#description').val());
	        newPost.append('content',content);
	        newPost.append('slug',slug($('#title').val()));
	        //newPost.append('user_id',$('#user_id').val());
	        newPost.append('category_id',$('#category_id').val());
	        //newPost.append('tags',$('#tags').val());
			$.ajax({
				type: 'post',
				url: url,
				data:newPost,
	            dataType:'json',
	            async:false,
	            processData: false,
	            contentType: false,
				success: function (response) {
					$('#add').modal('hide');
					toastr.success('Thành công!');
					console.log(response.thumbnail);
					$('#table-body').prepend('<tr id="post-row-'+response.id+'"><td>'+response.id+'</td><td><img style="width: 70px;" class="center-block img-rounded img-thumbnail img-responsive" src="'+response.thumbnail+'" alt=""></td><td id="post-title-'+response.id+'">'+response.title+'</td><td>just now</td><td>public</td><td>'+response.category_id+'</td><td>'+response.user_id+'</td><td><button type="button" class="btn btn-xs btn-info" data-url="tungdeptrai.org/adimn/post/'+response.id+'"><i class="fa fa-eye" aria-hidden="true"></i></button><button type="button" class="btn btn-xs btn-warning" data-url="tungdeptrai.org/posts/'+response.id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-xs btn-danger" data-id="'+response.id+'" data-url="tungdeptrai.org/posts/'+response.id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
				},
				error: function (xhr, ajaxOptions, thrownError) {
		            console.log(xhr);
		            toastr.error(xhr.responseJSON.message);
				}
			})
		});

		$('#edit-form').on('submit',function (e) {
			e.preventDefault();
			var url=$('#edit-submit').data('url');
			var id=$('#edit-submit').data('id');
			$.ajax({
				type: 'put',
				url: url,
				data: {
					name: $('#product-edit-name').val(),
					price: $('#product-edit-price').val()
				},
				success: function (response) {
					//console.log(response);
					$('#edit').modal('hide');
					
					$('#product-name-'+id).text(response.data.name);
					$('#product-price-'+id).text(response.data.price+" $");
					toastr.success('Đã lưu thay đổi');
					//toastr.success('Thành công!');
					$('#table-body').append('<tr><td>'+response.id+'</td><td>'+response.name+'</td> <td>'+response.price+' $</td> <td>'+response.created_at+'</td> <td>'+response.updated_at+'</td> <td> <button type="button" class="btn btn-xs btn-info" data-id="'+response.id+'">Show</button> <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" href="#edit-'+response.id+'">Edit</button>  </td> </tr>');
				},
				error: function (error) {
					
				}
			})
		});

		$(document).on('click','.btn-info',function () {
			$('#show').modal('show');
			var url=$(this).data('url');
			//console.log(url);
			$.ajax({
				type: 'get',
				url: url,

				success: function (response) {
					$('#title-detail').text(response.title);
					$('#thumbnail-detail').attr('src',response.thumbnail);
					$('#content-detail').html(response.content);
					$('#description-detail').text(response.description);
					$('#date-detail').html(response.created_at);
				},
				error: function (error) {
					
				}
			})
		})

		$(document).on('click','.btn-warning',function () {
			$('#edit').modal('show');
			var url=$(this).data('url');
			//alert(id);
			$.ajax({
				type: 'get',
				url: url,

				success: function (response) {
					$('#user-edit-title').val(response.title);

					CKEDITOR.instances.post_edit_content.getData(response.content);
					$('#user-edit-description').val(response.description);
					$('#user-edit-category_id').val(response.category_id);
					//$('#edit-submit').data("id", response.id);
					$('#edit-submit').attr("data-url", "/admin/products/"+response.id);
					$('#edit-submit').attr("data-id",response.id);
				},
				error: function (error) {
					
				}
			})
		})

		$(document).on('click','.btn-danger',function () {
			/*if (confirm("Bạn có muốn xóa ?")) {
				var url=$(this).data('url');
				var id=$(this).data('id');
				$.ajax({
					type: 'delete',
					url: url,

					success: function (response) {
						//console.log(response);
						toastr.error('Đã xóa sản phẩm');
						$('#product-row-'+id).hide();
					},
					error: function (error) {
						
					}
				})
            }*/
            swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this post!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    swal("Poof! Your post has been deleted!", {
			      icon: "success",
			    });
				var url=$(this).data('url');
				var id=$(this).data('id');
				$.ajax({
					type: 'delete',
					url: url,

					success: function (response) {
						//console.log(response);
						toastr.error('Đã xóa sản phẩm');
						$('#post-row-'+id).hide();
					},
					error: function (error) {
						
					}
				})
			  } else {
			    swal("Your imaginary file is safe!");
			  }
			});
		})
	});
