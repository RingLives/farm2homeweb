<!-- contact Content -->
<section class="contact-content contact-one-content">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
          <div class="row justify-content-end">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->getFromJson('website.Home'); ?></a></li>

                    <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->getFromJson('website.Contact Us'); ?></li>
                  </ol>
                </nav>
          </div>
      </div>
      <div class="col-12 col-sm-12">
        <div class="row">

          <div class="col-12 col-lg-3">
              <div class="heading">
                  <h2>
                   <?php echo app('translator')->getFromJson('website.Contact Us'); ?>
                  </h2>
                  <hr style="margin-bottom: 0;">
                </div>
              <div class="">
                  <ul class="contact-info pl-0 mb-0"  >
                      <li> <i class="fas fa-mobile-alt"></i><span><?php echo e($result['commonContent']['setting'][11]->value); ?></span> </li>
                      <li> <i class="fas fa-map-marker"></i><span><?php echo e($result['commonContent']['setting'][4]->value); ?> <?php echo e($result['commonContent']['setting'][5]->value); ?> <?php echo e($result['commonContent']['setting'][6]->value); ?>, <?php echo e($result['commonContent']['setting'][7]->value); ?> <?php echo e($result['commonContent']['setting'][8]->value); ?></span> </li>
                      <li> <i class="fas fa-envelope"></i><span> <a href="mailto:<?php echo e($result['commonContent']['setting'][3]->value); ?>"><?php echo e($result['commonContent']['setting'][3]->value); ?></a><br><a href="#"><?php echo e($result['commonContent']['setting'][3]->value); ?></a> </span> </li>
                      <li> <i class="fas fa-tty"></i><span><a href="mailto:<?php echo e($result['commonContent']['setting'][3]->value); ?>"><?php echo e($result['commonContent']['setting'][3]->value); ?></a> </span> </li>

                    </ul>
                </div>

                <div class="socials">
                    <div class="heading">
                        <h2>
                         <?php echo app('translator')->getFromJson('website.Follow Us'); ?>
                        </h2>
                        <hr style="margin-bottom: 0;">
                      </div>
                      <ul class="list">
                        <li>
                            <?php if(!empty($result['commonContent']['setting'][50]->value)): ?>
                              <a href="<?php echo e($result['commonContent']['setting'][50]->value); ?>" class="fab fa-facebook-f" target="_blank"></a>
                              <?php else: ?>
                                <a href="#" class="fab fa-facebook-f"></a>
                              <?php endif; ?>
                          </li>
                          <li>
                          <?php if(!empty($result['commonContent']['setting'][52]->value)): ?>
                              <a href="<?php echo e($result['commonContent']['setting'][52]->value); ?>" class="fab fa-twitter" target="_blank"></a>
                          <?php else: ?>
                              <a href="#" class="fab fa-twitter"></a>
                          <?php endif; ?></li>
                          <li>
                          <?php if(!empty($result['commonContent']['setting'][51]->value)): ?>
                              <a href="<?php echo e($result['commonContent']['setting'][51]->value); ?>" class="fab fa-google" target="_blank"></a>
                          <?php else: ?>
                              <a href="#" class="fab fa-google"></a>
                          <?php endif; ?>
                          </li>
                          <li>
                          <?php if(!empty($result['commonContent']['setting'][53]->value)): ?>
                              <a href="<?php echo e($result['commonContent']['setting'][53]->value); ?>" class="fab fa-linkedin-in" target="_blank"></a>
                          <?php else: ?>
                              <a href="#" class="fab fa-linkedin-in"></a>
                          <?php endif; ?>
                          </li>
                      </ul>
                </div>

          </div>
          <div class="col-12 col-lg-5">
              <div class="heading">
                  <h2>
                   OUR LOCATION
                  </h2>
                  <hr style="margin-bottom: 0;">
                </div>
                <div id="map" style="height:400px; margin:15px auto;">

                </div>
                <script>
                  var map;
                  function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                      center: {lat: -34.397, lng: 150.644},
                      zoom: 8
                    });
                  }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
                async defer></script>
                <p>
                    <?php echo e($result['commonContent']['setting'][112]->value); ?>

                </p>
          </div>
          <div class="col-12 col-lg-4">
              <div class="heading">
                  <h2>
                   WRITE US
                  </h2>
                  <hr style="margin-bottom: 0;">
                </div>
                <div class="form-start">
                  <?php if( count($errors) > 0): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                        <?php echo e($error); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>

                  <?php if(session()->has('success') ): ?>
                     <div class="alert alert-success">
                         <?php echo e(session()->get('success')); ?>

                     </div>
                  <?php endif; ?>
                  <?php if(session()->has('error') ): ?>
                     <div class="alert alert-danger">
                         <?php echo e(session()->get('error')); ?>

                     </div>
                  <?php endif; ?>
                    <form enctype="multipart/form-data" action="<?php echo e(URL::to('/processContactUs')); ?>" method="post">
                      <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">

                      <div class="form-group">
                        <label class="first-label" for="name"><?php echo app('translator')->getFromJson('website.Full Name'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo app('translator')->getFromJson('website.Please enter your name'); ?>" aria-describedby="inputGroupPrepend">
                            <span class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your name'); ?></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="phone"><?php echo app('translator')->getFromJson('Phone'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="phone"  name="phone" class="form-control" id="validationCustomUsername" placeholder="Enter Phone here.." aria-describedby="inputGroupPrepend">
                            <span class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your valid phone number'); ?></span>
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label for="email"><?php echo app('translator')->getFromJson('website.Message'); ?></label>
                        <textarea type="text" name="message"  placeholder="write your message here..." rows="5" cols="56"></textarea>
                        <span class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your message'); ?></span>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-secondary"><?php echo app('translator')->getFromJson('website.Send'); ?> <i class="fas fa-location-arrow"></i></button>
                      </div>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<?php /**PATH /var/www/html/farm2homewebnew/farm2homewebnew/src/resources/views/web/contacts/contact1.blade.php ENDPATH**/ ?>