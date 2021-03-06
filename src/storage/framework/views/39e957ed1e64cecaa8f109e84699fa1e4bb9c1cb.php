
<?php $__env->startSection('content'); ?>
<!-- login Content -->
<section class="page-area">
	<div class="container">


			<div class="row">
					<div class="col-12 col-sm-12">
							<div class="row justify-content-end">
									<nav aria-label="breadcrumb">
											<ol class="breadcrumb">
												<li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->getFromJson('website.Home'); ?></a></li>
												<li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->getFromJson('website.Login'); ?></li>
											</ol>
										</nav>
							</div>
					</div>
				<div class="col-12 col-sm-12 col-md-6">
					<?php if(Session::has('loginError')): ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
									<?php echo session('loginError'); ?>


									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
							</div>
					<?php endif; ?>
					<?php if(Session::has('success')): ?>
							<div class="alert alert-success" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only"><?php echo app('translator')->getFromJson('website.success'); ?>:</span>
									<?php echo session('success'); ?>


									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
							</div>
					<?php endif; ?>
						<div class="col-12"><h4 class="heading login-heading"><?php echo app('translator')->getFromJson('website.Login'); ?></h4></div>
					<div class="registration-process">

						<form  enctype="multipart/form-data"   action="<?php echo e(URL::to('/process-login')); ?>" method="post">
							<?php echo e(csrf_field()); ?>

								<div class="from-group mb-3">
									<div class="col-12"> <label for="inlineFormInputGroup"><?php echo app('translator')->getFromJson('Phone'); ?></label></div>
									<div class="input-group col-12">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-at"></i></div>
										</div>
										<input type="text" name="email" id="email" placeholder="<?php echo app('translator')->getFromJson('website.Please enter your valid email address'); ?>"class="form-control email-validate">
										<span class="help-block" hidden><?php echo app('translator')->getFromJson('Please enter your phone number'); ?></span>
								 </div>
								</div>
								<div class="from-group mb-3">
										<div class="col-12"> <label for="inlineFormInputGroup"><?php echo app('translator')->getFromJson('website.Password'); ?></label></div>
										<div class="input-group col-12">
											<div class="input-group-prepend">
												<div class="input-group-text"><i class="fas fa-lock"></i></div>
											</div>
											<input type="password" name="password" id="password" placeholder="Please Enter Password" class="form-control field-validate">
											<span class="help-block" hidden><?php echo app('translator')->getFromJson('website.This field is required'); ?></span>										</div>
									</div>
									<div class="col-12 col-sm-12">
											<button type="submit" class="btn btn-secondary"><?php echo app('translator')->getFromJson('website.Login'); ?></button>
										<a href="<?php echo e(URL::to('/forgotPassword')); ?>" class="btn btn-link"><?php echo app('translator')->getFromJson('website.Forgot Password'); ?></a>
									</div>
						</form>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6">
						<div class="col-12"><h4 class="heading login-heading">NEW CUSTOMER</h4></div>
						<div class="registration-process">
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

							<?php if(Session::has('error')): ?>
								<div class="alert alert-danger" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only"><?php echo app('translator')->getFromJson('website.Error'); ?>:</span>
									<?php echo session('error'); ?>


									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif; ?>

							<?php if(Session::has('success')): ?>
								<div class="alert alert-success" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only"><?php echo app('translator')->getFromJson('website.Success'); ?>:</span>
									<?php echo session('success'); ?>


									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif; ?>

							<form name="signup" enctype="multipart/form-data"  action="<?php echo e(URL::to('/signupProcess')); ?>" method="post">
								<?php echo e(csrf_field()); ?>

								<div class="from-group mb-3">
									<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong><?php echo app('translator')->getFromJson('website.First Name'); ?></label></div>
									<div class="input-group col-12">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-signature"></i></div>
										</div>
										<input  name="firstName" type="text" class="form-control field-validate" id="firstName" placeholder="<?php echo app('translator')->getFromJson('website.Please enter your first name'); ?>" value="<?php echo e(old('firstName')); ?>">
										<span class="help-block" hidden><?php echo app('translator')->getFromJson('website.Please enter your first name'); ?></span>
									</div>
								</div>
								<div class="from-group mb-3">
									<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong><?php echo app('translator')->getFromJson('website.Last Name'); ?></label></div>
									<div class="input-group col-12">
										<div class="input-group-prepend">
												<div class="input-group-text"><i class="fas fa-signature"></i></div>
										</div>
										<input  name="lastName" type="text" class="form-control field-validate field-validate" id="lastName" placeholder="<?php echo app('translator')->getFromJson('website.Please enter your first name'); ?>" value="<?php echo e(old('lastName')); ?>">
										<span class="help-block" hidden><?php echo app('translator')->getFromJson('website.Please enter your last name'); ?></span>
									</div>
								</div>
									<div class="from-group mb-3">
										<div class="col-12">
											<label for="inlineFormInputGroup"><strong style="color: red;">*</strong><?php echo app('translator')->getFromJson('website.phone'); ?></label>
										</div>
										<div class="input-group col-12">
											<div class="input-group-prepend">
												<div class="input-group-text"><i class="fas fa-signature"></i></div>
											</div>
											<input  name="phone" type="text" class="form-control field-validate field-validate" id="lastName" placeholder="<?php echo app('translator')->getFromJson('website.please_enter_your_phone_number'); ?>" value="<?php echo e(old('phone')); ?>">
											<span class="help-block" hidden><?php echo app('translator')->getFromJson('website.please_enter_your_phone_number'); ?></span>
										</div>
									</div>

									
											<input  name="email" type="hidden">
									<div class="from-group mb-3">
											<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong><?php echo app('translator')->getFromJson('website.Password'); ?></label></div>
											<div class="input-group col-12">
												<div class="input-group-prepend">
														<div class="input-group-text"><i class="fas fa-lock"></i></div>
												</div>
												<input name="password" id="password" type="password" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('website.Please enter your password'); ?>">
												<span class="help-block" hidden><?php echo app('translator')->getFromJson('website.Please enter your password'); ?></span>

											</div>
										</div>
										<div class="from-group mb-3">
												<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong><?php echo app('translator')->getFromJson('website.Confirm Password'); ?></label></div>
												<div class="input-group col-12">
													<div class="input-group-prepend">
															<div class="input-group-text"><i class="fas fa-lock"></i></div>
													</div>
													<input type="password" class="form-control" id="re_password" name="re_password" placeholder="Enter Your Password">
													<span class="help-block" hidden><?php echo app('translator')->getFromJson('website.Please re-enter your password'); ?></span>
													<span class="help-block" hidden><?php echo app('translator')->getFromJson('website.Password does not match the confirm password'); ?></span>
												</div>
											</div>
											<div class="from-group mb-3">
												<div class="col-12" > <label for="inlineFormInputGroup"><strong  style="color: red;">*</strong><?php echo app('translator')->getFromJson('website.Gender'); ?></label></div>
												<div class="input-group col-12">
													<div class="input-group-prepend">
															<div class="input-group-text"><i class="fas fa-signature"></i></div>
													</div>
													<select class="form-control field-validate" name="gender" id="inlineFormCustomSelect">
														<option selected value=""><?php echo app('translator')->getFromJson('website.Choose...'); ?></option>
														<option value="0" <?php if(!empty(old('gender')) and old('gender')==0): ?> selected <?php endif; ?>)><?php echo app('translator')->getFromJson('website.Male'); ?></option>
														<option value="1" <?php if(!empty(old('gender')) and old('gender')==1): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('website.Female'); ?></option>
													</select>
													<span class="help-block" hidden><?php echo app('translator')->getFromJson('website.Please select your gender'); ?></span>
												</div>
											</div>
											<div class="from-group mb-3">
													<div class="input-group col-12">
														<input required style="margin:4px;"class="form-controlt checkbox-validate" type="checkbox">
														<?php echo app('translator')->getFromJson('website.Creating an account means you are okay with our'); ?>  <?php if(!empty($result['commonContent']['pages'][3]->slug)): ?>&nbsp;<a href="<?php echo e(URL::to('/page?name='.$result['commonContent']['pages'][3]->slug)); ?>"><?php endif; ?> <?php echo app('translator')->getFromJson('website.Terms and Services'); ?><?php if(!empty($result['commonContent']['pages'][3]->slug)): ?></a><?php endif; ?>, <?php if(!empty($result['commonContent']['pages'][1]->slug)): ?><a href="<?php echo e(URL::to('/page?name='.$result['commonContent']['pages'][1]->slug)); ?>"><?php endif; ?> <?php echo app('translator')->getFromJson('website.Privacy Policy'); ?><?php if(!empty($result['commonContent']['pages'][1]->slug)): ?></a> <?php endif; ?> &nbsp; and &nbsp; <?php if(!empty($result['commonContent']['pages'][2]->slug)): ?><a href="<?php echo e(URL::to('/page?name='.$result['commonContent']['pages'][2]->slug)); ?>"><?php endif; ?> <?php echo app('translator')->getFromJson('website.Refund Policy'); ?> <?php if(!empty($result['commonContent']['pages'][3]->slug)): ?></a><?php endif; ?>.
														<span class="help-block" hidden><?php echo app('translator')->getFromJson('website.Please accept our terms and conditions'); ?></span>
													</div>
												</div>
										<div class="col-12 col-sm-12">
												<button type="submit" class="btn btn-primary">Create an Account</button>

										</div>
							</form>
						</div>
				</div>
				<div class="col-12 col-sm-12 my-5">
						<div class="registration-socials">
					<div class="row align-items-center justify-content-between">
									<div class="col-12 col-sm-6">
											Access Your Account Through Your Social Networks
									</div>
									<div class="col-12 col-sm-6 right">
										  <?php if($result['commonContent']['setting'][61]->value==1): ?>
											<a href="login/google" type="button" class="btn btn-google"><i class="fab fa-google-plus-g"></i>&nbsp;Google</a>
											<?php endif; ?>
											<?php if($result['commonContent']['setting'][2]->value==1): ?>
											<a  href="login/facebook" type="button" class="btn btn-facebook"><i class="fab fa-facebook-f"></i>&nbsp;Facebook</a>
											<?php endif; ?>
									</div>
							</div>
					</div>
				</div>
			</div>

	</div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/farm2homebd/public_html/src/resources/views/auth/login.blade.php ENDPATH**/ ?>