<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
		    	<?php if(isset($data['phone']) && $data['phone']): ?>
		    		<form method="get" action="<?php echo e(route('phone_verified')); ?>">
		    			<?php echo csrf_field(); ?>
		    			<input type="hidden" name="lt" value="<?php echo e(isset($data['lt']) ? $data['lt'] : ''); ?>">
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<div class="h2">Enter Security Code</div>
			    			<hr>
			    			<p>Please check your phone number for a message with your code. Your code is 6 digits long.</p>
			    			<div class="row">
			    				<div class="col-6">
					    			<div class="form-group">
								    	<input
								    		type="text"
								    		class="form-control<?php echo e($errors->has('code') ? ' is-invalid' : ''); ?>"
								    		id="code"
								    		placeholder="Enter code"
								    		name="code"
								    		maxlength="6"
								    		value="<?php echo e(old('code', '')); ?>"
								    		required="true"
								    	/>

								    	<?php if($errors->has('code')): ?>
				                            <span class="invalid-feedback" role="alert">
				                                <strong><?php echo e($errors->first('code')); ?></strong>
				                            </span>
				                        <?php endif; ?>
								  	</div>
			    				</div>
			    				<div class="col-6">
			    					<div class="form-group text-center">
			    						<label style="font-weight: bold;">We sent your code to: <?php echo e(isset($data['phone']) ? $data['phone'] : ''); ?></label>
			    					</div>
			    				</div>
			    			</div>
				    		<div class="row" style="padding: 5px;">
				    			<div class="col-6 text-left">
				    				<a href="<?php echo e(route('sent_code_again', ['lt' => isset($data['lt']) ? $data['lt'] : '', 'phone' => $data['phone']])); ?>" style="color:blue;">Didn't get a code?</a>
				    			</div>
				    			<div class="col-6 text-right">
				    				<button type="submit" class="btn btn-primary"> Continue</button>
				    				<a href="<?php echo e(url('/')); ?>" class="btn btn-info"> Cancel</a>
				    			</div>
				    		</div>
			    		</div>
			    	</form>
		    	<?php elseif(isset($data['email_verified'])): ?>
		    		<?php if($data['email_verified']): ?>
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<center><p>Successfuly verified account.</p></center>
			    		</div>
			    	<?php else: ?>
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<center><p>Something went wrong, Please try again.</p></center>
			    		</div>
			    	<?php endif; ?>
		    	<?php elseif(isset($data['phone_verified'])): ?>
		    		<?php if($data['phone_verified']): ?>
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<div class="h2">Verification Account.</div>
			    			<hr>
			    			<p>Successfuly verified account.</p>
			    		</div>
			    	<?php else: ?>
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<div class="h2">Verification Account.</div>
			    			<hr>
			    			<p>Something went wrong, Please try again.</p>
			    		</div>
			    	<?php endif; ?>
		    	<?php elseif(isset($data['email']) && $data['email']): ?>
		    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
		    			<div class="h2">Verification Link.</div>
		    			<hr>
			    		<div class="">
			    			<p>Please check your email for a message with your verification link.</p>
			    		</div>
		    		</div>
		    	<?php else: ?>
					<div class="card" style="margin-bottom: 20px; margin-top: 20px;">
					  	<div class="card-body">

					  		<?php if(Session::has('error')): ?>
					  			<div class="alert alert-danger validation">
					  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					  				<?php echo e(Session::get('error')); ?>

					  			</div>
					  		<?php endif; ?>

					  		<?php if(! is_null(auth()->guard('customer')->user()->email_verified_at)
					  		||! is_null(auth()->guard('customer')->user()->phone_verified_at)): ?>
					    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
					    			<div class="h2">Verification Account.</div>
					    			<hr>
					    			<p>Successfuly verified account.</p>
					    		</div>
			    		</div>
					    	<?php endif; ?>

					    	
					  	</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-2"></div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maxproit/farm2home/src/resources/views/verified.blade.php ENDPATH**/ ?>