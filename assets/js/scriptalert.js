
const flashdata_tambah 			= $('.flash-data').data('flashdata_tambah');
const flashdata_vote 			= $('.flash-data').data('flashdata_vote');
const flashdata_hapus 			= $('.flash-data-hapus').data('flashdata_hapus');
const flashdata_ubah 			= $('.flash-data-ubah').data('flashdata_ubah');
const flashdata_gagal 			= $('.flash-data-gagal').data('flashdata_gagal');
const flashdata_alasan_gagal 	= $('.flash-data-gagal').data('flashdata_alasan_gagal');
const periode_active 			= $('.access_voting').data('voting');
const id_periode_active 		= $('.access_voting').data('id');
const logout 					= $('.flash-data').data('logout');
if (flashdata_hapus) {
	Swal.fire({
		title : 'Hapus '+ flashdata_hapus+' Berhasil',
		text : 'Berhasil menghapus data '+ flashdata_hapus,
		icon : 'success'
	});
}
if (flashdata_gagal) {
	Swal.fire({
		title : 'Gagal '+ flashdata_gagal,
		text : flashdata_alasan_gagal,
		icon : 'warning'
	});
}
if (flashdata_ubah) {
	Swal.fire({
		title : 'Ubah '+ flashdata_ubah+' Berhasil',
		text : 'Berhasil mengubah data '+ flashdata_ubah,
		icon : 'success'
	});
}
if (flashdata_vote) {
	Swal.fire({
		title : 'Voting Berhasil',
		text : flashdata_vote,
		icon : 'success'
	});
}
if (flashdata_tambah) {
	Swal.fire({
		title : 'Tambah ' + flashdata_tambah+' Berhasil',
		text : 'Berhasil menambah data '+ flashdata_tambah,
		icon : 'success'
	});
}
if (logout) {
	Swal.fire({
		title : 'Kamu Berhasil Keluar!',
		text : logout,
		icon : 'success'
	});
}



// Tombol Hapus
$('.tombol-hapus').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Anda Yakin ?',
	  text: "Data akan di hapus selamanya!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.isConfirmed) {
	    document.location.href = href;
	  }
	})
});

// Access Voting
$('.access_voting').on('click', function(e){
	e.preventDefault();

	Swal.fire({
	  title: 'Akses di Blokir',
	  text: periode_active,
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  cancelButtonText: 'Tidak',
	  confirmButtonText: 'Ya'
	}).then((result) => {
	  if (result.isConfirmed) {
	    document.location.href = 'http://localhost/e-voting/admin/changeOpen/'+id_periode_active;
	  }
	})
});

// tombol logout
$('.tombol-logout').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Anda yakin?',
	  text: "Data login anda akan di normalkan dan anda harus melakukan login ulang untuk masuk!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Keluar'
	}).then((result) => {
	  if (result.isConfirmed) {
	    document.location.href = href;
	  }
	})
});