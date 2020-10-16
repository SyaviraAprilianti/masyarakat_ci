$(document).ready(function () {
	listUsers();
	$('#listUserTable').dataTable({
		"bPaginate": false,
		"bInfo": false,
		"bFilter": false,
		"bLengthChange": false,
		"pageLength": 5
	});
	// list all user in datatable
	function listUsers() {
		$.ajax({
			type: 'ajax',
			url: 'tampilkanData',
			async: false,
			dataType: 'json',
			success: function (data) {
				var html = '';
				var i;
				var id = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr id="' + data[i].id + '">' +
						'<td>' + id++ + '</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td>' + data[i].username + '</td>' +
						'<td>' + data[i].level + '</td>' +
						'<td style="text-align:right;">' +
						'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="' + data[i].id + '" data-nama="' + data[i].nama + '" data-username="' + data[i].username + '"data-level="' + data[i].level + '">Edit</a>' + ' ' +
						'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="' + data[i].id + '">Delete</a>' +
						'</td>' +
						'</tr>';
				}
				$('#listUser').html(html);
			}

		});
	}
	// save new user record
	$('#saveUserForm').submit('click', function () {
		var pnama = $('#nama').val();
		var pusername = $('#username').val();
		var ppassword = $('#password').val();
		var plevel = $('#level').val();
		$.ajax({
			type: "POST",
			url: "simpanData",
			dataType: "JSON",
			data: {
				nama: pnama,
				username: pusername,
				password: ppassword,
				level: plevel
			},
			success: function (data) {
				swal({
					type: 'success',
					title: 'Add Petugas',
					text: 'Anda Berhasil Menamabah Petugas'
				})
				$('#nama').val("");
				$('#username').val("");
				$('#password').val("");
				$('#level').val("");
				$('#addUserModal').modal('hide');
				listUsers();
			}
		});
		return false;
	});

	// show edit modal form with user data
	$('#listUser').on('click', '.editRecord', function () {
		$('#editUserModal').modal('show');
		$("#Id").val($(this).data('id'));
		$("#namaEdit").val($(this).data('nama'));
		$("#usernameEdit").val($(this).data('username'));
		$("#levelEdit").val($(this).data('level'));
	});
	// save edit record
	$('#editUserForm').on('submit', function () {
		var id = $('#Id').val();
		var nama = $('#namaEdit').val();
		var username = $('#usernameEdit').val();
		var level = $('#levelEdit').val();
		$.ajax({
			type: "POST",
			url: "updateDataajax",
			dataType: "JSON",
			data: {
				id: id,
				nama: nama,
				username: username,
				level: level
			},
			success: function (data) {
				swal({
					type: 'success',
					title: 'Update Petugas',
					text: 'Anda Berhasil MengUpdate Petugas'
				})
				$("#Id").val("");
				$("#namaEdit").val("");
				$('#usernameEdit').val("");
				$('#levelEdit').val("");
				$('#editUserModal').modal('hide');
				listUsers();
			}
		});
		return false;
	});
	// delete petugas
	$('#listUser').on('click', '.deleteRecord', function () {
		var Id = $(this).data('id');
		$('#deleteUser').modal('show');
		$('#Id').val(Id);
	});
	// delete user record
	$('#deleteUserForm').on('submit', function () {
		var Id = $('#Id').val();
		$.ajax({
			type: "POST",
			url: "hapusDataajax",
			dataType: "JSON",
			data: {
				id: Id
			},
			success: function (data) {
				swal({
					type: 'success',
					title: 'Delete Petugas',
					text: 'Anda Berhasil menghapus Petugas'
				})
				$("#" + Id).remove();
				$('#Id').val("");
				$('#deleteUser').modal('hide');
				listUsers();
			}
		});
		return false;
	});
});
// $(id).on('click', '.deleteRecord', function () {
// 	var id = $(this).attr("id");
// 	swal({
// 		title: 'Konfirmasi',
// 		text: "Apakah anda yakin ingin menghapus ",
// 		type: 'warning',
// 		showCancelButton: true,
// 		confirmButtonText: 'Hapus',
// 		confirmButtonColor: '#d33',
// 		cancelButtonColor: '#3085d6',
// 		cancelButtonText: 'Tidak',
// 		reverseButtons: true
// 	}).then((result) => {
// 		if (result.value) {
// 			$.ajax({
// 				url: "<?= base_url('pir/hapusdataajax') ?>",
// 				type: "post",
// 				beforeSend: function () {
// 					swal({
// 						title: 'Menunggu',
// 						html: 'Memproses data',
// 						onOpen: () => {
// 							swal.showLoading()
// 						}
// 					})
// 				},
// 				data: {
// 					id: id
// 				},
// 				success: function (data) {
// 					swal(
// 						'Hapus',
// 						'Berhasil Terhapus',
// 						'success'
// 					)
// 					listUser.ajax.reload(null, false)
// 				}
// 			});
// 		} else if (result.dismiss === swal.DismissReason.cancel) {
// 			swal(
// 				'Batal',
// 				'Anda membatalkan penghapusan',
// 				'error'
// 			)
// 		};
// 	});
// });
