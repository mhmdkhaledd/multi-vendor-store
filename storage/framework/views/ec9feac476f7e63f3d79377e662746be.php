<!-- Start Single Product -->
<div class="single-product">
    <div class="product-image">
        <img src="<?php echo e($product->image_url); ?>" alt="#">
        <div class="button">
            <a href="<?php echo e(route('products.show',$product->id)); ?>" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
        </div>
    </div>
    <div class="product-info">
        <span class="category">
            <span class="category"><?php echo e($product->category?->name); ?></span>  
        </span>
        <h4 class="title">
            <a href="<?php echo e(route('products.show',$product->slug)); ?>"><?php echo e($product->name); ?></a>
        </h4>
        <ul class="review">
            <li><i class="lni lni-star-filled"></i></li>
            <li><i class="lni lni-star-filled"></i></li>
            <li><i class="lni lni-star-filled"></i></li>
            <li><i class="lni lni-star-filled"></i></li>
            <li><i class="lni lni-star"></i></li>
            <li><span>4.0 Review(s)</span></li>
        </ul>
        <div class="price">
            <span>$<?php echo e($product->price); ?></span>
        </div>
    </div>
</div>
<!-- End Single Product -->
<?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/components/product-card.blade.php ENDPATH**/ ?>