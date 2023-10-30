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
	  	<span class="fa fa-hand-o-right   form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('nama_barang', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Unit<span class="required">*</span></label>
	<div class="col-md-3 col-sm-3 col-xs-12">	  
	  <?= form_input(array(	  						
        					'type' => 'text',
	  						'name' => 'unit', 
	  						'set_value' => 'unit',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> set_value('unit')
	  	)); ?>
	  	<span class="fa fa-hand-o-right   form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('unit', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
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
