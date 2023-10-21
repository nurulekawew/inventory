<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>
<p>
    <?php echo anchor('toko/create', '<i class="glyphicon glyphicon-plus"> <b>Tambah Data</b></i>', array('class' => 'btn btn-primary btn-sm')); ?>
</p>

<div class="x_content">
    <p class="text-muted font-13 m-b-30">
<?php if ($data): ?>
    <table id="datatable" class="table table-striped table-bordered">
      <thead>
        <tr>
          	<th>No</th>
          	<th>Nama Barang</th>
          	<th>Kode Barang</th>
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
              <td><?= $row->nama_barang ?></td>
              <td><?= $row->kode_barang ?></td>
              <td><?= $row->unit ?></td>
              <td><?= $row->stock_barang ?></td>
              <td><?= $row->foto_barang ?></td>
              <td>
                <?php echo anchor("barang/edit/$row->id_barang", '<i class="fa fa-edit"></i>', array('class' => 'btn btn-warning btn-xs')); ?>
                <?php echo anchor("barang/delete/$row->id_barang", '<i class="fa fa-remove"></i>', array('class' => 'btn btn-danger btn-xs')); ?>
              </td>
            </tr>
       <?php endforeach ?>
      </tbody>
    </table>
<?php else: ?>
	<p>Data <b>Barang</b> kosong atau tidak ditemukan.</p>
<?php endif ?>
  </div>