<div class="containerBody signUp">
    <section class="contant_body_signin" id="signUp">
        <form wire:submit.prevent="register">
            <div class="contant_body__logo">
                <img src="{{ asset('assets/frontend/img/xoss_games_popup-logo.png') }}" alt="" />
            </div>
            <div class="contant_body__contant" id="wAuto">
                <span class="signin__title">Sign Up with your phone number</span>
            </div>
            <div class="contant_body__inputs">
                <div>
                    <label for="number">Phone Number</label>
                    @error('phone_num')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="phone" placeholder="Phone Number" id="number" wire:model.lazy='phone_num'/>
                    <label for="password">Password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                      <div class="inputBox">
                        <input type="password" placeholder="Password" wire:model.lazy="password" id="mobilepassword1">
                          <i class="fas fa-eye-slash toggle-password" data-target="#mobilepassword1"></i>
                    </div>
                    <label for="c_password">Confirm Password</label>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="inputBox">
                        <input type="password" placeholder="Password" id="mobilec_password"
                        wire:model.lazy="password_confirmation">
                        <i class="fas fa-eye-slash toggle-password" data-target="#mobilec_password"></i>
                    </div>
                    <button type="submit" id="datalayer" >Sign Up</button>
                </div>
                <div class="account_policy">
                    <span>Already have an account?</span><a href="{{ route('user.login') }}">SignIn</a>
                </div>
            </div>
        </form>
    </section>
</div>
