
<?php $__env->startSection('content'); ?>

<!--Shipping Content -->
<section class="shipping-content">
  <div class="container">
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="row justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->getFromJson('website.Home'); ?></a></li>
                      <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->getFromJson('website.Shipping Address'); ?></li>
                    </ol>
                  </nav>
            </div>
        </div>
      <div class="col-12 col-lg-3">
        <div class="heading">
            <h2>
                <?php echo app('translator')->getFromJson('website.My Account'); ?>
            </h2>
            <hr >
          </div>

        <ul class="list-group">
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/profile')); ?>">
                    <i class="fas fa-user"></i>
                  <?php echo app('translator')->getFromJson('website.Profile'); ?>
                </a>
            </li>
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/wishlist')); ?>">
                    <i class="fas fa-heart"></i>
                 <?php echo app('translator')->getFromJson('website.Wishlist'); ?>
                </a>
            </li>
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/orders')); ?>">
                    <i class="fas fa-shopping-cart"></i>
                  <?php echo app('translator')->getFromJson('website.Orders'); ?>
                </a>
            </li>
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/shipping-address')); ?>">
                    <i class="fas fa-map-marker-alt"></i>
                 <?php echo app('translator')->getFromJson('website.Shipping Address'); ?>
                </a>
            </li>
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/logout')); ?>">
                    <i class="fas fa-power-off"></i>
                  <?php echo app('translator')->getFromJson('website.Logout'); ?>
                </a>
            </li>
          </ul>
      </div>
      <div class="col-12 col-lg-9 ">
          <div class="heading">
              <h2>
                  <?php echo app('translator')->getFromJson('website.Shipping Address'); ?>
              </h2>
              <hr >
            </div>
            <?php if(!empty($result['action']) and $result['action']=='detele'): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                      <?php echo app('translator')->getFromJson('website.Your address has been deteled successfully'); ?>

                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
              <?php endif; ?>

              <?php if(!empty($result['action']) and $result['action']=='default'): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                      <?php echo app('translator')->getFromJson('website.Your address has been changed successfully'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
              <?php endif; ?>
          <table class="table shipping-table">
            <thead>
              <tr>
                <th scope="col"><?php echo app('translator')->getFromJson('website.Default'); ?></th>
                <th scope="col" class="d-none d-md-block"><?php echo app('translator')->getFromJson('website.Action'); ?></th>
              </tr>
            </thead>
            <tbody>
            <?php if(!empty($result['address']) and count($result['address'])>0): ?>
            <?php $__currentLoopData = $result['address']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td >
                  <div class="form-check">
                  <input class="form-check-input default_address" address_id="<?php echo e($address_data->address_id); ?>" type="radio" name="default" <?php if($address_data->default_address == 1): ?> checked <?php endif; ?>>
                  <label class="form-check-label" for="gridCheck">
                    <?php echo e($address_data->full_name ? $address_data->full_name . ',' : ''); ?> <?php echo e($address_data->street ? $address_data->street . ',' : ''); ?> <?php echo e($address_data->city ? $address_data->city . ',' : ''); ?> <?php echo e($address_data->zone_name ? $address_data->zone_name . ',' : ''); ?> <?php echo e($address_data->country_name ? $address_data->country_name . ',' : ''); ?> <?php echo e($address_data->postcode ? $address_data->postcode : ''); ?>

                  </label>
                </div>
              </td>
              <td class="edit-tag">
                <ul>
                  <li><a href="<?php echo e(URL::to('/shipping-address?address_id='.$address_data->address_id)); ?>"> <i class="fas fa-pen"></i> Edit</a></li>
                  <?php if($address_data->default_address == 0): ?>
                  <a  href="<?php echo e(url('delete-address')); ?>/<?php echo e($address_data->address_id); ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                  <?php endif; ?>
                </ul>
                <?php echo $__env->make('web.common.scripts.deleteAddress', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </td>
            </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php else: ?>
            <tr>
                <td valign="center"><?php echo app('translator')->getFromJson('website.Shipping addresses are not added yet'); ?></td>
              </tr>
           <?php endif; ?>
            </tbody>
          </table>
          <h5 class="h5-heading d-block d-md-none mb-1">Personal Information</h5>
          <div class="main-form">
              <form name="addMyAddress" class="form-validate" enctype="multipart/form-data" action="<?php if(!empty($result['editAddress'])): ?><?php echo e(URL::to('/update-address')); ?><?php else: ?><?php echo e(URL::to('/addMyAddress')); ?><?php endif; ?>" method="post">
                <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />

                <?php if(!empty($result['editAddress'])): ?>
                <input type="hidden" name="address_book_id" value="<?php echo e($result['editAddress'][0]->address_id); ?>">
                <?php endif; ?>
                    <?php if( count($errors) > 0): ?>
                       <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="alert alert-danger" role="alert">
                                 <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                 <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                                 <?php echo e($error); ?>

                           </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                  <?php if(session()->has('error')): ?>
                   <div class="alert alert-success">
                       <?php echo e(session()->get('error')); ?>

                   </div>
               <?php endif; ?>
                   <?php if(Session::has('error')): ?>

                       <div class="alert alert-danger" role="alert">
                             <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                             <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                             <?php echo e(session()->get('error')); ?>

                         </div>

                   <?php endif; ?>

                   <?php if(Session::has('error')): ?>
                       <div class="alert alert-danger" role="alert">
                             <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                             <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                             <?php echo session('loginError'); ?>

                       </div>
                   <?php endif; ?>

                   <?php if(session()->has('success') ): ?>
                       <div class="alert alert-success">
                           <?php echo e(session()->get('success')); ?>

                       </div>
                   <?php endif; ?>

                  <?php if(!empty($result['action']) and $result['action']=='update'): ?>
                       <div class="alert alert-success">

                           <?php echo app('translator')->getFromJson('website.Your address has been updated successfully'); ?>
                       </div>
                   <?php endif; ?>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="full_name"><span class="star">*</span><?php echo app('translator')->getFromJson('website.Full Name'); ?></label>

                        <input type="text" name="full_name" class="form-control field-validate" id="full_name" value="<?php echo e($result['editAddress'][0]->full_name ?? old('full_name')); ?>">
                        <span class="help-block error-content7" hidden><?php echo app('translator')->getFromJson('website.Please enter your full name'); ?></span>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="inputcomapnyname"><?php echo app('translator')->getFromJson('website.Address'); ?></label>
                      <input type="text" name="entry_street_address" class="form-control field-validate" id="entry1_street_address" <?php if(!empty($result['editAddress'])): ?> value="<?php echo e($result['editAddress'][0]->street); ?>" <?php endif; ?>>
                      <span class="help-block error-content7" hidden><?php echo app('translator')->getFromJson('website.Please enter your address'); ?></span>
                    </div>

                    

                    

                  </div>

                  <div class="form-row">

                    

                    

                  </div>

                  <div class="form-row">

                    <div class="form-group select-control col-md-6">
                      <label for="inputState"><?php echo app('translator')->getFromJson('website.State'); ?></label>
                      <select required name="entry_zone_id" id="entry_zone_id" class="form-control field-validate">
                          <option value="-1">Others</option>
                          <?php if(!empty($result['zones'])): ?>
                          <?php $__currentLoopData = $result['zones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zones): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($zones->zone_id); ?>" <?php if(!empty($result['editAddress'])): ?> <?php if($zones->zone_id==$result['editAddress'][0]->zone_id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($zones->zone_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                      </select>
                      <span class="help-block error-content6" hidden><?php echo app('translator')->getFromJson('website.Please select your state'); ?></span>
                    </div>

                    <div class="form-group select-control col-md-6">
                      <label for="inputState"><span class="star">*</span> <?php echo app('translator')->getFromJson('website.City'); ?></label>
                      <input type="text" name="entry_city" class="form-control field-validate" id="entry_city1" <?php if(!empty($result['editAddress'])): ?> value="<?php echo e($result['editAddress'][0]->city); ?>" <?php endif; ?>>
                      <span class="help-block error-content7" hidden><?php echo app('translator')->getFromJson('website.Please enter your city'); ?></span>
                    </div>

                  </div>

                  <div class="form-row">

                    <div class="form-group col-md-6">
                      <label for="inputaddress"><span class="star">*</span> <?php echo app('translator')->getFromJson('website.Zip/Postal Code'); ?></label>
                      <input type="text" name="entry_postcode" class="form-control field-validate" id="entry_postcode1" <?php if(!empty($result['editAddress'])): ?> value="<?php echo e($result['editAddress'][0]->postcode); ?>" <?php endif; ?>>
                      <span class="help-block error-content7" hidden><?php echo app('translator')->getFromJson('website.Please enter your Zip/Postal Code'); ?></span>
                    </div>

                  </div>
                  <div class="button">
                  <?php if(!empty($result['editAddress'])): ?>
                      <a href="<?php echo e(URL::to('/shipping-address')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('website.cancel'); ?></a>
                  <?php endif; ?>
                      <button type="submit" class="btn btn-dark"><?php if(!empty($result['editAddress'])): ?>  <?php echo app('translator')->getFromJson('website.Update'); ?>  <?php else: ?> <?php echo app('translator')->getFromJson('website.Add Address'); ?> <?php endif; ?> </button>
                  </div>
                </form>
          </div>
        <!-- ............the end..... -->
      </div>
    </div>
  </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxproit/farm2home/src/resources/views/web/shipping.blade.php ENDPATH**/ ?>