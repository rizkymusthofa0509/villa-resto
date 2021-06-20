<script>
    function chart(id) {
        $.ajax({
          url:'<?php echo base_url() ?>apps/cart/pesan',
          type:'POST',
          async:false,
          data:{
            token:"<?= session('TOKEN') ?>",
            id:id,
          },
          success:function(data){
            alert(data);
          }
        });
    }

    function update_pesanan(data,field,id) {
        $.ajax({
          url:'<?php echo base_url() ?>apps/cart/update_pesanan',
          type:'POST',
          async:false,
          data:{
            update:data.value,
            id:id,
            field:field,
          },
          success:function(data){
            console.log('Success');
          }
        });
    }

    function update_qty(tipe,id) {
        $.ajax({
          url:'<?php echo base_url() ?>apps/cart/update_qty',
          type:'POST',
          async:false,
          data:{
            tipe:tipe,
            id:id, 
          },
          success:function(data){
            document.getElementById('qty_'+id).value = data;
            total_price()
          }
        });
    }

    function total_price() {
        $.ajax({
          url:'<?php echo base_url() ?>apps/cart/total_price',
          type:'POST',
          async:false,
          data:{
            tipe:'tipe',
          },
          success:function(data){
            document.getElementById('subTotal').innerHTML = data;
          }
        });
    }

    function update_transaksi(data,field,id) {
      $.ajax({
          url:'<?php echo base_url() ?>apps/cart/update_transaksi',
          type:'POST',
          async:false,
          data:{
            update:data.value,
            id:id,
            field:field,
          },
          success:function(data){
            console.log('Success');
          }
        });
    }
</script>