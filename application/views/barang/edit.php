<?php $this->load->view('_partial/flash_message') ?>

<?= form_open($action, array(
								'class' => 'form-horizontal form-label-left'
							)) 
?>

<?= form_input(array(	  						
        					'type' => 'hidden',
	  						'name' => 'id_barang', 
	  						'set_value' => 'id_barang',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> base64_encode($data->id_barang)
	  	)); ?>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang <?= $data->nama_barang ?><span class="required">*</span></label>
	<div class="col-md-3 col-sm-3 col-xs-12">	  
	  <?= form_input(array(	  						
        					'type' => 'text',
	  						'name' => 'nama_barang', 
	  						'set_value' => 'nama_barang',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> $data->nama_barang
	  	)); ?>
	  	<span class="fa fa-home  form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('nama_barang', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang<span class="required">*</span></label>
	<div class="col-md-3 col-sm-3 col-xs-12">	  
	  <?= form_input(array(	  						
        					'type' => 'text',
	  						'name' => 'kode_barang', 
	  						'set_value' => 'kode_barang',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> $data->kode_barang
	  	)); ?>
	  	<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('kode_barang', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Unit</label>
	<div class="col-md-3 col-sm-3 col-xs-12">
	  <?= form_textarea(array(	  							
	  						'name' => 'unit', 
	  						'rows' => '3',
	  						'class'=> 'form-control col-md-10',
	  						'value'=> $data->unit
	  )); ?>
      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('unit', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
      <div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Barang</label>
	<div class="col-md-3 col-sm-3 col-xs-12">
	  <?= form_textarea(array(	  							
	  						'name' => 'stock_barang', 
	  						'rows' => '3',
	  						'class'=> 'form-control col-md-10',
	  						'value'=> $data->stock_barang
	  )); ?>
	</div>
	<?= form_error('stock_barang', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
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
