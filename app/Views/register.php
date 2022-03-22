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
<form method="post" action="<?= base_url('register')?>">
<?= csrf_field() ?>
<h3>Registration Form </h3>
  <div class="conatiner">
    <div class="row">
      <input type="text" name="name" value="<?= old('name') ?>"  placeholder="Enter Name" class="form-control input-lg
             <?php isset($errors['name']) ? 'is-invalide' : 'is-valid' ?>">
            <?php if (isset($errors['name'])) : ?>
                <p class="invalid-feedback d-block">
                    <?php echo $errors['name'] ?>
                </p>

            <?php endif; ?>
    </div>
    <div class="row">
      <input type="text" name="username" value="<?= old('username') ?>"  placeholder="Enter User-Name" class="form-control input-lg
             <?php isset($errors['username']) ? 'is-invalide' : 'is-valid' ?>">
            <?php if (isset($errors['username'])) : ?>
                <p class="invalid-feedback d-block">
                    <?php echo $errors['username'] ?>
                </p>

            <?php endif; ?>
    </div>
  <div class="row">
      <input type="text" name="email" value="<?= old('email') ?>"  placeholder="Enter Email" class="form-control input-lg
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

    
    <div class="row">
      <input type="text" name="address" value="<?= old('address') ?>"  placeholder="Enter Address" class="form-control input-lg
             <?php isset($errors['address']) ? 'is-invalide' : 'is-valid' ?>">
            <?php if (isset($errors['address'])) : ?>
                <p class="invalid-feedback d-block">
                    <?php echo $errors['address'] ?>
                </p>

            <?php endif; ?>
    </div>
    <div class="row">
      <input type="text" name="number" value="<?= old('number') ?>"  placeholder="Enter Mobile-Number" class="form-control input-lg
             <?php isset($errors['number']) ? 'is-invalide' : 'is-valid' ?>">
            <?php if (isset($errors['number'])) : ?>
                <p class="invalid-feedback d-block">
                    <?php echo $errors['number'] ?>
                </p>

            <?php endif; ?>
    </div>
    <input type="submit" class="btn btn-primary" value="Register">
    <input type="submit" class="btn btn-danger" value="cancal">
  </div>
  <div>
      <a href="<?= base_url('login')?>" >Login! If You Have Register </a>
  </div>
</form>









<?php $this->endSection() ?>
