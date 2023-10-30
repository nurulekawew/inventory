<?php $this->load->view('_partial/flash_message') ?>

<?= form_open($action, array(
								'class' => 'form-horizontal form-label-left'
							)) 
?>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang<span class="required">*</span></label>
	<div class="col-md-3 col-sm-3 col-xs-12">	  
	  <?= form_input(array(	  						
        					'type' => 'text',
	  						'name' => 'nama_barang', 
	  						'set_value' => 'nama_barang',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> set_value('nama_barang')
	  	)); ?>
	  	<span class="fa fa-home  form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('nama_barang', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">No Hp<span class="required">*</span></label>
	<div class="col-md-3 col-sm-3 col-xs-12">	  
	  <?= form_input(array(	  						
        					'type' => 'text',
	  						'name' => 'kode_barang', 
	  						'set_value' => 'kode_barang',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> set_value('kode_barang')
	  	)); ?>
	  	<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('kode_barang', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
	<div class="col-md-3 col-sm-3 col-xs-12">
	  <?= form_textarea(array(	  							
	  						'name' => 'unit', 
	  						'rows' => '3',
	  						'class'=> 'form-control col-md-10',
	  						'value'=> set_value('unit')
	  )); ?>
	</div>
	<?= form_error('alamat', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
	  	<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('unit', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
	<div class="col-md-3 col-sm-3 col-xs-12">
	  <?= form_textarea(array(	  							
	  						'name' => 'stock_barang', 
	  						'rows' => '3',
	  						'class'=> 'form-control col-md-10',
	  						'value'=> set_value('stock_barang')
						)); ?>
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
