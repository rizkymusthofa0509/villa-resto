 

<!--  <style type="text/css">
.dropdown-menu { 
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15)!important; 
    margin-top:0px !important; 
    width:auto;
    white-space: nowrap;
    border-top: none;
    border-left: none;
    border-right: none;
    margin-top: -($spacer * .25 * 3);
} 
@media (min-width: 992px){
  .dropdown-menu .dropdown-toggle:after{
    border-top: .3em solid transparent;
      border-right: 0;
      border-bottom: .3em solid transparent;
      border-left: .3em solid;
  }
  .dropdown-menu .dropdown-menu{
    margin-left:0; margin-right: 0;
  }
  .dropdown-menu li{
    position: relative;
  }
  .nav-item .submenu{ 
    display: none;
    position: absolute;
    left:100%; top:-7px;
  }
  .nav-item .submenu-left{ 
    right:100%; left:auto;
  }
  .dropdown-menu > li:hover{ background-color: #f1f1f1 }
  .dropdown-menu > li:hover > .submenu{
    display: block;
  }
}
</style> -->
<ul class="nav navbar-nav ">
     <li><a href="<?= base_url() ?>apps"><font size="4"><i class="fa fa-home"></i></font></a></li>

     <!-- //Open Modul -->

    <?php
    	$modul = $this->db->query("SELECT * FROM modul ORDER BY order_by ASC");
    	foreach ($modul->result() as $rmodul) {
    		?>
    		   <li class="nav-item dropdown">
    		   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  <?= $rmodul->modul_name ?> <span class="caret"></span></a>
    		   <ul class="dropdown-menu">
    		   	<?php
    		   		$menu = $this->db->query("SELECT * FROM menu WHERE modul_id='$rmodul->modul_id' and parent_id='0' ORDER BY menu_id ASC");
    		   		foreach ($menu->result() as $rmenu) {
    		   			?>
    		   				<li><a href="<?= base_url() ?><?= $rmenu->url ?>"><i class="fa fa-angle-right"></i> <?= $rmenu->menu_name ?></a></li>  
					         <ul class="submenu dropdown-menu">
					         	<?php
					         		$submenu = $this->db->query("SELECT * FROM menu WHERE parent_id='$rmenu->menu_id' and parent_id>'0' ORDER BY menu_id ASC");
					         		foreach ($submenu->result() as $rsubmenu) {
					         			?>
					         				<li><a href="<?= base_url() ?>apps/employee"><i class="fa fa-angle-right"></i> Vacant Position Report</a></li>  
					         			<?php
					         		}
					         	?>
					          
					         </ul>
					        </li> 
    		   			<?php
    		   		}
    		   	?> 
		        </ul>
		      </li>
    		<?php
    	}
    ?>
 

</ul>
          


  