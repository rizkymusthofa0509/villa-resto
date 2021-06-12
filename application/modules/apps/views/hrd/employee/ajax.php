
<!-- End Content -->
<script type="text/javascript">
	ajax_pendidikan();
	function ajax_pendidikan() { 
		var employee_id = document.getElementById('employee_id').value; 
		// alert(employee_id);
		$.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_pendidikan',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
            // alert(data);
            document.getElementById('ajax_pendidikan').innerHTML = data;
          }
        });
	}
	function ajax_pendidikan_add() {
		var employee_id = document.getElementById('employee_id').value; 
		// alert(employee_id);
		$.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_pendidikan_add',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
    			ajax_pendidikan();
          }
        });
	}
	function update_ajax(t,f,id,param,get) { 
		var upt = get.value;
		$.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_pendidikan_update',
          type:'POST',
          async:false,
          data:{
            table:t,
            field:f,
            id:id,
            upt:upt,
            param:param,
          },
          success:function(data){ 
			// alert(data);
			console.log("Success");
          }
        }); 
	}

	function delete_ajax(t,f,id,param,get) {
		var upt = get.value;
    // alert(t+" "+param+" "+id);
		$.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_pendidikan_delete',
          type:'POST',
          async:false,
          data:{
            table:t,
            field:f,
            id:id,
            upt:upt,
            param:param,
          },
          success:function(data){ 
          ajax_pendidikan(); 
          ajax_pelatihan(); 
          ajax_pengalaman();
          ajax_jenjang();
          ajax_family_detail();
    			console.log("Success");
          }
        }); 
	}
</script>

<script type="text/javascript">
  ajax_pelatihan();
  function ajax_pelatihan() { 
    var employee_id = document.getElementById('employee_id').value; 
    // alert(employee_id);
    $.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_pelatihan',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
            // alert(data);
            document.getElementById('ajax_pelatihan').innerHTML = data;
          }
        });
  }
  function ajax_pelatihan_add() {
    var employee_id = document.getElementById('employee_id').value; 
    // alert(employee_id);
    $.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_pelatihan_add',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
            ajax_pelatihan();
          }
        });
  }
</script>

<script type="text/javascript">
  ajax_pengalaman();
  function ajax_pengalaman() { 
    var employee_id = document.getElementById('employee_id').value; 
    // alert(employee_id);
    $.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_pengalaman',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
            // alert(data);
            document.getElementById('ajax_pengalaman').innerHTML = data;
          }
        });
  }
  function ajax_pengalaman_add() {
    var employee_id = document.getElementById('employee_id').value; 
    // alert(employee_id);
    $.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_pengalaman_add',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
            ajax_pengalaman();
          }
        });
  }
</script>

<script type="text/javascript">
  ajax_jenjang();
  function ajax_jenjang() { 
    var employee_id = document.getElementById('employee_id').value; 
    // alert(employee_id);
    $.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_jenjang',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
            // alert(data);
            document.getElementById('ajax_jenjang').innerHTML = data;
          }
        });
  }
  function ajax_jenjang_add() {
    var employee_id = document.getElementById('employee_id').value; 
    // alert(employee_id);
    $.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_jenjang_add',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
            ajax_jenjang();
          }
        });
  }
</script>

<script type="text/javascript">
  ajax_family_detail();
  function ajax_family_detail() { 
    var employee_id = document.getElementById('employee_id').value; 
    // alert(employee_id);
    $.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_family_detail',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
            // alert(data);
            document.getElementById('ajax_family_detail').innerHTML = data;
          }
        });
  }
  function ajax_family_detail_add() {
    var employee_id = document.getElementById('employee_id').value; 
    // alert(employee_id);
    $.ajax({
          url:'<?php echo base_url() ?>apps/employee/act/ajax_family_detail_add',
          type:'POST',
          async:false,
          data:{
            employee_id:employee_id,
          },
          success:function(data){
            ajax_family_detail();
          }
        });
  }
</script>