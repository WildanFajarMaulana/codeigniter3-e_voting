
$(function(){
	const gpp = document.querySelector('#gpp');
	const gp = document.querySelector('#gp');
	// const golput = document.querySelector('#golput');
	// const mahasiswa = document.querySelector('#mahasiswa');
	// console.log(golput);
	const cg = document.querySelector('#cg');
	const garis = document.querySelector('#garis');
	const grafik_partisipasi = document.querySelector('#grafik_partisipasi');
	const grafik_pemilihan = document.querySelector('#grafik_pemilihan');
	const fot2 = document.querySelector('#fot2');
	const opentambah = document.querySelector('#opentambah');
	const pemilihan = document.querySelector('#pemilihan');
	const kotak_kosong = document.querySelector('#kotak_kosong');
	$('#gpp').on('click',function(){

		gpp.classList.remove('text-hitam');
		gp.classList.remove('text-biru-muda');
		grafik_partisipasi.classList.remove('d-none');
		cg.classList.add('pg-168');
		gp.classList.add('text-hitam');
		gpp.classList.add('text-biru-muda');
		garis.classList.add('g-panjang');
		grafik_pemilihan.classList.add('d-none');
		$('#subJudul').text(' > Transaksi Order Poin');
	});
	$('#gp').on('click',function(){
		gp.classList.remove('text-hitam');
		gpp.classList.remove('text-biru-muda');
		gp.classList.add('text-biru-muda');
		cg.classList.remove('pg-168');
		garis.classList.remove('g-panjang');
		grafik_pemilihan.classList.remove('d-none');
		grafik_partisipasi.classList.add('d-none');
		$('#subJudul').text(' > Transaksi Order');
	});
	$("#jenis_pilihan").on('change', function(){
		let val_selected = $("#jenis_pilihan option:selected").attr('value');

		if (val_selected == 1) {
			pemilihan.classList.remove('d-none');
			kotak_kosong.classList.add('d-none');
			$('#form_tambah_kandidat').attr('action','http://localhost/e-voting/admin/tambah_kandidat');

		}else if (val_selected == 2) {
			pemilihan.classList.add('d-none');
			kotak_kosong.classList.remove('d-none');
			$('#form_tambah_kandidat').attr('action','http://localhost/e-voting/admin/tambah_kandidat_golput');
		}
	});
});


