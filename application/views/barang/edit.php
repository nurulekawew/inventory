<?php $this->load->view('_partial/flash_message') ?>



<?= form_open($action, array(
								'class' => 'form-horizontal form-label-left',
								'enctype' => 'multipart/form-data'
							)) 
?>

<?= form_input(array(	  						
        					'type' => 'hidden',
	  						'name' => 'id_barang', 
	  						'set_value' => 'id_barang',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> isset($data->id_barang) ? base64_encode($data->id_barang) : ''
	  	)); ?>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang<span class="required">*</span></label>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<?= form_input(array(	  						
        					'type' => 'text',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> isset($data->kode_barang) ? $data->kode_barang : '',
							  'disabled' => 'disabled'
	  	)); ?>
		<span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('kode_barang', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang<span class="required">*</span></label>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<?= form_input(array(	  						
        					'type' => 'text',
	  						'name' => 'nama_barang', 
	  						'set_value' => 'nama_barang',
	  						'class'=>'form-control has-feedback-left',
	  						'value'=> isset($data->nama_barang) ? $data->nama_barang : '',
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
	  						'value'=> isset($data->unit) ? $data->unit : '',
	  	)); ?>
		<span class="fa fa-hand-o-right   form-control-feedback left" aria-hidden="true"></span>
	</div>
	<?= form_error('unit', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>

<?php if(isset($data->foto_barang)): ?>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<div class="image-box">
			<img src="<?= $data->location ?>" class="img-fluid" alt="Gambar dengan Efek Kotak dan Bayangan">
		</div>
	</div>
	<?= form_error('foto_barang', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
</div>
<?php endif; ?>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<?= form_input(array(
            'type' => 'file', // Menggunakan input file
            'name' => 'foto_barang', // Ganti nama field sesuai kebutuhan
            'class' => 'form-control', // Menambahkan class Bootstrap form-control
        )); ?>
	</div>
	<?= form_error('foto_barang', '<span id="helpBlock2" class="help-block label label-danger">', '</span>'); ?>
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


<style>
	.image-box {
		border: 2px solid #ccc;
		box-shadow: 5px 5px 5px #888888;
		padding: 10px;
		border-radius: 10px;
		max-width: 300px;
		max-height: 300px;
	}

	.image-box img{
		max-width: 300px;
		max-height: 300px;
	}

</style>
