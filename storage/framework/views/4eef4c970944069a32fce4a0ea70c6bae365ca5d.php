    <section id="login_page" id="login">
        <form wire:submit.prevent="login">
            <div class="login_body__logo">
                <img src="<?php echo e(asset('assets/frontend/img/playtoony-logo.png')); ?>" alt="" />
            </div>
            <div class="login_body__contant" id="wAuto">
                <span class="signin__title">Login in with your Subscription number</span>
            </div>
            <div class="login_body__inputs">
                <div>
                    <h4 class="text-danger"><?php echo e($error); ?></h4>
                    <label for="number">Number</label>
                    <?php $__errorArgs = ['phone_num'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input type="phone" placeholder="Phone Number" wire:model.lazy="phone_num" />
                    <button type="submit">Login</button>
                </div>
            </div>
        </form>
    </section>

<?php /**PATH /home/customer/www/playtoony.com/public_html/resources/views/livewire/frontend/mobile-login.blade.php ENDPATH**/ ?>