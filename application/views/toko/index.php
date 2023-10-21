<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>
<p>
    <?php echo anchor($create_url, '<i class="glyphicon glyphicon-plus"> <b>Tambah Data</b></i>', array('class' => 'btn btn-primary btn-sm')); ?>
</p>

<div class="x_content">
    <p class="text-muted font-13 m-b-30">
<?php if ($data): ?>
    <table id="datatable" class="table table-striped table-bordered">
      <thead>
        <tr>
          	<th>No</th>
          	<th>Nama Toko</th>
          	<th>Alamat</th>
          	<th>Telp</th>
            <th>Action</th>
        </tr>
      </thead>
		<?php $i=1; ?>

      <tbody>
      <?php foreach($data as $row): ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $row->nama_toko ?></td>
              <td><?= $row->alamat ?></td>
              <td><?= $row->nomer_handphone ?></td>
              <td>
								<?php $id = base64_encode($row->id_toko);?>
                <?php echo anchor($edit_url . "/" . $id , '<i class="fa fa-edit"></i>', array('class' => 'btn btn-warning btn-xs')); ?>
                <?php echo anchor($delete_url . "/" . $id, '<i class="fa fa-remove"></i>', array('class' => 'btn btn-danger btn-xs')); ?>
              </td>
            </tr>
       <?php endforeach ?>
      </tbody>
    </table>
<?php else: ?>
	<p>Data <b>Toko</b> kosong atau tidak ditemukan.</p>
<?php endif ?>
  </div>
