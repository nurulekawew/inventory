<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>
<p>
    <?php echo anchor($urls['create'], '<i class="glyphicon glyphicon-plus"> <b>Tambah Data</b></i>', array('class' => 'btn btn-primary btn-sm')); ?>
</p>

<div class="x_content">
    <p class="text-muted font-13 m-b-30">
<?php if ($data): ?>
    <table id="datatable" class="table table-striped table-bordered">
      <thead>
        <tr>
          	<th>No</th>
          	<th>Kode Barang</th>
          	<th>Nama Barang</th>
          	<th>Unit</th>
            <th>Stock Barang</th>
            <th>Foto Barang</th>
            <th>Action</th>
        </tr>
      </thead>
		<?php $i=1; ?>

      <tbody>
      <?php foreach($data as $row): ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $row->kode_barang ?></td>
              <td><?= $row->nama_barang ?></td>
              <td><?= $row->unit ?></td>
              <td><?= $row->stok_barang ?></td>
              <td><?= $row->foto_barang ?></td> 
							
              <td>
								<?php $id = base64_encode($row->kode_barang);?>
                <?php echo anchor($urls['edit'] . "/" . $id , '<i class="fa fa-edit"></i>', array('class' => 'btn btn-warning btn-xs')); ?>
                <?php echo anchor($urls['delete'] . "/" . $id, '<i class="fa fa-remove"></i>', array('class' => 'btn btn-danger btn-xs')); ?>
              </td>
            </tr>
       <?php endforeach ?>
      </tbody>
    </table>
<?php else: ?>
	<p>Data <b>Barang</b> kosong atau tidak ditemukan.</p>
<?php endif ?>
  </div>
