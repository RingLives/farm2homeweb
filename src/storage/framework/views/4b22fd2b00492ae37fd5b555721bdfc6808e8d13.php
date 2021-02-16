<?php $__env->startSection('content'); ?>

<!-- checkout Content -->
<section class="checkout-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <div class="row justify-content-end">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->getFromJson('website.Home'); ?></a></li>
                 <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo app('translator')->getFromJson('website.Checkout'); ?></a></li>
                 <li class="breadcrumb-item">
                   <a href="javascript:void(0)">
                     <?php if(session('step')==0): ?>
                           <?php echo app('translator')->getFromJson('website.Shipping Address'); ?>
                         <?php elseif(session('step')==1): ?>
                           <?php echo app('translator')->getFromJson('website.Billing Address'); ?>
                         <?php elseif(session('step')==2): ?>
                           <?php echo app('translator')->getFromJson('website.Shipping Methods'); ?>
                         <?php elseif(session('step')==3): ?>
                           <?php echo app('translator')->getFromJson('website.Order Detail'); ?>
                         <?php endif; ?>
                   </a>
                 </li>
               </ol>
            </nav>
         </div>
     </div>
     <div class="col-12 col-xl-9 checkout-left">
       <input type="hidden" id="hyperpayresponse" value="<?php if(!empty(session('paymentResponse'))): ?> <?php if(session('paymentResponse')=='success'): ?> <?php echo e(session('paymentResponse')); ?> <?php else: ?> <?php echo e(session('paymentResponse')); ?>  <?php endif; ?> <?php endif; ?>">
       <div class="alert alert-danger alert-dismissible" id="paymentError" role="alert" style="display:none;">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <?php if(!empty(session('paymentResponse')) and session('paymentResponse')=='error'): ?> <?php echo e(session('paymentResponseData')); ?> <?php endif; ?>
       </div>
         <div class="row">
           <div class="checkout-module">
             <ul class="nav nav-pills mb-3 checkoutd-nav d-none d-lg-flex" id="pills-tab" role="tablist">
                 <li class="nav-item">
                   <a class="nav-link <?php if(session('step')==0): ?> active <?php elseif(session('step')>0): ?> active-check <?php endif; ?>" id="pills-shipping-tab" data-toggle="pill" href="#pills-shipping" role="tab" aria-controls="pills-shipping" aria-selected="true"><?php echo app('translator')->getFromJson('website.Shipping Address'); ?></a>
                 </li>
                 
                 <li class="nav-item">
                   <a class="nav-link <?php if(session('step')==2): ?> active <?php elseif(session('step')>2): ?> active-check <?php endif; ?>" <?php if(session('step')>=2): ?> id="pills-method-tab" data-toggle="pill" href="#pills-method" role="tab" aria-controls="pills-method" aria-selected="false" <?php endif; ?>> <?php echo app('translator')->getFromJson('website.Shipping Methods'); ?></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link <?php if(session('step')==3): ?> active <?php elseif(session('step')>3): ?> active-check <?php endif; ?>"  <?php if(session('step')>=3): ?> id="pills-order-tab" data-toggle="pill" href="#pills-order" role="tab" aria-controls="pills-order" aria-selected="false"<?php endif; ?>><?php echo app('translator')->getFromJson('website.Order Detail'); ?></a>
                   </li>
               </ul>
               <ul class="nav nav-pills mb-3 checkoutm-nav d-flex d-lg-none" id="pills-tab" role="tablist">
                 <li class="nav-item">
                   <a class="nav-link <?php if(session('step')==0): ?> active <?php elseif(session('step')>0): ?> active-check <?php endif; ?>" id="pills-shipping-tab" data-toggle="pill" href="#pills-shipping" role="tab" aria-controls="pills-shipping" aria-selected="true">1</a>
                 </li>
                 <li class="nav-item second">
                   <a class="nav-link <?php if(session('step')==1): ?> active <?php elseif(session('step')>1): ?> active-check <?php endif; ?>" <?php if(session('step')>=1): ?> id="pills-billing-tab" data-toggle="pill" href="#pills-billing" role="tab" aria-controls="pills-billing" aria-selected="false"  <?php endif; ?> >2</a>
                 </li>
                 <li class="nav-item third">
                   <a class="nav-link <?php if(session('step')==2): ?> active <?php elseif(session('step')>2): ?> active-check <?php endif; ?>" <?php if(session('step')>=2): ?> id="pills-method-tab" data-toggle="pill" href="#pills-method" role="tab" aria-controls="pills-method" aria-selected="false" <?php endif; ?>>3</a>
                 </li>
                 <li class="nav-item fourth">
                   <a class="nav-link <?php if(session('step')==3): ?> active <?php elseif(session('step')>3): ?> active-check <?php endif; ?>"  <?php if(session('step')>=3): ?> id="pills-order-tab" data-toggle="pill" href="#pills-order" role="tab" aria-controls="pills-order" aria-selected="false"<?php endif; ?>>4</a>
                   </li>
               </ul>

               <div class="tab-content" id="pills-tabContent">

                 <div class="tab-pane fade <?php if(session('step') == 0): ?> show active <?php endif; ?>" id="pills-shipping" role="tabpanel" aria-labelledby="pills-shipping-tab">

                   <form name="signup" enctype="multipart/form-data" class="form-validate"  action="<?php echo e(URL::to('/checkout_shipping_address')); ?>" method="post">

                     <input type="hidden" required name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />

                     <div class="form-group">
                       <label for="full_name"><?php echo app('translator')->getFromJson('Shipping Address'); ?></label>
                        <?php if(isset($result['address'])): ?>
                          <textarea name="shipping_address_list" style="display: none;"><?php echo e($result['address']); ?></textarea>
                        <?php endif; ?>
                       <select class="form-control" id="shipping_address_list" name="shiping_address_check">
                         <option value="">--Select--</option>
                         <?php if(isset($result['address'])): ?>
                          <?php $__currentLoopData = $result['address']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($address->address_id); ?>" <?php echo e($address->default_address == 1 ? 'selected' : ''); ?>><?php echo e($address->full_name ? $address->full_name . ',' : ''); ?> <?php echo e($address->street ? $address->street . ',' : ''); ?> <?php echo e($address->city ? $address->city . ',' : ''); ?> <?php echo e($address->zone_name ? $address->zone_name . ',' : ''); ?> <?php echo e($address->country_name ? $address->country_name . ',' : ''); ?> <?php echo e($address->postcode ? $address->postcode : ''); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php endif; ?>
                         <option value="other">Other</option>
                        </select>

                          <span style="color:red;" class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your Full name'); ?></span>
                     </div>

                     <div class="form-group">
                       <label for="full_name"><?php echo app('translator')->getFromJson('Full Name'); ?></label>
                       <input 
                          type="text"
                          required
                          class="form-control field-validate"
                          id="full_name"
                          name="full_name"
                          value="<?php if(!empty(session('shipping_address'))>0): ?><?php echo e(session('shipping_address')->full_name); ?><?php endif; ?>"
                          aria-describedby="NameHelp1"
                          placeholder="Enter Your Full Name">

                          <span style="color:red;" class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your Full name'); ?></span>
                     </div>

                     

                     <?php if(Session::get('guest_checkout') == 1){ ?>

                      
                     <?php } ?>

                     

                     

                     <div class="form-group">
                       <label for="exampleSelectState1"><?php echo app('translator')->getFromJson('website.State'); ?></label>
                       <div class="select-control">
                           <select required class="form-control field-validate" id="entry_zone_id"  name="zone_id" aria-describedby="stateHelp">
                             <option value=""><?php echo app('translator')->getFromJson('website.Select State'); ?></option>
                              <?php if(!empty($result['zones'])>0): ?>
                               <?php $__currentLoopData = $result['zones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zones): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($zones->zone_id); ?>" <?php if(!empty(session('shipping_address'))>0): ?> <?php if(session('shipping_address')->zone_id == $zones->zone_id): ?> selected <?php endif; ?> <?php endif; ?> ><?php echo e($zones->zone_name); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php endif; ?>

                              <option value="-1" <?php if(!empty(session('shipping_address'))>0): ?> <?php if(session('shipping_address')->zone_id == 'Other'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo app('translator')->getFromJson('website.Other'); ?></option>
                             </select>
                       </div>
                        <small id="stateHelp" class="form-text text-muted"></small>
                       </div>
                       <div class="form-group">
                           <label for="exampleSelectCity1">City</label>
                           <input required type="text" class="form-control field-validate" id="city" name="city" value="<?php if(!empty(session('shipping_address'))>0): ?><?php echo e(session('shipping_address')->city); ?><?php endif; ?>" placeholder="Enter Your City">
                           <span style="color:red;" class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your city'); ?></span>
                       </div>
                       <div class="form-group">
                         <label for="exampleInputZpCode1"><?php echo app('translator')->getFromJson('website.Zip/Postal Code'); ?></label>
                         <input required type="number" class="form-control" id="postcode" aria-describedby="zpcodeHelp" placeholder="Enter Your Zip / Postal Code" name="postcode" value="<?php if(!empty(session('shipping_address'))>0): ?><?php echo e(session('shipping_address')->postcode); ?><?php endif; ?>">
                         <span style="color:red;" class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your Zip/Postal Code'); ?></span>
                       </div>
                       <div class="form-group">
                         <label for="exampleInputNumber1"><?php echo app('translator')->getFromJson('website.Phone Number'); ?></label>
                         <input required type="text" class="form-control" id="delivery_phone" aria-describedby="numberHelp" placeholder="Enter Your Phone Number" name="delivery_phone" value="<?php if(!empty(session('shipping_address'))>0): ?><?php echo e(session('shipping_address')->delivery_phone ?? ''); ?><?php endif; ?>">
                         <span style="color:red;" class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your valid phone number'); ?></span>
                       </div>

                       <div class="form-group">
                         <label for="exampleInputAddress1"><?php echo app('translator')->getFromJson('website.Address'); ?></label>
                         
                         <textarea
                           required
                           class="form-control field-validate"
                           name="street"
                           id="street"
                           aria-describedby="addressHelp"
                           placeholder="<?php echo app('translator')->getFromJson('website.Please enter your address'); ?>"
                          ><?php if(!empty(session('shipping_address'))>0): ?><?php echo e(session('shipping_address')->address ?? session('shipping_address')->street); ?><?php endif; ?>
                        </textarea>

                         <span style="color:red;" class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your address'); ?></span>
                       </div>

                       <div class="col-12 col-sm-12">
                         <div class="row">
                           <button type="submit"  class="btn btn-secondary"><?php echo app('translator')->getFromJson('website.Continue'); ?></button>
                         </div>
                       </div>
                   </form>
                 </div>
                 
                

                  <div class="tab-pane fade  <?php if(session('step') == 2): ?> show active <?php endif; ?>" id="pills-method" role="tabpanel" aria-labelledby="pills-method-tab">

                    <div class="col-12 col-sm-12 ">
                      <div class="row"> <p><?php echo app('translator')->getFromJson('website.Please select a prefered shipping method to use on this order'); ?></p></div>
                    </div>

                    <form name="shipping_mehtods" method="post" id="shipping_mehtods_form" enctype="multipart/form-data" action="<?php echo e(URL::to('/checkout_payment_method')); ?>">
                      <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>" />
                      <?php if(!empty($result['shipping_methods'])>0): ?>
                        <input type="hidden" name="mehtod_name" id="mehtod_name">
                        <input type="hidden" name="shipping_price" id="shipping_price">

                          <?php $__currentLoopData = $result['shipping_methods']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping_methods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="heading">
                              <h2><?php echo e($shipping_methods['name']); ?></h2>
                              <hr>
                            </div>
                            <div class="form-check">
                              <div class="form-row">
                                 <?php if($shipping_methods['success']==1): ?>
                                 <ul class="list"style="list-style:none; padding: 0px;">
                                    <?php $__currentLoopData = $shipping_methods['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php
                                          if($services['shipping_method']=='upsShipping')
                                             $method_name=$shipping_methods['name'].'('.$services['name'].')';
                                          else{
                                             $method_name=$services['name'];
                                             }
                                         ?>
                                         <li>
                                           <?php
                                           $default_currency = DB::table('currencies')->where('is_default',1)->first();
                                           if($default_currency->id == Session::get('currency_id')){

                                             $currency_value = 1;
                                           }else{
                                             $session_currency = DB::table('currencies')->where('id',Session::get('currency_id'))->first();

                                             $currency_value = $session_currency->value;
                                           }
                                           ?>

                                          <input
                                            class="shipping_data"
                                            id="<?php echo e(str_replace(" ", "_", $method_name)); ?>"
                                            type="radio"
                                            name="shipping_method"
                                            value="<?php echo e($services['shipping_method']); ?>" shipping_price="<?php echo e($services['rate']); ?>" 
                                            method_name="<?php echo e($method_name); ?>" 
                                            <?php if(!empty(session('shipping_detail'))): ?>
                                              <?php if(session('shipping_detail')->mehtod_name == $method_name): ?>
                                                checked
                                              <?php endif; ?>
                                            <?php elseif($shipping_methods['is_default'] == 1 ): ?>
                                              checked
                                            <?php endif; ?>
                                          />
                                          <label for="<?php echo e(str_replace(" ", "_", $method_name)); ?>"><?php echo e($services['name']); ?> --- <?php echo e(Session::get('symbol_left')); ?><?php echo e($services['rate'] * $currency_value); ?><?php echo e(Session::get('symbol_right')); ?></label>
                                         </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </ul>
                                 <?php else: ?>
                                     <ul class="list"style="list-style:none; padding: 0px;">
                                         <li><?php echo app('translator')->getFromJson('website.Your location does not support this'); ?> <?php echo e($shipping_methods['name']); ?>.</li>
                                     </ul>
                                 <?php endif; ?>
                              </div>
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                      <div class="alert alert-danger alert-dismissible error_shipping" role="alert" style="display:none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo app('translator')->getFromJson('website.Please select your shipping method'); ?>
                      </div>
                      <div class="row">
                        <button type="submit"class="btn btn-secondary"><span>CONTINUE<i class="fas fa-caret-right"></i></span></button>
                      </div>
                    </form>
                 </div>
                 <div class="tab-pane fade <?php if(session('step') == 3): ?> show active <?php endif; ?>" id="pills-order" role="tabpanel" aria-labelledby="pills-method-order">
                               <?php
                                   $price = 0;
                               ?>
                               <form method='POST' id="update_cart_form" action='<?php echo e(URL::to('/place_order')); ?>' >
                                 <?php echo csrf_field(); ?>


                                       <table class="table top-table">
                                           <thead>
                                               <tr class="d-flex">
                                                   <th class="col-12 col-md-2"><?php echo app('translator')->getFromJson('website.items'); ?></th>
                                                   <th class="col-12 col-md-4"></th>
                                                   <th class="col-12 col-md-2"><?php echo app('translator')->getFromJson('website.Price'); ?></th>
                                                   <th class="col-12 col-md-2"><?php echo app('translator')->getFromJson('website.Qty'); ?></th>
                                                   <th class="col-12 col-md-2"><?php echo app('translator')->getFromJson('website.SubTotal'); ?></th>
                                               </tr>
                                           </thead>

                                           <?php $__currentLoopData = $result['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <?php
                                              $default_currency = DB::table('currencies')->where('is_default',1)->first();
                                              if($default_currency->id == Session::get('currency_id')){
                                                $orignal_price = $products->final_price;
                                              }else{
                                                $session_currency = DB::table('currencies')->where('id',Session::get('currency_id'))->first();
                                                $orignal_price = $products->final_price * $session_currency->value;
                                              }

                                               $price+= $orignal_price * $products->customers_basket_quantity;
                                           ?>

                                           <tbody>
                                               <tr class="d-flex">
                                                   <td class="col-12 col-md-2 item">
                                                       <input type="hidden" name="cart[]" value="<?php echo e($products->customers_basket_id); ?>">
                                                         <a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>" class="cart-thumb">
                                                             <img class="img-fluid" src="<?php echo e(asset('').$products->image_path); ?>" alt="<?php echo e($products->products_name); ?>" alt="">
                                                         </a>
                                                   </td>
                                                   <td class="col-12 col-md-4 item-detail-left">
                                                     <div class="item-detail">
                                                         <h4><?php echo e($products->products_name); ?></h4>
                                                         <div class="item-attributes"></div>
                                                       </div>
                                                   </td>

                                                   <?php
                                                      $default_currency = DB::table('currencies')->where('is_default',1)->first();
                                                      if($default_currency->id == Session::get('currency_id')){
                                                        $orignal_price = $products->final_price;
                                                      }else{
                                                        $session_currency = DB::table('currencies')->where('id',Session::get('currency_id'))->first();
                                                        $orignal_price = $products->final_price * $session_currency->value;
                                                      }
                                                   ?>

                                                   <td class="item-price col-12 col-md-2"><span><?php echo e(Session::get('symbol_left')); ?><?php echo e($orignal_price+0); ?><?php echo e(Session::get('symbol_right')); ?></span></td>
                                                   <td class="col-12 col-md-2">
                                                     <div class="input-group item-quantity">

                                                       <input type="text" id="quantity" readonly name="quantity" class="form-control input-number" value="<?php echo e($products->customers_basket_quantity); ?>">

                                                   </td>
                                                   <td class="align-middle item-total col-12 col-md-2 subtotal" align="center"><span class="cart_price_<?php echo e($products->customers_basket_id); ?>"><?php echo e(Session::get('symbol_left')); ?><?php echo e($orignal_price * $products->customers_basket_quantity); ?><?php echo e(Session::get('symbol_right')); ?></span>
                                                   </td>
                                               </tr>
                                               <tr class="d-flex">
                                                   <td class="col-12 col-md-2 p-0">
                                                     <div class="item-controls">
                                                         <button  type="button" class="btn" >
                                                             <a  href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>"><span class="fas fa-pencil-alt"></span></a>
                                                         </button>
                                                         <button  type="button" class="btn" >
                                                             <a href="<?php echo e(URL::to('/deleteCart?id='.$products->customers_basket_id)); ?>"><span class="fas fa-times"></span></a>
                                                         </button>
                                                     </div>
                                                   </td>
                                                   <td class="col-12 col-md-10 d-none d-md-block"></td>
                                               </tr>

                                           </tbody>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </table>
                                        <?php
                                           if(!empty(session('shipping_detail')) and !empty(session('shipping_detail'))>0){
                                               $shipping_price = session('shipping_detail')->shipping_price;
                                            $shipping_name = session('shipping_detail')->mehtod_name;
                                           }else{
                                               $shipping_price = 0;
                                            $shipping_name = '';
                                           }
                                           $tax_rate = number_format((float)session('tax_rate'), 2, '.', '');
                                           $coupon_discount = number_format((float)session('coupon_discount'), 2, '.', '');
                                           $total_price = ($price+$tax_rate+$shipping_price)-$coupon_discount;
                                           session(['total_price'=>$total_price]);

                                        ?>
                               </form>
                                   <div class="col-12 col-sm-12">
                                       <div class="row">
                                         <div class="heading">
                                           <h2><?php echo app('translator')->getFromJson('website.orderNotesandSummary'); ?></h2>
                                           <hr>
                                         </div>
                                         <div class="form-group" style="width:100%; padding:0;">
                                             <label for="exampleFormControlTextarea1"><?php echo app('translator')->getFromJson('website.Please write notes of your order'); ?></label>
                                             <textarea name="comments" class="form-control" id="order_comments" rows="3"><?php if(!empty(session('order_comments'))): ?><?php echo e(session('order_comments')); ?><?php endif; ?></textarea>
                                           </div>
                                       </div>

                                   </div>
                                   <div class="col-12 col-sm-12 mb-3">
                                       <div class="row">
                                         <div class="heading">
                                           <h2><?php echo app('translator')->getFromJson('website.Payment Methods'); ?></h2>
                                           <hr>
                                         </div>

                                           <div class="form-group" style="width:100%; padding:0;">
                                               <p class="title"><?php echo app('translator')->getFromJson('website.Please select a prefered payment method to use on this order'); ?></p>

                                               <div class="alert alert-danger error_payment" style="display:none" role="alert">
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                   <?php echo app('translator')->getFromJson('website.Please select your payment method'); ?>
                                               </div>

                                               <form name="shipping_mehtods" method="post" id="payment_mehtods_form" enctype="multipart/form-data" action="<?php echo e(URL::to('/order_detail')); ?>">
                                                 <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
                                                   <ul class="list"style="list-style:none; padding: 0px;">
                                                       <?php $__currentLoopData = $result['payment_methods']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_methods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <?php if($payment_methods['active']==1): ?>
                                                               <input id="payment_currency" type="hidden" onClick="paymentMethods();" name="payment_currency" value="<?php echo e($payment_methods['payment_currency']); ?>">
                                                               <?php if($payment_methods['payment_method']=='braintree'): ?>

                                                                   <input id="<?php echo e($payment_methods['payment_method']); ?>_public_key" type="hidden" name="public_key" value="<?php echo e($payment_methods['public_key']); ?>">
                                                                   <input id="<?php echo e($payment_methods['payment_method']); ?>_environment" type="hidden" name="<?php echo e($payment_methods['payment_method']); ?>_environment" value="<?php echo e($payment_methods['environment']); ?>">
                                                                   <li>
                                                                    <input type="radio" onClick="paymentMethods();" name="payment_method" class="payment_method" value="<?php echo e($payment_methods['payment_method']); ?>" <?php if(!empty(session('payment_method'))): ?> <?php if(session('payment_method')==$payment_methods['payment_method']): ?> checked <?php endif; ?> <?php endif; ?>>
                                                                       <label for="<?php echo e($payment_methods['payment_method']); ?>"><?php echo e($payment_methods['name']); ?></label>
                                                                   </li>

                                                               <?php else: ?>
                                                                   <input id="<?php echo e($payment_methods['payment_method']); ?>_public_key" type="hidden" name="public_key" value="<?php echo e($payment_methods['public_key']); ?>">
                                                                   <input id="<?php echo e($payment_methods['payment_method']); ?>_environment" type="hidden" name="<?php echo e($payment_methods['payment_method']); ?>_environment" value="<?php echo e($payment_methods['environment']); ?>">

                                                                   <li>
                                                                    <input onClick="paymentMethods();" type="radio" name="payment_method" class="payment_method" value="<?php echo e($payment_methods['payment_method']); ?>" <?php if(!empty(session('payment_method'))): ?> <?php if(session('payment_method')==$payment_methods['payment_method']): ?> checked <?php endif; ?> <?php endif; ?>>
                                                                    <label for="<?php echo e($payment_methods['payment_method']); ?>"><?php echo e($payment_methods['name']); ?></label>
                                                                   </li>
                                                               <?php endif; ?>

                                                           <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   </ul>
                                               </form>
                                           </div>
                                           <div class="button">

                                             <!--- paypal -->
                                             <div id="paypal_button" class="payment_btns" style="display: none"></div>

                                             <button id="braintree_button" style="display: none" class="btn btn-dark payment_btns" data-toggle="modal" data-target="#braintreeModel" ><?php echo app('translator')->getFromJson('website.Order Now'); ?></button>

                                             <button id="stripe_button" class="btn btn-dark payment_btns" style="display: none" data-toggle="modal" data-target="#stripeModel" ><?php echo app('translator')->getFromJson('website.Order Now'); ?></button>

                                             <button id="cash_on_delivery_button" class="btn btn-dark payment_btns" style="display: none"><?php echo app('translator')->getFromJson('website.Order Now'); ?></button>
                                             <button id="instamojo_button" class="btn btn-dark payment_btns" style="display: none" data-toggle="modal" data-target="#instamojoModel"><?php echo app('translator')->getFromJson('website.Order Now'); ?></button>

                                             <a href="<?php echo e(URL::to('/checkout/hyperpay')); ?>" id="hyperpay_button" class="btn btn-dark payment_btns" style="display: none"><?php echo app('translator')->getFromJson('website.Order Now'); ?></a>

                                          </div>
                                       </div>
                                       <!-- The braintree Modal -->
                                       <div class="modal fade" id="braintreeModel">
                                         <div class="modal-dialog">
                                           <div class="modal-content">
                                               <form id="checkout" method="post" action="<?php echo e(URL::to('/place_order')); ?>">
                                                 <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
                                                   <!-- Modal Header -->
                                                   <div class="modal-header">
                                                       <h4 class="modal-title"><?php echo app('translator')->getFromJson('website.BrainTree Payment'); ?></h4>
                                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   </div>
                                                   <div class="modal-body">
                                                         <div id="payment-form"></div>
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="submit" class="btn btn-dark"><?php echo app('translator')->getFromJson('website.Pay'); ?> <?php echo e(Session::get('symbol_left')); ?><?php echo e(number_format((float)$total_price+0, 2, '.', '')); ?><?php echo e(Session::get('symbol_right')); ?></button>
                                                   </div>
                                               </form>
                                           </div>
                                          </div>
                                       </div>

                                       <!-- The instamojo Modal -->
                                       <div class="modal fade" id="instamojoModel">
                                         <div class="modal-dialog">
                                           <div class="modal-content">
                                               <form id="instamojo_form" method="post" action="">
                                                 <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
                                                 <input type="hidden" name="amount" value="<?php echo e(number_format((float)$total_price+0, 2, '.', '')); ?>">
                                                   <!-- Modal Header -->
                                                   <div class="modal-header">
                                                       <h4 class="modal-title"><?php echo app('translator')->getFromJson('website.Instamojo Payment'); ?></h4>
                                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   </div>
                                                  <div class="modal-body">
                                                    <div class="from-group mb-3">
                                    									<div class="col-12"> <label for="inlineFormInputGroup"><?php echo app('translator')->getFromJson('website.Full Name'); ?></label></div>
                                    									<div class="input-group col-12">
                                    										<input type="text" name="firstName" id="firstName" placeholder="<?php echo app('translator')->getFromJson('website.Full Name'); ?>" class="form-control">
                                    										<span class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your full name'); ?></span>
                                    								 </div>
                                    								</div>
                                                    <div class="from-group mb-3">
                                    									<div class="col-12"> <label for="inlineFormInputGroup"><?php echo app('translator')->getFromJson('website.Email'); ?></label></div>
                                    									<div class="input-group col-12">
                                    										<input type="text" name="email_id" id="email_id" placeholder="<?php echo app('translator')->getFromJson('website.Email'); ?>" class="form-control">
                                    										<span class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your email address'); ?></span>
                                    								 </div>
                                    								</div>
                                                    <div class="from-group mb-3">
                                    									<div class="col-12"> <label for="inlineFormInputGroup"><?php echo app('translator')->getFromJson('website.Phone Number'); ?></label></div>
                                    									<div class="input-group col-12">
                                    										<input type="text" name="phone_number" id="insta_phone_number" placeholder="<?php echo app('translator')->getFromJson('website.Phone Number'); ?>" class="form-control">
                                    										<span class="help-block error-content" hidden><?php echo app('translator')->getFromJson('website.Please enter your valid phone number'); ?></span>
                                    								 </div>
                                    								</div>

                                                        <div class="alert alert-danger alert-dismissible" id="insta_mojo_error" role="alert" style="display: none">
                                                           <span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
                                                           <span id="instamojo-error-text"></span>
                                                       </div>
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="button" id="pay_instamojo" class="btn btn-dark"><?php echo app('translator')->getFromJson('website.Pay'); ?> <?php echo e($web_setting[19]->value); ?><?php echo e(number_format((float)$total_price+0, 2, '.', '')); ?></button>
                                                   </div>
                                               </form>
                                           </div>
                                          </div>
                                       </div>

                       <!-- The stripe Modal -->
                       <div class="modal fade" id="stripeModel">
                           <div class="modal-dialog">
                               <div class="modal-content">

                               <main>
                               <div class="container-lg">
                                   <div class="cell example example2">
                                       <form>
                                         <div class="row">
                                           <div class="field">
                                             <div id="example2-card-number" class="input empty"></div>
                                             <label for="example2-card-number" data-tid="elements_examples.form.card_number_label"><?php echo app('translator')->getFromJson('website.Card number'); ?></label>
                                             <div class="baseline"></div>
                                           </div>
                                         </div>
                                         <div class="row">
                                           <div class="field half-width">
                                             <div id="example2-card-expiry" class="input empty"></div>
                                             <label for="example2-card-expiry" data-tid="elements_examples.form.card_expiry_label"><?php echo app('translator')->getFromJson('website.Expiration'); ?></label>
                                             <div class="baseline"></div>
                                           </div>
                                           <div class="field half-width">
                                             <div id="example2-card-cvc" class="input empty"></div>
                                             <label for="example2-card-cvc" data-tid="elements_examples.form.card_cvc_label"><?php echo app('translator')->getFromJson('website.CVC'); ?></label>
                                             <div class="baseline"></div>
                                           </div>
                                         </div>
                                       <button type="submit" class="btn btn-dark" data-tid="elements_examples.form.pay_button"><?php echo app('translator')->getFromJson('website.Pay'); ?> <?php echo e($web_setting[19]->value); ?><?php echo e(number_format((float)$total_price+0, 2, '.', '')); ?></button>

                                         <div class="error" role="alert"><svg xmlns="https://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                             <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
                                             <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
                                           </svg>
                                           <span class="message"></span></div>
                                       </form>
                                                   <div class="success">
                                                     <div class="icon">
                                                       <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                                         <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
                                                         <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
                                                       </svg>
                                                     </div>
                                                     <h3 class="title" data-tid="elements_examples.success.title"><?php echo app('translator')->getFromJson('website.Payment successful'); ?></h3>
                                                     <p class="message"><span data-tid="elements_examples.success.message"><?php echo app('translator')->getFromJson('website.Thanks You Your payment has been processed successfully'); ?></p>
                                                   </div>

                                               </div>
                                           </div>
                                       </main>
                                   </div>
                             </div>
                         </div>
                   </div>
                 </div>
               </div>
          </div>
         </div>
     </div>
     <?php
     $default_currency = DB::table('currencies')->where('is_default',1)->first();
     if($default_currency->id == Session::get('currency_id')){

       $currency_value = 1;
     }else{
       $session_currency = DB::table('currencies')->where('id',Session::get('currency_id'))->first();

       $currency_value = $session_currency->value;
     }
     ?>
      <div class="col-12 col-xl-3 checkout-right">
        <table class="table right-table">
          <thead>
            <tr>
              <th scope="col" colspan="2" align="center"><?php echo app('translator')->getFromJson('website.Order Summary'); ?></th>
           </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><?php echo app('translator')->getFromJson('website.SubTotal'); ?></th>
              <td align="right"><?php echo e(Session::get('symbol_left')); ?><?php echo e($price+0); ?><?php echo e(Session::get('symbol_right')); ?></td>
            </tr>
            <tr>
              <th scope="row"><?php echo app('translator')->getFromJson('website.Discount'); ?></th>
              <td align="right"><?php echo e(Session::get('symbol_left')); ?><?php echo e(number_format((float)session('coupon_discount'), 2, '.', '')+0*$currency_value); ?><?php echo e(Session::get('symbol_right')); ?></td>
            </tr>
            <tr>
              <th scope="row"><?php echo app('translator')->getFromJson('website.Tax'); ?></th>
              <td align="right"><?php echo e(Session::get('symbol_left')); ?><?php echo e($tax_rate*$currency_value); ?><?php echo e(Session::get('symbol_right')); ?></td>
            </tr>
            <tr>
              <th scope="row"><?php echo app('translator')->getFromJson('website.Shipping Cost'); ?></th>
              <td align="right" ><?php echo e(Session::get('symbol_left')); ?><span id="shipping_cost"><?php echo e($shipping_price*$currency_value); ?></span><?php echo e(Session::get('symbol_right')); ?></td>
            </tr>
            <tr class="item-price">
              <th scope="row"><?php echo app('translator')->getFromJson('website.Total'); ?></th>
              <input type="hidden" name="total_cost" value="<?php echo e(number_format((float)$total_price+0, 2, '.', '')+0*$currency_value); ?>">
              <td align="right" ><?php echo e(Session::get('symbol_left')); ?><span id="total_cost"><?php echo e(number_format((float)$total_price+0, 2, '.', '')+0*$currency_value); ?></span><?php echo e(Session::get('symbol_right')); ?></td>
           </tr>
         </tbody>
       </table>
       </div>
   </div>
 </div>
 </div>
</section>

<script>
  jQuery(document).on('click', '#cash_on_delivery_button', function(e){
	 jQuery("#update_cart_form").submit();
  });

  $('#shipping_address_list').on('change', function(e){

    var id = $(this).val();

    var shiping_address = JSON.parse($("textarea[name=shipping_address_list]").val());

    if(id == 'other'){
      $("input[name=full_name]").val("");
      $("input[name=city]").val("");
      $("input[name=postcode]").val("");
      $("input[name=delivery_phone]").val("");
      $("textarea[name=street]").val("");
      $('option:selected', 'select[name="zone_id"]').removeAttr('selected');

    }else if(shiping_address.length > 0){
      for(index in shiping_address){
        if(shiping_address[index].address_id == id){

          $("input[name=full_name]").val(shiping_address[index].full_name);
          $("input[name=city]").val(shiping_address[index].city);
          $("input[name=postcode]").val(shiping_address[index].postcode);
          $("input[name=delivery_phone]").val(shiping_address[index].delivery_phone);
          $("textarea[name=street]").val(shiping_address[index].street);

          // $('option:selected', 'select[name="zone_id"]').removeAttr('selected');

          $('select[name="zone_id"]').find('option[value="'+shiping_address[index].zone_id+'"]').attr("selected",true);

          // console.log(shiping_address[index].zone_id);
          // console.log(shiping_address[index]);
        }
      }
    }
    // console.log(shiping_address);
    // console.log($(this).val());
  });

  $(document).ready(function(){

    if($("input[name='shipping_method']:checked"))
    {
      var total_cost = $("input[name=total_cost]").val();

      var shipping_price = $("input[name='shipping_method']:checked").attr("shipping_price");

      $("#shipping_cost").html(shipping_price);

      var total = parseInt(shipping_price) + parseInt(total_cost);

      $("#total_cost").html(total);
    }

    $("#Flat_Rate, #Shipping_Price").on("click", function(e) {

      var shipping_price = $(this).attr("shipping_price");

      var total_cost = $("input[name=total_cost]").val();

      $("#shipping_cost").html(shipping_price);

      var total = parseInt(shipping_price) + parseInt(total_cost);

      $("#total_cost").html(total);
    });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxproit/farm2home/src/resources/views/web/checkout.blade.php ENDPATH**/ ?>