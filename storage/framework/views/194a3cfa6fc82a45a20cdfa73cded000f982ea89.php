
<?php $__env->startSection("content"); ?>
	<section id="cart_items">
				<div class="table-responsive cart_info">
					<?php 
					$content = Cart::content();
					
					?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo e(URL::to('uploads/product/'.$v_content->options->image)); ?>" width="50" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo e($v_content->name); ?></a></h4>
								<p>MÃ ID:<?php echo e($v_content->id); ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo e(number_format($v_content->price).''.' vnđ'); ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="<?php echo e(URL::to('update-cart-quantity')); ?>" method="post">
										  <?php echo e(csrf_field()); ?>

									<input class="cart_quantity_input" type="text" name="cart_quantity" value="<?php echo e($v_content->qty); ?>" autocomplete="off" size="2">
									<input type="hidden" value="<?php echo e($v_content->rowId); ?>" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
									$subtotal  = $v_content->price * $v_content->qty;
									echo number_format($subtotal).''.'vnđ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo e(URL::to('delete-to-cart/'.$v_content->rowId)); ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
				<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> 
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span><?php echo e(Cart::total().''.' vnđ'); ?></span></li>
							<li>Thuế <span><?php echo e(Cart::tax().''.' vnđ'); ?></span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span><?php echo e(Cart::total().''.' vnđ'); ?></span></li>
						</ul>
							
							  <?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                                 ?>
                                  
                                <a class="btn btn-default check_out" href="<?php echo e(URL::to('checkout')); ?>">Thanh toán</a>
                                <?php
                            }else{
                                 ?>
                                 
                                 <a class="btn btn-default check_out" href="<?php echo e(URL::to('login-checkout')); ?>">Thanh toán</a>
                                 <?php 
                             }
                                 ?>
                                
				</div>
			</div>
		</div>
	</section>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make("Banhang.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\StoreSmartPhone\resources\views/Banhang/cart/show_cart.blade.php ENDPATH**/ ?>