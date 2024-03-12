<div wire:ignore.self class="modal fade" id="login_pop" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered fixwidth rightTickMinW" role="document">
        <div class="modal-content bg">
            <div class="containerBody" id="containerBody">
                <section class="contant_body_signin" id="signIn">
                    <div class="contant_body__logo">
                        <img src="{{ asset('assets/frontend/img/playtoony-logo.png') }}" alt="" />
                    </div>
                    <div class="contant_body__contant" id="wAuto">
                        <span class="signin__title">Sign in with your phone number</span>
                    </div>
                    <div class="contant_body__inputs">
                        <div>
                            <h4 class="text-danger">{{ $error }}</h4>
                            @error('phone_num') <span class="text-danger">{{ $message }}</span> @enderror
                            <label for="number">Number</label>
                            <input type="phone" placeholder="Phone Number" wire:model.lazy="phone_num">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            <label for="password">Password</label>
                            <div class="inputBox">
                                <input type="password" placeholder="Password" wire:model.lazy="password" id="password">
                                  <i class="fas fa-eye-slash toggle-password" data-target="#password"></i>
                            </div>
                            <button wire:click="login">Sign In</button>
                        </div>
                        <div class="account_policy"><span>Don't have an account?</span><a href="#"
                            data-dismiss="modal"  data-toggle="modal"  data-target="#registration_pop">SignUp</a>
                        </div>

                        <div class="forget_password text-center"><a href="{{route('verify_number')}}">Forgot password?</a>
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
