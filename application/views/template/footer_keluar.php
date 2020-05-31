
      <!-- footer content -->
      <footer>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo base_url('assetsP/vendors/jquery/dist/jquery.min.js')?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('assetsP/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assetsP/vendors/fastclick/lib/fastclick.js')?>"></script>
  <!-- NProgress -->
  <script src="<?php echo base_url('assetsP/vendors/nprogress/nprogress.js')?>"></script>
  <!-- Chart.js -->
  <script src="<?php echo base_url('assetsP/vendors/Chart.js/dist/Chart.min.js')?>"></script>
  <!-- gauge.js -->
  <script src="<?php echo base_url('assetsP/vendors/gauge.js/dist/gauge.min.js')?>"></script>
  <!-- bootstrap-progressbar -->
  <script src="<?php echo base_url('assetsP/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('assetsP/vendors/iCheck/icheck.min.js')?>"></script>
  <!-- Skycons -->
  <script src="<?php echo base_url('assetsP/vendors/skycons/skycons.js')?>"></script>
  <!-- Flot -->
  <script src="<?php echo base_url('assetsP/vendors/Flot/jquery.flot.js')?>"></script>
  <script src="<?php echo base_url('assetsP/vendors/Flot/jquery.flot.pie.js')?>"></script>
  <script src="<?php echo base_url('assetsP/vendors/Flot/jquery.flot.time.js')?>"></script>
  <script src="<?php echo base_url('assetsP/vendors/Flot/jquery.flot.stack.js')?>"></script>
  <script src="<?php echo base_url('assetsP/vendors/Flot/jquery.flot.resize.js')?>"></script>
  <!-- Flot plugins -->
  <script src="<?php echo base_url('assetsP/vendors/flot.orderbars/js/jquery.flot.orderBars.js')?>"></script>
  <script src="<?php echo base_url('assetsP/vendors/flot-spline/js/jquery.flot.spline.min.js')?>"></script>
  <script src="<?php echo base_url('assetsP/vendors/flot.curvedlines/curvedLines.js')?>"></script>
  <!-- DateJS -->
  <script src="<?php echo base_url('assetsP/vendors/DateJS/build/date.js')?>"></script>
  <!-- JQVMap -->
  <script src="<?php echo base_url('assetsP/vendors/jqvmap/dist/jquery.vmap.js')?>"></script>
  <script src="<?php echo base_url('assetsP/vendors/jqvmap/dist/maps/jquery.vmap.world.js')?>"></script>
  <script src="<?php echo base_url('assetsP/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')?>"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo base_url('assetsP/vendors/moment/min/moment.min.js')?>"></script>
  <script src="<?php echo base_url('assetsP/vendors/bootstrap-daterangepicker/daterangepicker.js')?>"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('assetsP/build/js/custom.min.js')?>"></script>

  <script src="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js')?>"></script>

    <script>
        $(document).ready(function() {
           for(B=1; B<=1; B++){
               Barisbaru();
           } 
           $('#Tambah').click(function(e) {
               e.preventDefault();
               Barisbaru();
           });

           $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
        });

        function Barisbaru() {
            $(document).ready(function() {
                $("[data=toggle='tooltip']").tooltip();
            });
            var Nomor = $("#tableLoop tbody tr").length + 1;
            var Baris = '<tr>';
                  Baris += '<td>'+Nomor+'</td>';
                  Baris += '<td>';
                      Baris += '<select class="form-control" id="id_barang" name="id_barang[]">';
                      Baris += '<?php foreach($barang as $brg): ?>';
                      Baris += '<option value="<?php echo $brg->id_barang; ?>"><?php echo $brg->jenis_barang; ?>';
                      Baris += '</option>';
                      Baris += '<?php endforeach ?>'
                      Baris += '</select>';
                  Baris += '</td>';
                  Baris += '<td>';
                      Baris += '<input type="text" class="form-control jumlah" placeholder="jumlah" name="jumlah_jual[]" required="">';
                  Baris += '</td>';
                  Baris += '<td>';
                      Baris += '<button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></button>';
                  Baris += '</td>';
                Baris += '</tr>';

            $("#tableLoop tbody").append(Baris);
            $("#tableLoop tbody tr").each(function() {
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
          $('#SimpanData').Submit(function(e) {
            e.preventDefault();
            detail_penjualan();
          });
        });

        function detail_penjualan() {
          $.ajax({
            url:$("#SimpanData").attr('action'),
            type: 'post',
            cache: false,
            dataType: "json",
            data: $("$SimpanData").serialize(),
            success:function (data) {
              if (data.success == true) {
                $('.id_barang').val('');
                $('.jumlah_jual').val('');
                $('#notif').fadeIn(800, function() {
                  $("#notif").html(data.notif).fadeOut(5000).delay(800);
                });
              }
              else{
                $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
              }
            },

            error:function(error) {
              alert(error);
            }
          });
        }

        
    </script>

</body>

</html>