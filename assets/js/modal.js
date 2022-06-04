$(function(){
	//ui jadwal
	$('.tambahJadwal').on('click', function(){
		$('.modal-title').html('Tambah Jadwal');
		$('.modal-footer button[type=submit]').html('Tambahkan');
		$('.modal-body form').attr('action', 'http://localhost/e-voting/admin/tambah_jadwal');
		$('#id_jadwal').val('');
		$('#date').val('');
		$('#jadwal').val('');
	});
	$('.ubahJadwal').on('click', function(){
		$('.modal-title').html('Edit Jadwal');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/e-voting/admin/ubah_jadwal');

		const id = $(this).data('id');

		$.ajax({
			url : 'http://localhost/e-voting/admin/getDataJadwal',
			data : {id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#id_jadwal').val(data.id);
				$('#date').val(data.date);
				$('#jadwal').val(data.jadwal);
			}
			
		});
	});
		$('.tambahAturan').on('click', function(){
		$('.modal-title').html('Tambah Aturan');
		$('.modal-footer button[type=submit]').html('Tambahkan');
		
	});
	$('.ubahAturan').on('click', function(){
		$('.modal-title').html('Edit Aturan');
		$('.modal-footer button[type=submit]').html('Ubah');

		const id = $(this).data('ida');

		$.ajax({
			url : 'http://localhost/e-voting/admin/getDataAturan',
			data : {id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#id_aturan').val(data.id);
				$('#aturan').val(data.aturan);
			}
			
		});
	});

	// UI Periode
	$('.tambahPeriode').on('click', function(){
		$('.modal-title').html('Tambah Periode');
		$('.modal-footer button[type=submit]').html('Tambahkan');
		$('.modal-body form').attr('action', 'http://localhost/e-voting/admin/tambah_periode');
		$('#id_periode').val('');
		$('#paw').val('');
		$('#pak').val('');
	});
	$('.ubahPeriode').on('click', function(){
		$('.modal-title').html('Edit Periode');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/e-voting/admin/ubah_periode');

		const id = $(this).data('id');

		$.ajax({
			url : 'http://localhost/e-voting/admin/getDataPeriode',
			data : {id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#id_periode').val(data.id_periode);
				$('#paw').val(data.periode_awal);
				$('#pak').val(data.periode_akhir);
				$('#judul').val(data.judul);
			}
			
		});
	});

	// UI Kandidat
	$('.detailKandidat').on('click', function(){
		$('.modal-title').html('Detail Kandidat');
	});
	$('.tambahKandidat').on('click', function(){
		const jenis_pilihan = document.querySelector('#jenis_pilihan');
		const pemilihan = document.querySelector('#pemilihan');
		const kotak_kosong = document.querySelector('#kotak_kosong');
			jenis_pilihan.classList.remove('d-none');
			pemilihan.classList.remove('d-none');
			kotak_kosong.classList.add('d-none');
		$('#jenis_pilihan').val(1);
		$('.modal-title').html('Tambah Kandidat');
		$('.modal-footer button[type=submit]').html('Tambahkan');
		$('.modal-body form').attr('action', 'http://localhost/e-voting/admin/tambah_kandidat');
		$('#detail_nim_ketua').text('NIM : XXXXXXXX');
        $('#detail_foto_ketua').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
        $('#detail_nama_ketua').text('Nama Ketua'); 
 		$('#detail_nim_wakil').text('NIM : XXXXXXXX');
        $('#detail_foto_wakil').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
        $('#detail_nama_wakil').text('Nama Wakil'); 
        $('#nim_ketua').val('');
		$('#nim_wakil').val('');
        $('#visi').val('');
		$('#misi').val('');
	});
		$('.tambahKandidatKosong').on('click', function(){
		const jenis_pilihan = document.querySelector('#jenis_pilihan');
		const pemilihan = document.querySelector('#pemilihan');
		const kotak_kosong = document.querySelector('#kotak_kosong');
			jenis_pilihan.classList.remove('d-none');
			pemilihan.classList.remove('d-none');
			kotak_kosong.classList.add('d-none');
		$('#jenis_pilihan').val(1);
		$('.modal-title').html('Tambah Kandidat');
		$('.modal-footer button[type=submit]').html('Tambahkan');
		$('.modal-body form').attr('action', 'http://localhost/e-voting/admin/tambah_kandidat');
		$('#detail_nim_ketua').text('NIM : XXXXXXXX');
        $('#detail_foto_ketua').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
        $('#detail_nama_ketua').text('Nama Ketua'); 
 		$('#detail_nim_wakil').text('NIM : XXXXXXXX');
        $('#detail_foto_wakil').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
        $('#detail_nama_wakil').text('Nama Wakil'); 
        $('#nim_ketua').val('');
		$('#nim_wakil').val('');
        $('#visi').val('');
		$('#misi').val('');
	});
	$('.ubahKandidat').on('click', function(){
		const jenis_pilihan = document.querySelector('#jenis_pilihan');
		const pemilihan = document.querySelector('#pemilihan');
		const kotak_kosong = document.querySelector('#kotak_kosong');

			jenis_pilihan.classList.add('d-none');
			pemilihan.classList.remove('d-none');
			kotak_kosong.classList.add('d-none');
		$('.modal-title').html('Edit Kandidat');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/e-voting/admin/ubah_kandidat');
		const id = $(this).data('id');

		$.ajax({
			url : 'http://localhost/e-voting/admin/getDataKandidat',
			data : {id : id},
			method: 'post',
			cache:false,
			dataType:'json',
			success: function(data){
				if (data.success == true) {
					$('#id_kandidat').val(data.id_kandidat);
					$('#nim_ketua').val(data.nim_ketua);
					$('#nama_ketua').val(data.nama_ketua);
					$('#foto_ketua').val(data.foto_ketua);
					$('#detail_nim_ketua').text(data.nim_ketua);
					$('#detail_nama_ketua').text(data.nama_ketua);
					$('#detail_foto_ketua').attr('src',data.foto_ketua);
					$('#nim_wakil').val(data.nim_wakil);
					$('#nama_wakil').val(data.nama_wakil);
					$('#foto_wakil').val(data.foto_wakil);
					$('#detail_nim_wakil').text(data.nim_ketua);
					$('#detail_nama_wakil').text(data.nama_wakil);
					$('#detail_foto_wakil').attr('src',data.foto_wakil);
					$('#visi').val(data.visi); 
					$('#misi').val(data.misi);

				}else{
					$('#detail_nim_ketua').text('NIM : XXXXXXXX');
                	$('#detail_foto_ketua').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
                 	$('#detail_nama_ketua').text('Nama Ketua'); 
                	$('#notif').html('<div class="alert alert-danger">NIM ketua  Tidak Ditemukan</div>');
 					$('#detail_nim_wakil').text('NIM : XXXXXXXX');
                 	$('#detail_foto_wakil').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
                 	$('#detail_nama_wakil').text('Nama Wakil');
                 	$('#notifwakil').html('<div class="alert alert-danger">NIM Wakil Tidak Ditemukan</div>');
				}
				
			}
			
		});
	});
});
