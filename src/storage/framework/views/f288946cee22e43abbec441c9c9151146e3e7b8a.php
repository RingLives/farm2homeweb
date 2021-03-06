<?php if($result['featured']['success']==1): ?>
<section class="products-content">
  <div class="container">
    <div class="products-area">
      <!-- heading -->
      <div class="heading">
        <h2><?php echo app('translator')->getFromJson('website.Top Selling of the Week'); ?>
          <small class="pull-right">
            <a href="<?php echo e(url('/shop?type=topseller')); ?>"><?php echo app('translator')->getFromJson('website.View All'); ?></a>
          </small>
        </h2>
        <hr>
      </div>
      <div class="row">
        <?php if($result['featured']['success']==1): ?>
        <?php $__currentLoopData = $result['featured']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key==0): ?>
            
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
            <?php if($result['weeklySoldProducts']['success']==1): ?>
            <?php $__currentLoopData = $result['weeklySoldProducts']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key<=5): ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
              <!-- Product -->
              <?php echo $__env->make('web.common.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>


      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php /**PATH /var/www/html/farm2homewebnew/farm2homewebnew/src/resources/views/web/product-sections/top.blade.php ENDPATH**/ ?>