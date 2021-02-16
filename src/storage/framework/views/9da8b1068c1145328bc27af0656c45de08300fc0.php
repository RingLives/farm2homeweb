
<?php $__env->startSection('content'); ?>

<section class="aboutus-content aboutus-content-one">
  <div class="container">
    <div class="heading">
      <h2>
      <?=$result['pages'][0]->name?>
      </h2>
      <hr style="margin-bottom: 10;">
    </div>
  <?=stripslashes($result['pages'][0]->description)?>     
  </div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/farm2homewebnew/farm2homewebnew/src/resources/views/web/page.blade.php ENDPATH**/ ?>