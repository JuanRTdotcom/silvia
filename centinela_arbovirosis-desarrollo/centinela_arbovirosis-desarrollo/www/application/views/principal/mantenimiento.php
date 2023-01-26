<?php 
// Mensajes de estado
if($this->session->flashdata('exito') != ''){
  ?>
  <div class="alert alert-success alert-dismissable"><?php echo $this->session->flashdata('exito'); ?>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php
}
if($this->session->flashdata('error') != ''){
  ?>
  <div class="alert alert-danger alert-dismissable"><?php echo $this->session->flashdata('error'); ?>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php
}
if($this->session->flashdata('warning') != ''){
  ?>
  <div class="alert alert-warning alert-dismissable"><?php echo $this->session->flashdata('warning'); ?>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php
}
if($this->session->flashdata('info') != ''){
  ?>
  <div class="alert alert-info alert-dismissable"><?php echo $this->session->flashdata('info'); ?>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php
}
?>
<div class="row">
  <div class="row">
    <div class="col-md-12">
        <h2>COVID-19 - Coronavirus</h2>   
    </div>
  </div>

  <hr>
</div>
<div id="trabajando">
    <img src="<?php echo base_url('assets/img/pnz007.png') ?>" alt="">
</div>
