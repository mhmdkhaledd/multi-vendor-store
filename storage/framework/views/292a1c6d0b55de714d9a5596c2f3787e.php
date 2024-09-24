<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items"><?php echo e($items->count()); ?> Items</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span><?php echo e($items->count()); ?> Items</span>
            <a href="<?php echo e(route('cart.index')); ?>">View Cart</a>
        </div>
        <ul class="shopping-list">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <li>
                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                        class="lni lni-close"></i></a>
                <div class="cart-img-head">
                    <a class="cart-img" href="<?php echo e(route('product.show',$item->product->slug)); ?>"><img
                            src="<?php echo e($item->product->image_url); ?>" alt="#"></a>
                </div>
                <div class="content">
                    <h4><a href="product-details.html"><?php echo e($item->product->name); ?></a></h4>
                    <p class="quantity"><?php echo e($item->quantity); ?> - <span class="amount"><?php echo e($item->product->price); ?></span></p>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount"><?php echo e($total); ?></span>
            </div>
            <div class="button">
                <a href="checkout.html" class="btn animate">Checkout</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
</div>
<?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/components/cart-menu.blade.php ENDPATH**/ ?>