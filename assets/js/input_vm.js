
              $(document).ready(function() {
                 for(B=1; B<=1; B++){
                  Barisbaru();
                 } 
                 $('.plus').click(function(e) {
                     e.preventDefault();
                     Barisbaru();
                 });

                 $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
              });

              function Barisbaru() {
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  // var Nomor = $("#tableLoop tbody tr").length + 1;
                  var Baris = '<tr>';
                          Baris += '<td>';
                              Baris += '<div class="input-group mt-3 tr">';
                                Baris += '<input type="text" name="misi[]" class="form-control first_name td" placeholder="Input Rule" aria-describedby="button-addon2" alt="Tambah Column Input" autocomplete="off">';
                                Baris += '<a class="btn btn-danger" data-toggle="tooltip" id="HapusBaris"><i class="fa fa-times" style="color: white;"></i></a>';
                              Baris += '</div>';
                              // Baris += '<input type="text" name="rule[]" class="form-control first_name" placeholder="Input Rule..." required="">';
                          Baris += '</td>';
                          // Baris += '<td class="text-center">';
                          //     Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
                          // Baris += '</td>';
                      Baris += '</tr>';

                  $("#tableLoop tbody").append(Baris);
                  $("#tableLoop tbody tr").each(function () {
                     $(this).find('td:nth-child(2) input').focus(); 
                  });

              }

              $(document).on('click', '#HapusBaris', function(e) {
                 e.preventDefault();
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                 $('tableLoop tbody tr').each(function() {
                     $(this).find('td:nth-child(1)').html(Nomor);
                     Nomor++;
                 });
              });

              $(document).ready(function() {
                 $('#SimpanData').submit(function(e) {
                     e.preventDefault();
                     biodata();
                 });
              });

              function biodata() {
                  $.ajax({
                      url: 'http://localhost/e-voting/user/editkandidat',
                      type:'post',
                      cache:false,
                      dataType:"json",
                      data: $("#SimpanData").serialize(),
                      success:function (data) {
                        console.log(data);
                          if (data.berhasil == true) {
                              $('.first_name').val('');
                              $("#i-aturan").removeClass("show");
                              Swal.fire({
                                title : 'Insert '+data.alert+' Success',
                                text : 'Berhasil menambah data '+ data.alert,
                                icon : 'success',
                                confirmButtonText: 'Ok'
                              }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload()
                                }
                              })
                          }
                      },

                      error:function (error) {
                          alert(error);
                      }

                  });
              }