<?php
    $success = $this->session->flashdata('success');
    $error   = $this->session->flashdata('error');
    $warning = $this->session->flashdata('warning');

    if ($error) {
        $message_status = 'alert-error';
        $message = $error;
    }

    if ($warning) {
        $message_status = 'alert-warning';
        $message = $warning;
    }

    if ($success) {
        $message_status = 'alert-success';
        $message = $success;
    }
?>

<?php if ($success || $warning || $error): ?>
  <div class="alert <?= $message_status; ?> alert-dismissible fade in" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
     </button>
                <?= $message ?>
  </div>
<?php endif ?>
