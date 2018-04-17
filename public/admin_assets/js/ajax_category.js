	

/*function slug(title, separator) {
	if(typeof separator == 'undefined') separator = '-';

	// Convert all dashes/underscores into separator
	var flip = separator == '-' ? '_' : '-';
	title = title.replace(flip, separator);

	// Remove all characters that are not the separator, letters, numbers, or whitespace.
	title = title.toLowerCase()
			.replace(new RegExp('[^a-z0-9' + separator + '\\s]', 'g'), '');

	// Replace all separator characters and whitespace by a single separator
	title = title.replace(new RegExp('[' + separator + '\\s]+', 'g'), separator);

	return title.replace(new RegExp('^[' + separator + '\\s]+|[' + separator + '\\s]+$', 'g'),'');
}*/
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
			console.log(url);
			$.ajax({
				type: 'post',
				url: url,
				data: {
					name: $('#name').val(),
					slug: slug($('#name').val()),
				},
				success: function (response) {
					$('#add').modal('hide');
					toastr.success('Thành công!');
					$('#table-body').append('<tr id="category-row-'+response.id+'"><td>'+response.id+'</td><td id="category-name-'+response.id+'">'+response.name+'</td> <td>'+response.created_at+'</td> <td>'+response.updated_at+'</td> <td><button type="button" class="btn btn-xs btn-info" data-id="'+response.id+'"><i class="fa fa-plus" aria-hidden="true"></i></button> <button type="button" class="btn btn-xs btn-warning"  data-url="http://tungdeptrai.org/admin/categories/'+response.id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button> <button type="button" class="btn btn-xs btn-danger" data-id="'+response.id+'" data-url="http://tungdeptrai.org/admin/categories/'+response.id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td> </tr>');
				},
				error: function (error) {
					
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
					name: $('#category-edit-name').val(),
					slug: slug($('#category-edit-name').val()),
				},
				success: function (response) {
					//console.log(response);
					$('#edit').modal('hide');
					
					$('#category-name-'+id).text(response.data.name);
					//$('#product-price-'+id).text(response.data.price+" $");
					toastr.success('Đã lưu thay đổi');
					//toastr.success('Thành công!');
					//$('#table-body').append('<tr><td>'+response.id+'</td><td>'+response.name+'</td> <td>'+response.price+' $</td> <td>'+response.created_at+'</td> <td>'+response.updated_at+'</td> <td> <button type="button" class="btn btn-xs btn-info" data-id="'+response.id+'">Show</button> <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" href="#edit-'+response.id+'">Edit</button>  </td> </tr>');
				},
				error: function (error) {
					
				}
			})
		});

		$(document).on('click','.btn-info',function () {
			$('#show').modal('show');
			var url=$(this).data('url');
			console.log(url);
			$.ajax({
				type: 'get',
				url: url,

				success: function (response) {
					$("#detail-table-body").empty();
					response.forEach(function (item, index) {
						//alert('ok');
						var status = (item.status == 1) ? "public" : "private";
						$('#detail-table-body').append('<tr><td>'+(index+1)+'</td><td>'+item.title+'</td><td>'+status+'</td><td>'+item.created_at+'</td><td>'+item.updated_at+'</td></tr>');
					})
					/*$('#post-id').text(response.id);
					$('#post-name').text(response.name);
					$('#post-price').text(response.price+" $");
					$('#post-created-at').text(response.created_at);
					$('#post-updated-at').text(response.updated_at);*/
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

					$('#category-edit-name').val(response.name);
					//$('#edit-submit').data("id", response.id);
					$('#edit-submit').attr("data-url", "/admin/categories/"+response.id);
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
						$('#category-row-'+id).hide();
					},
					error: function (error) {
						
					}
				})
            }*/
            swal({
				  title: "Are you sure?",
				  text: "Once deleted, you will not be able to recover this category!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal("Poof! Your category has been deleted!", {
				      icon: "success",
				    });
					var url=$(this).data('url');
					var id=$(this).data('id');
					$.ajax({
						type: 'delete',
						url: url,

						success: function (response) {
							//console.log(response);
							//toastr.error('Đã xóa sản phẩm');
							$('#category-row-'+id).hide();
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
