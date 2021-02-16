<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			

			<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
				<div class="form-body" style="margin-top: 20px;margin-bottom: 20px;">

					<?php if(Session::has('error')): ?>
						<div class="alert alert-danger validation" style="margin: 10px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<?php echo e(Session::get('error')); ?>

						</div>
					<?php endif; ?>

					<?php if(Session::has('success')): ?>
					  <div class="alert alert-success alert-dismissible" style="margin: 10px;">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <?php echo e(Session::get('success')); ?>

					  </div>
					<?php endif; ?>

					<div class="h2">Verify an account.</div>
					<hr>
					<form method="get" action="<?php echo e(route('send_code')); ?>">
						<?php echo csrf_field(); ?>

						<?php if($errors->has('verify')): ?>
						    <span class="invalid-feedback" role="alert">
						        <strong><?php echo e($errors->first('verify')); ?></strong>
						    </span>
						<?php endif; ?>
						
						<?php if(isset($user->email)): ?>
						  	<!--<div class="form-group">-->
						   <!-- 	<div class="form-check" style="margin-top: 10px; margin-bottom: 10px;">-->
						   <!--   		<input-->
						   <!--   			type="radio"-->
						   <!--   			class="form-check-input"-->
						   <!--   			id="email"-->
						   <!--   			name="verify"-->
						   <!--   			value="<?php echo e($user->email); ?>"-->
						   <!--   		/>-->
						   <!--   		<label class="form-check-label" for="email"><?php echo e($user->email?? ''); ?></label>-->
						   <!-- 	</div>-->
						  	<!--</div>-->
						<?php endif; ?>

					  	<?php if(isset($user->phone)): ?>
						  	<div class="form-group">
						    	<div class="form-check" style="margin-top: 10px; margin-bottom: 10px;">
						      		<input
						      			type="radio"
						      			class="form-check-input"
						      			id="phone"
						      			name="verify"
						      			value="<?php echo e($user->phone); ?>"
						      		/>
						      		<label class="form-check-label" for="phone"><?php echo e($user->phone?? ''); ?></label>
						    	</div>
						  	</div>
						 <?php endif; ?>
					  
					 	<div class="form-group text-right">
					 		<button type="submit" class="btn btn-primary">Send Code</button>
					 	</div>
					</form>
				</div>	
			</div>		
		</div>
		<div class="col-3"></div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/farm2homebd/public_html/src/resources/views/verify.blade.php ENDPATH**/ ?>