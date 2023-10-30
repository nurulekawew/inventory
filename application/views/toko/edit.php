
<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>

<?= form_open($action, array(
								'class' => 'form-horizontal form-label-left'
							)) 
?>

<?= form_input(array(	  						
        					'type' => 'hidden',
	  						'name' => 'id_toko', 
	  						'set_value' => 'id_toko',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> base64_encode($data->id_toko)
	  	)); ?>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Toko <?= $data->nama_toko ?><span class="required">*</span></label>
	<div class="col-md-3 col-sm-3 col-xs-12">	  
	  <?= form_input(array(	  						
        					'type' => 'text',
	  						'name' => 'nama_toko', 
	  						'set_value' => 'nama_toko',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> $data->nama_toko
	  	)); ?>
	  	<span class="fa fa-home  form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('nama_toko', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">No Hp<span class="required">*</span></label>
	<div class="col-md-3 col-sm-3 col-xs-12">	  
	  <?= form_input(array(	  						
        					'type' => 'text',
	  						'name' => 'nomer_handphone', 
	  						'set_value' => 'nomer_handphone',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> $data->nomer_handphone
	  	)); ?>
	  	<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('nomer_handphone', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
	<div class="col-md-3 col-sm-3 col-xs-12">
	  <?= form_textarea(array(	  							
	  						'name' => 'alamat', 
	  						'rows' => '3',
	  						'class'=> 'form-control col-md-10',
	  						'value'=> $data->alamat
	  )); ?>
	</div>
	<?= form_error('alamat', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-3">
  <?= form_submit(array(
  						'class' => 'btn btn-success',
  						'value' => 'Save Data'
  						)); ?>
</div>
</div>

<?= form_close() ?>
