<!-- //header style One -->
<header id="headerOne" class="header-area header-one header-desktop d-none d-lg-block d-xl-block">
    <div class="header-mini bg-top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <nav id="navbar_0_2" class="navbar navbar-expand-md navbar-dark navbar-0">
              <div class="navbar-lang">

                <?php if(count($languages) > 1): ?>
                <div class="dropdown">

                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <img src="<?php echo e(asset('').session('language_image')); ?>" width="17px" />
                     <?php echo e(session('language_name')); ?>

                    </button>
                    <ul class="dropdown-menu">
                      <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li  <?php if(session('locale')==$language->code): ?> style="background:lightgrey;" <?php endif; ?>>
                        <button  onclick="myFunction1(<?php echo e($language->languages_id); ?>)" class="btn" style="background:none;" href="#">
                          <img style="margin-left:10px; margin-right:10px;"src="<?php echo e(asset('').$language->image_path); ?>" width="17px" />
                          <span><?php echo e($language->name); ?></span>
                        </button>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </div>
                  <?php echo $__env->make('web.common.scripts.changeLanguage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <?php endif; ?>
                  <?php if(count($currencies) > 1): ?>
                  <div class="dropdown">

                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                        <?php if(session('symbol_left') != null): ?>
                        <span ><?php echo e(session('symbol_left')); ?></span>
                        <?php else: ?>
                        <span ><?php echo e(session('symbol_right')); ?></span>
                        <?php endif; ?>
                       <?php echo e(session('currency_code')); ?>



                      </button>
                      <ul class="dropdown-menu">
                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li  <?php if(session('currency_title')==$currency->code): ?> style="background:lightgrey;" <?php endif; ?>>
                          <button  onclick="myFunction2(<?php echo e($currency->id); ?>)" class="btn" style="background:none;" href="#">
                            <?php if($currency->symbol_left != null): ?>
                            <span style="margin-left:10px; margin-right:10px;"><?php echo e($currency->symbol_left); ?></span>
                            <span><?php echo e($currency->code); ?></span>
                            <?php else: ?>
                            <span style="margin-left:10px; margin-right:10px;"><?php echo e($currency->symbol_right); ?></span>
                            <span><?php echo e($currency->code); ?></span>
                            <?php endif; ?>
                          </button>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>
                    <?php echo $__env->make('web.common.scripts.changeCurrency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
              </div>
              <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="nav-avatar nav-link">
                          <div class="avatar">
                          <?php
                          if(auth()->guard('customer')->check()){
                           if(auth()->guard('customer')->user()->avatar == null){ ?>
                            <img class="img-fluid" src="<?php echo e(asset('web/images/miscellaneous/avatar.jpg')); ?>">
                          <?php }else{ ?>
                            <img class="img-fluid" src="<?php echo e(auth()->guard('customer')->user()->avatar); ?>">
                          <?php
                                }
                             }
                          ?>
                          </div>
                          <span><?php if(auth()->guard('customer')->check()){ ?><?php echo app('translator')->getFromJson('website.Welcome'); ?>&nbsp;! <?php echo e(auth()->guard('customer')->user()->first_name); ?> <?php }?> </span>
                        </div>
                      </li>
                      <?php if(auth()->guard('customer')->check()){ ?>
                      <li class="nav-item"> <a href="<?php echo e(url('profile')); ?>" class="nav-link"><?php echo app('translator')->getFromJson('website.Profile'); ?></a> </li>
                      <li class="nav-item"> <a href="<?php echo e(url('wishlist')); ?>" class="nav-link"><?php echo app('translator')->getFromJson('website.Wishlist'); ?></a> </li>
                      <li class="nav-item"> <a href="<?php echo e(url('compare')); ?>" class="nav-link"><?php echo app('translator')->getFromJson('website.Compare'); ?>&nbsp;(<span id="compare"><?php echo e($count); ?></span>)</a> </li>
                      <li class="nav-item"> <a href="<?php echo e(url('orders')); ?>" class="nav-link"><?php echo app('translator')->getFromJson('website.Orders'); ?></a> </li>
                      <li class="nav-item"> <a href="<?php echo e(url('shipping-address')); ?>" class="nav-link"><?php echo app('translator')->getFromJson('website.Shipping Address'); ?></a> </li>
                      <li class="nav-item"> <a href="<?php echo e(url('logout')); ?>" class="nav-link padding-r0"><?php echo app('translator')->getFromJson('website.Logout'); ?></a> </li>
                      <?php }else{ ?>
                        <li class="nav-item"><div class="nav-link"><?php echo app('translator')->getFromJson('website.Welcome'); ?>!</div></li>
                        <li class="nav-item"> <a href="<?php echo e(URL::to('/guest_checkout')); ?>" class="nav-link -before"><?php echo app('translator')->getFromJson('website.Guest Checkout'); ?></a> </li>
                        <li class="nav-item"> <a href="<?php echo e(url('orders')); ?>" class="nav-link"><?php echo app('translator')->getFromJson('website.Orders'); ?></a> </li>
                        <li class="nav-item"> <a href="<?php echo e(URL::to('/login')); ?>" class="nav-link -before"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;<?php echo app('translator')->getFromJson('website.Login/Register'); ?></a> </li>

                      <?php } ?>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="header-navbar logo-nav bg-menu-bar">
      <div class="container">
        <nav id="navbar_1_2" class="navbar navbar-expand-lg  bg-nav-bar">
        <a href="<?php echo e(URL::to('/')); ?>" class="logo">
    <?php if($result['commonContent']['setting'][77]->value=='name'): ?>
    <?=stripslashes($result['commonContent']['setting'][78]->value)?>
    <?php endif; ?>

    <?php if($result['commonContent']['setting'][77]->value=='logo'): ?>
    <img src="<?php echo e(asset('').$result['commonContent']['setting'][15]->value); ?>" alt="<?=stripslashes($result['commonContent']['setting'][79]->value)?>">
    <?php endif; ?>
    </a>
          <div class=" navbar-collapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link " href="<?php echo e(url('/')); ?>" >
                    <?php echo app('translator')->getFromJson('website.Home'); ?>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="<?php echo e(url('/shop')); ?>"  >
                    <?php echo app('translator')->getFromJson('website.Shop'); ?>
                    <span class="badge badge-secondary">Hot</span>
                  </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" >
                      <?php echo app('translator')->getFromJson('website.News'); ?>
                    </a>
                    <div class="dropdown-menu">
                      <?php $__currentLoopData = $result['commonContent']['newsCategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="dropdown-submenu">
                            <a class="dropdown-item" href="<?php echo e(URL::to('/news?category='.$categories->slug)); ?>"><?php echo e($categories->name); ?></a>
                          </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" >
                    <?php echo app('translator')->getFromJson('website.infoPages'); ?>
                  </a>
                  <div class="dropdown-menu">
                    <?php $__currentLoopData = $result['commonContent']['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a class="dropdown-item" href="<?php echo e(URL::to('/page?name='.$page->slug)); ?>">
                        <?php echo e($page->name); ?>

                      </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="<?php echo e(url('contact')); ?>" >
                    <?php echo app('translator')->getFromJson('website.Contact Us'); ?>
                  </a>
                </li>
                <li class="nav-item ">
                      <a href="<?php echo e(url('shop?type=special')); ?>"class="btn btn-secondary"><?php echo app('translator')->getFromJson('website.SPECIAL DEALS'); ?></a>
                    </li>
              </ul>
            </div>

        </nav>
      </div>
    </div>
    <div class="header-maxi bg-header-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-8">
            <form class="form-inline" action="<?php echo e(URL::to('/shop')); ?>" method="get">
              <div class="search">
                  <div class="select-control">
                      <select class="form-control" name="category">
                       <?php echo $__env->make('web.common.HeaderCategories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php    productCategories(); ?>
                      </select>
                    </div>
                    <input type="search"  name="search" placeholder="<?php echo app('translator')->getFromJson('website.Search entire store here'); ?>..." value="<?php echo e(app('request')->input('search')); ?>" aria-label="Search">
                <button class="btn btn-secondary" type="submit">
                <i class="fa fa-search"></i></button>
              </div>
            </form>
          </div>
          <div class="col-12 col-lg-4">
            <ul class="top-right-list">
              <li class="phone-header">
                <a href="#">
                    <i class="fas fa-phone"></i>
                    <span class="block">
                      <span class="title"><?php echo app('translator')->getFromJson('website.Call Us Now'); ?></span>
                      <span class="items"><?php echo e($result['commonContent']['setting'][11]->value); ?></span>
                    </span>
                </a>
              </li>
              <li class="cart-header dropdown head-cart-content d-none d-md-block">
                <?php $qunatity=0; ?>
                                <?php $__currentLoopData = $result['commonContent']['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                	<?php $qunatity += $cart_data->customers_basket_quantity; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <a href="#" id="dropdownMenuButton" class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="badge badge-secondary"><?php echo e($qunatity); ?></span>
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                    <!--<img class="img-fluid" src="<?php echo e(asset('').'public/images/shopping_cart.png'); ?>" alt="icon">-->

                                    <span class="block">
                                    	<span class="title"><?php echo app('translator')->getFromJson('website.My Cart'); ?></span>
                                        <?php if(count($result['commonContent']['cart'])>0): ?>
                                            <span class="items"><?php echo e(count($result['commonContent']['cart'])); ?>&nbsp;<?php echo app('translator')->getFromJson('website.items'); ?></span>
                                        <?php else: ?>
                                            <span class="items">(0)&nbsp;<?php echo app('translator')->getFromJson('website.item'); ?></span>
                                        <?php endif; ?>
                                    </span>
                                </a>

                                <?php if(count($result['commonContent']['cart'])>0): ?>
                                <?php
                                $default_currency = DB::table('currencies')->where('is_default',1)->first();
                                if($default_currency->id == Session::get('currency_id')){

                                  $currency_value = 1;
                                }else{
                                  $session_currency = DB::table('currencies')->where('id',Session::get('currency_id'))->first();

                                  $currency_value = $session_currency->value;
                                }
                                ?>
                                <div class="shopping-cart shopping-cart-empty dropdown-menu dropdown-menu-right" aria-labelledby="dropdownCartButton_9">
                                    <ul class="shopping-cart-items">
                                        <?php
                                            $total_amount=0;
                                            $qunatity=0;
                                        ?>
                                        <?php $__currentLoopData = $result['commonContent']['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php
                					             	$total_amount += $cart_data->final_price*$cart_data->customers_basket_quantity;
                					            	$qunatity 	  += $cart_data->customers_basket_quantity; ?>
                                        <li>
                                            <div class="item-thumb">
                                            	<a href="<?php echo e(URL::to('/deleteCart?id='.$cart_data->customers_basket_id)); ?>" class="icon" ><img class="img-fluid" src="<?php echo e(asset('').'web/images/close.png'); ?>" alt="icon"></a>
                                            	<div class="image">
                                                	<img class="img-fluid" src="<?php echo e(asset('').$cart_data->image); ?>" alt="<?php echo e($cart_data->products_name); ?>"/>
                                                </div>
                                            </div>
                                            <div class="item-detail">
                                              <h2 class="item-name"><?php echo e($cart_data->products_name); ?></h2>
                                              <span class="item-quantity"><?php echo app('translator')->getFromJson('website.Qty'); ?>&nbsp;:&nbsp;<?php echo e($cart_data->customers_basket_quantity); ?></span>
                                              <span class="item-price"><?php echo e(Session::get('symbol_left')); ?><?php echo e($cart_data->final_price*$cart_data->customers_basket_quantity*$currency_value); ?><?php echo e(Session::get('symbol_right')); ?></span>
                                           </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                      <div class="tt-summary">
                                      	  <p><?php echo app('translator')->getFromJson('website.items'); ?><span><?php echo e($qunatity); ?></span></p>
                                        	<p><?php echo app('translator')->getFromJson('website.SubTotal'); ?><span><?php echo e(Session::get('symbol_left')); ?><?php echo e($total_amount*$currency_value); ?><?php echo e(Session::get('symbol_right')); ?></span></p>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="buttons">
                                          <a class="btn btn-dark" href="<?php echo e(URL::to('/viewcart')); ?>"><?php echo app('translator')->getFromJson('website.View Cart'); ?></a>
                                          <a class="btn btn-secondary" href="<?php echo e(URL::to('/checkout')); ?>"><?php echo app('translator')->getFromJson('website.Checkout'); ?></a>
                                      </div>
                                   </li>
                                 </ul>

                                </div>

                				<?php else: ?>

                                <div class="shopping-cart shopping-cart-empty dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <ul class="shopping-cart-items">
                                        <li><?php echo app('translator')->getFromJson('website.You have no items in your shopping cart'); ?></li>
                                    </ul>
                                </div>
                                <?php endif; ?>

              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php /**PATH /var/www/html/farm2homewebnew/farm2homewebnew/src/resources/views/web/headers/headerOne.blade.php ENDPATH**/ ?>