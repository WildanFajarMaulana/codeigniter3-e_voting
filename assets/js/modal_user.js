$(function(){
	//Modal Detail User
	$('.detailPemilihan').on('click', function(){
		console.log('ok');
		const id = $(this).data('id');

		$.ajax({
			url : 'http://localhost/e-voting/user/getDataKandidatForUser',
			data : {id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#visi').text(data.visi);
				$('#misi').text(data.misi);
			}
			
		});
	});
});
