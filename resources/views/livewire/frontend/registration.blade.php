<div wire:ignore.self class="modal fade" id="registration_pop" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered fixwidth rightTickMinW" role="document">
        <div class="modal-content bg">
            <div class="containerBody h-auto" id="containerBody">
                <section class="contant_body_signin" id="signIn">
                    <div class="contant_body__logo">
                        <img src="{{ asset('assets/frontend/img/xoss_games_popup-logo.png') }}" alt="">
                    </div>
                    <div class="contant_body__contant" id="wAuto">
                        <span class="signin__title">Sign Up with your phone number</span>
                    </div>
                    <div class="contant_body__inputs">
                        <div>
                            @error('phone_num')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="number">Phone Number</label>
                            <input type="phone" placeholder="Phone Number" id="number"
                                wire:model.lazy='phone_num'>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="password">Password</label>
                            <div class="inputBox">
                                <input type="password" placeholder="Password" wire:model.lazy="password" id="password1">
                                  <i class="fas fa-eye-slash toggle-password" data-target="#password1"></i>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="c_password">Confirm Password</label>
                             <div class="inputBox">
                                <input type="password" placeholder="Password" id="c_password"
                                wire:model.lazy="password_confirmation">
                                <i class="fas fa-eye-slash toggle-password" data-target="#c_password"></i>
                            </div>
                            <button wire:click="register" id="datalayer" >Sign Up</button>
                        </div>
                        <div class="account_policy"><span>Already have an account?</span><a href="#"
                                data-dismiss="modal" data-toggle="modal" data-target="#login_pop">SignIn</a></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
