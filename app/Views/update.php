<?= $this->extend('Template/base') ?>
<?php

$this->section('title') ?>
Update
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

<?php  if (allowEdit($loginModel['user_id'])): ?>


    <form action="<?= base_url('update/' . $loginModel['id']) ?>" method="post">


        <?= csrf_field() ?>


        <div class="form-group">
            <label>User_id</label>
            <input type="text" name="user_id" value="<?= $loginModel['user_id'] ?>" placeholder="user_id" class="form-control input-lg
             <?php isset($errors['user_id']) ? 'is-invalide' : 'is-valid' ?>">
            <?php if (isset($errors['user_id'])) : ?>
                <p class="invalid-feedback d-block">
                    <?php echo $errors['user_id'] ?>
                </p>
            <?php endif; ?>
   
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="<?= $loginModel['address'] ?>" placeholder="Address" class="form-control input-lg
             <?php isset($errors['address']) ? 'is-invalide' : 'is-valid' ?>">
            <?php if (isset($errors['address'])) : ?>
                <p class="invalid-feedback d-block">
                    <?php echo $errors['address'] ?>
                </p>
            <?php endif; ?>
   
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCountry">Country</label>
                <input type="text" placeholder="Country" name="country" value="<?= $loginModel['country'] ?>" placeholder="Address" class="form-control input-lg
             <?php isset($errors['country']) ? 'is-invalide' : 'is-valid' ?>">
                <?php if (isset($errors['country'])) : ?>
                    <p class="invalid-feedback d-block">
                        <?php echo $errors['country'] ?>
                    </p>

                <?php endif; ?>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" placeholder="City" name="city" value="<?= $loginModel['city'] ?>" class="form-control input-lg
             <?php isset($errors['city']) ? 'is-invalide' : 'is-valid' ?>">
                <?php if (isset($errors['city'])) : ?>
                    <p class="invalid-feedback d-block">
                        <?php echo $errors['city'] ?>
                    </p>

                <?php endif; ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPostelCode">Postel Code</label>
                <input type="text" placeholder="Postel-Code" name="postel_code" value="<?= $loginModel['postel_code'] ?>"" class=" form-control input-lg <?php isset($errors['postel_code']) ? 'is-invalide' : 'is-valid' ?>">
                <?php if (isset($errors['postel_code'])) : ?>
                    <p class="invalid-feedback d-block">
                        <?php echo $errors['postel_code'] ?>
                    </p>

                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="submit" class="btn btn-Danger">Cancal</button>
    </form>

<?php else : ?>
    <h2>
        You are Not LoggedIn
    </h2>
<?php endif; ?>
<?php $this->endSection() ?>