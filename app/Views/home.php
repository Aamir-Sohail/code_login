<?= $this->extend('Template/base') ?>

<?php $this->section('content') ?>
<?php if (session()->getFlashData('message') != null) : ?>
  <div class="alert alert-success">
    <p><?php echo session()->getFlashData('message') ?></p>
  </div>
<?php endif; ?>


<a href="<?= base_url('logout')?>" input type="submit">LogOut</a>


<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <div class="col">
        <h5>Add Address</h5>
<a href="<?= base_url('/insert')?>" ?><img src="<?= base_url('/assets/add.png') ?>" width="20" alt=""></a>
    </div>     
      </div>
    </div>
      <div class="col-lg-12">
        
        <div class="row">
        
        <?php foreach ($data as $items) :  ?>
        <div class="col-6">
          <div class="d-flex justify-content-between">
          Address ID
                <?= $items['id'] ?>
             

          
                <!-- <form action="<?= base_url('delete/ ' . $items['id']) ?>" method="post">
                <button type="submit">
                  <img src="<?= base_url('/assets/cross.png') ?>" width="20" alt="">
                </button>
                <input type="hidden" name="method" value="DELETE">
              </form> -->

                
    <a href="<?= base_url('delete/' . $items['id']) ?>" ?><img src="<?= base_url('/assets/cross.png') ?>" width="20" alt=""></a>
    <a href="<?= base_url('update/' . $items['id']) ?>" ?><img src="<?= base_url('/assets/refresh-line.png') ?>" width="20" alt=""></a>


          </div>
          <div class="card">

          
          <?php echo $items['address'] ?>
                <?php echo $items['country'] ?>
                <?php echo $items['city'] ?>
                <?php echo $items['postel_code'] ?>
               
          </div>
        </div>
      
        <?php endforeach; ?>
      
      </div>
      
     
  
  </div>
</div>

</div>

<?php $this->endSection() ?>
