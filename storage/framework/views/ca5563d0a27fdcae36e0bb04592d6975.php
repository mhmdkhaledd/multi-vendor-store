<?php if (isset($component)) { $__componentOriginal9d41032d5dde91ab243771384dacb5df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9d41032d5dde91ab243771384dacb5df = $attributes; } ?>
<?php $component = App\View\Components\FrontLayout::resolve(['title' => 'two Factor Authentication'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" action="<?php echo e(route('two-factor.enable')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="card-body">
                            <div class="title">
                                <h3> two Factor Authentication  </h3>
                                <p>You can enable/disable 2FA.</p>

                                <?php if(session('status') == 'two-factor-authentication-enabled'): ?>
                                    <div class="mb-4 font-medium text-sm">
                                        Please finish configuring two factor authentication below.
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="button">
                                <?php if(!$user->two_factor_secret): ?>
                                <button class="btn" type="submit">Enable</button>
                                <?php else: ?>
                                <?php echo $user->twoFactorQrCodeSvg(); ?>


                                    <?php echo method_field('delete'); ?>
                                    <button class="btn" type="submit">Disable</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9d41032d5dde91ab243771384dacb5df)): ?>
<?php $attributes = $__attributesOriginal9d41032d5dde91ab243771384dacb5df; ?>
<?php unset($__attributesOriginal9d41032d5dde91ab243771384dacb5df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d41032d5dde91ab243771384dacb5df)): ?>
<?php $component = $__componentOriginal9d41032d5dde91ab243771384dacb5df; ?>
<?php unset($__componentOriginal9d41032d5dde91ab243771384dacb5df); ?>
<?php endif; ?>



<?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/front/auth/two-factor-auth.blade.php ENDPATH**/ ?>