<?php include 'header.php'; ?>
  
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card border-0 shadow">
                    <div class="card-body ">
                        <form method="post" class="mb-3">
                        <div class="input-group">
                              <input type="text" name="cari" class="form-control input-cari">
                              <button class="btn btn-primary btn-cari">Cari</button>
                            </div>
                      </form>
                        <div class="letak-produk"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow">
                    <div class="card-body keranjang">
\                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
  $(document).ready(function(){
    $.ajax({
      url:'tampilproduk.php',
      success:function(hasil){
        $(".letak-produk").html(hasil);
      }
    })
  })
</script>

<script>
  $(document).ready(function(){
        $.ajax({
          url:'tampilkeranjang.php',
          success:function(hasil) {
            $(".keranjang").html(hasil);
          }
        })
      
    }) 
</script>

<script>
  $(document).ready(function(){
    $(document).on("click", ".btn-cari", function(e){
      e.preventDefault();
      var cari = $(".input-cari").val();
      $.ajax({
        type:'post',
        url:'cariproduk.php',
        data:'cari='+cari,
        success:function(hasil){
          $(".letak-produk").html(hasil);
        }
      })
    })
  })
</script>

<script>
  $(document).ready(function(){
    $(document).on("click",".link-produk", function(){
      //dapatkan idnya
      var id_produk = $(this).attr("idnya");
      $.ajax({
        type:'post',
        url:'masukkankeranjang.php',
        data:'id_produk=' +id_produk,
        success:function(hasil) {
          $.ajax({
            url:'tampilkeranjang.php',
            success:function(hasil) {
              $(".keranjang").html(hasil);
            }
          })
        }
      })
    })
  });
</script>   

<script>
  $(document).ready(function(){
    $(document).on("click", ".tambahi", function(){
      var id_produk = $(this).attr("idnya");
      $.ajax({
        type:'post',
        url:'tambahkeranjang.php',
        data:'id_produk=' +id_produk,
        success:function(hasil) {
          $.ajax({
            url:'tampilkeranjang.php',
            success:function(hasil) {
              $(".keranjang").html(hasil);
            }
          })
        }
      })
    })
  })
</script>


<script>
  $(document).ready(function(){
    $(document).on("click", ".kurangi", function(){
      var id_produk = $(this).attr("idnya");
      $.ajax({
        type:'post',
        url:'kurangkeranjang.php',
        data:'id_produk=' +id_produk,
        success:function(hasil) {
          $.ajax({
            url:'tampilkeranjang.php',
            success:function(hasil) {
              $(".keranjang").html(hasil);
            }
          })
        }
      })
    })
  })
</script>

<script>
  $(document).ready(function(){
    $(document).on("keyup", ".bayar", function(){
      //dapatkan input bayar
      var bayar =$(this).val();      
      //dapatkan inputan total
      var total = $(".total").val();
      var kembalian = parseInt(bayar) - parseInt(total);

      $(".kembalian").val(kembalian);
    })
  })
</script>


<?php include 'footer.php'; ?>