    <section id="login_page" id="login">
        <form wire:submit.prevent="login">
            <div class="login_body__logo">
                <img src="{{ asset('assets/frontend/img/playtoony-logo.png') }}" alt="" />
            </div>
            <div class="login_body__contant" id="wAuto">
                <span class="signin__title">Login in with your Subscription number</span>
            </div>
            <div class="login_body__inputs">
                <div>
                    <h4 class="text-danger">{{ $error }}</h4>
                    <label for="number">Number</label>
                    @error('phone_num')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="phone" placeholder="Phone Number" wire:model.lazy="phone_num" />
                    <button type="submit">Login</button>
                </div>
            </div>
        </form>
    </section>

