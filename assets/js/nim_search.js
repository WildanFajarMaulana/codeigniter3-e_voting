$(function(){
	$('.btnCekNimKetua').on('click',function(){
		var nim_ketua = document.getElementById("nim_ketua").value;
        const pemilihanedit=document.querySelector('#pemilihanedit');
        
        pemilihanedit.classList.add('hidden');
         // console.log(nim_ketua);		
		$.ajax({
            url: 'http://localhost/e-voting/admin/search_nim',
            type:'post',
            cache:false,
            dataType:"json",
            data: {nim : nim_ketua},
            success:function (data) {
                if (data.success == true) {
                    $('#nim_ketua').val(nim_ketua);
                    $('#detail_nim_ketua').text(data.nim);
                    $('#nama_ketua').val(data.nama);
                    $('#foto_ketua').val(data.foto);
                    $('#detail_foto_ketua').attr('src',data.foto); 
                    $('#detail_nama_ketua').text(data.nama); 
                    $('#notif').html(data.notif);
                	
	            }
	            else{
                     $('#nim_ketua').val('');
                    $('#nama_ketua').val('');
                    $('#foto_ketua').val('');
                    $('#detail_foto_ketua').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
                    $('#detail_nim_ketua').text('NIM : XXXXXXXX');
                    $('#detail_nama_ketua').text('Nama Ketua'); 
	                $('#notif').html(data.notif);
                    $('#notif').html('<div class="alert alert-danger">NIM Ketua Tidak Ditemukan</div>');
                
                    
                }
            },

            error:function (error) {
                $('#nim_ketua').val('');
                $('#nama_ketua').val('');
                $('#foto_ketua').val('');
                $('#detail_nim_ketua').text('NIM : XXXXXXXX');
                $('#detail_foto_ketua').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
                 $('#detail_nama_ketua').text('Nama Ketua'); 
                $('#notif').html('<div class="alert alert-danger">NIM ketua  Tidak Ditemukan</div>');
                
            }

        });
	});
    $('.btnCekNimWakil').on('click',function(){
        var nim_wakil = document.getElementById("nim_wakil").value;
        // console.log(nim_wakil);      
        $.ajax({
            url: 'http://localhost/e-voting/admin/search_nim',
            type:'post',
            cache:false,
            dataType:"json",
            data: {nim : nim_wakil},
            success:function (data) {
                if (data.success == true) {
                    $('#nim_wakil').val(nim_wakil);
                    $('#detail_nim_wakil').text(data.nim);
                    $('#nama_wakil').val(data.nama);
                    $('#foto_wakil').val(data.foto);
                    $('#detail_foto_wakil').attr('src',data.foto); 
                    $('#detail_nama_wakil').text(data.nama); 
                    $('#notif').html(data.notif);
                    
                }
                else{
                    $('#nim_wakil').val('');
                    $('#nama_wakil').val('');
                    $('#foto_wakil').val('');
                    $('#detail_nim_wakil').text('NIM : XXXXXXXX');
                    $('#detail_foto_wakil').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
                 $('#detail_nama_wakil').text('Nama Wakil'); 
                    $('#notifwakil').html(data.notif);
                    $('#notifwakil').html('<div class="alert alert-danger">NIM Wakil Tidak Ditemukan</div>');
                }
            },

            error:function (error) {
                $('#nim_wakil').val('');https://siakad.poltekkesmamuju.ac.id/
                $('#nama_wakil').val('');
                $('#foto_wakil').val('');
                $('#detail_nim_wakil').text('NIM : XXXXXXXX');
                 $('#detail_foto_wakil').attr('src','http://localhost/e-voting/assets/img/DEFAULT.jpg'); 
                 $('#detail_nama_wakil').text('Nama Wakil'); 
                 $('#notifwakil').html('<div class="alert alert-danger">NIM Wakil Tidak Ditemukan</div>');
            }

        });
    });
});