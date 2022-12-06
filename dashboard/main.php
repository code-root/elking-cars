    <script >
$('.ccc').hide();

            $("#FromDate").change(function() { 
                DateDays();
                console.log('FromDate');
              });
  
              $("#ToDate").change(function() { 
                DateDays();
                console.log('ToDate');
  
              });
  
              $("#DayPrice").change(function() { 
                DateDays();
              });
              
              function DateDays () {
                  ToDate =  $("#ToDate").val();
                  FromDate =   $("#FromDate").val();
                  DayPrice = $("#DayPrice").val();
                  $.ajax({
                      type: 'post',
                      url: '<?=url_ajax()?>users/collectors/Get-Days.php',
                      data: {FromDate:FromDate , ToDate:ToDate , DayPrice:DayPrice},
                      dataType: 'json',
                      success: function(data) {
                          $('#total').val(data.total);
                          $('#numberDays').val(data.numberDays);
                              console.log(data);
                      }
                  });
              }
  
              $("#total").change(function() { 
                  total =  $('#total').val();
                  $('#payer').val(total);
              });
              
              $("#payer").change(function() { 
                  total =  $('#total').val();
                  payer =  $('#payer').val();
                  if (payer >= total) {
                 // $('#payer').val(total);
                  }
                  Residual = total - payer ;
                  if (Residual <= 1) {
                  $('#Residual').val('');
                  }else {
              $('#Residual').val(Residual);
                  }
              });
  
              $("#Residual").change(function() { 
                  total =  $('#total').val();
                  payer =  $('#payer').val();
                  Residual =  $('#Residual').val();
                  if (Residual >= total) {
                  $('#Residual').val('');
                  }
              });

              $('input[type=file]').change(function(e) {
                var form_data = new FormData();
                $('.dds').hide().fadeOut(3);
                $('.ccc').show();

                // Read selected files
                var totalfiles = document.getElementById('files').files.length;
                for (var index = 0; index < totalfiles; index++) {
                    form_data.append("files[]", document.getElementById('files').files[index]);
                }
                // AJAX request
                $.ajax({
                    url: '<?=url_ajax()?>img-uploaded.php',
                    type: 'post',
                    data: form_data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var rand = response.rand;
                        var src = response.files_arr;
                        $('#upload_img').val(rand);
                        $('.dds').show().fadeIn(3);
                        $('.ccc').hide().fadeOut(3);
                        console.log(response.rand);
                    }
                });
            });
            </script>