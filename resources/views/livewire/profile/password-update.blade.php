<div>
    <x-jet-form-section submit="updatePassword">
        <x-slot name="title">
            {{ __('Update Password') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </x-slot>
    
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="current_password">Current Password  (<span class="text-danger">*</span>)</x-jet-label>
                <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-4">
                <!-- <x-jet-label for="password">New Password  (<span class="text-danger">*/a-z/A-Z/0-9/@$!%*#?&</span>||<span class="text-danger">min:8</span>||<span class="text-danger">max:16</span>)</x-jet-label> -->
                <!-- <div style="font-size: 12px;"> -->
                <h4 style="font-size: 12px;">Please set your new password using the following guidelines:</h4>
                <p style="font-size: 12px;"> 1.Minimum length is 8 characters.</p>
                <p style="font-size: 12px;"> 2.Maximum length is 16 characters.</p>
                <p style="font-size: 12px;"> 3.Password must contain at least one alphabetic character with one upper case.</p>
                <p style="font-size: 12px;"> 4.Password must contain at least one number.</p>
                <p style="font-size: 12px;"> 5.Password must contain at least one special character (@$!%*#?&).</p>
                <br>
                <!-- <div> -->
                <x-jet-label for="password">New Password  (<span class="text-danger">*</span>)</x-jet-label>
                <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                <x-jet-input-error for="password" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="password_confirmation">Confirm  Password(<span class="text-danger">*</span>)</x-jet-label>
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" class="mt-2" />
            </div>
        </x-slot>
    
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
    
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
    
</div>
