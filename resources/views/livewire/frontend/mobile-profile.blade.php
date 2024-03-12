<div class="containerBody">
    <section class="contant_body_profile">
        {{-- <form wire:submit.prevent="update"> --}}
        <div class="contant_body__logo">
            <input type="file" id="imageUpload" style="display: none" wire:model="temp2_pro_pic" />
            <span>Profile</span>
            <label for="imageUpload" class="d-block">
                @if ($temp2_pro_pic)
                    <img class="login_logo" src="{{ $temp2_pro_pic->temporaryUrl() }}" alt=""
                        style="border-radius: 50%;">
                    {{-- {{ dd('tets'); }} --}}
                @elseif($profile_pic)
                    <img class="login_logo" src="{{ asset('storage/' . $profile_pic) }}" alt=""
                        style="border-radius: 50%;">
                @else
                    <img class="login_logo" src="{{ asset('assets/frontend/img/profile_logo.png') }}" alt="">
                @endif
            </label>

            @if ($name)
                <p>{{ $name }} </p>
            @else
                <p>{{ $phone_num }}</p>
            @endif
            <small>Gaming Account</small>
        </div>
        <div class="user_control-btn pt-4 d-flex justify-content-center">
            @if ($unsub_btn)
                <a href="#" class="unsubscribe_btn user_btn" wire:click="unsubscribe">Unsubscribe</a>
            @endif
            <a href="#" class="logout_btn user_btn ml-3" wire:click="logout"><i
                    class="fas fa-sign-out-alt"></i>&nbsp;Log Out</a>
        </div>
        <div class="contant_body__inputs">
            <div class="input-icons">
                @error('name')
                    <div class="eroor_text">{{ $message }}</div>
                @enderror
                <div>
                    <div class="icon"><i class="fas fa-user"></i></div>
                    <span>|</span>
                    <input class="input-field" type="text" placeholder="{{ $name ?? 'Name' }}"
                        wire:model.lazy="name" />
                </div>

                <div>
                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                    <span>|</span>
                    <input class="input-field" type="text" placeholder="{{ $phone_num }}"
                        wire:model.lazy="phone_num" />
                </div>
                
            </div>
            <div>
                <button type="submit" wire:click="update">Save Changes</button>
            </div>
        </div>
        {{-- </form> --}}
    </section>
</div>
