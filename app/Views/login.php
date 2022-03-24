<?= $this->extend('Template/base') ?>
<?php

$this->section('title') ?>
Insertion
<?php $this->endSection() ?>

<?php $this->section('content') ?>



<?php if (session()->getFlashData('message') != null) : ?>
    <div class="alert alert-success">
        <p><?php echo session()->getFlashData('message') ?></p>
    </div>
<?php endif; ?>
<?php $errors = null;
if (session()->getFlashData('errors') != null) :
    $errors = session()->getFlashData('errors');

endif;
// var_dump($errors);

?>


<!-- Main Body -->

<form method="post" action="<?= base_url('/login')?>">
<?= csrf_field() ?>

<h3>Login Form</h3>
  <div class="col">
  <div class="row">
      <input type="email" name="email" value="<?= old('email') ?>"  placeholder="Enter Email" class="form-control input-lg
             <?php isset($errors['email']) ? 'is-invalide' : 'is-valid' ?>">
            <?php if (isset($errors['email'])) : ?>
                <p class="invalid-feedback d-block">
                    <?php echo $errors['email'] ?>
                </p>

            <?php endif; ?>
    </div>
   
    <div class="row">
      <input type="password" name="password" value="<?= old('password') ?>"  placeholder="Enter Password" class="form-control input-lg
             <?php isset($errors['password']) ? 'is-invalide' : 'is-valid' ?>">
            <?php if (isset($errors['password'])) : ?>
                <p class="invalid-feedback d-block">
                    <?php echo $errors['password'] ?>
                </p>

            <?php endif; ?>
    </div>
    
  </div>
  <div>
  <button type="submit" class="btn btn-info">Login</button>
  <button type="submit" class="btn btn-success">Cancal</button>
            </div>
      <a href="<?= base_url('/')?>" >Register! If You aren't </a>

</form>

<?php $this->endSection() ?>
