<?php

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use function Livewire\Volt\{state, usesFileUploads};

usesFileUploads();

state([
    'user' => auth()->user(),
    'name' => fn () => auth()->user()->name,
    'email' => fn () => auth()->user()->email,
    'avatar' => null,
]);

$updateProfileInformation = function () {
    $user = Auth::user();

    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        'avatar' => '',
    ]);

    if ($this->avatar) {
        $path = Storage::disk('upload')->put('avatars', $this->avatar);
        if ($old = $user->avatar) {
            Storage::disk('upload')->delete($old);
        }
        $validated['avatar'] = $path;
    }

    $user->fill($validated);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    $this->dispatch('profile-updated', name: $user->name);
};

$sendVerification = function () {
    $user = Auth::user();

    if ($user->hasVerifiedEmail()) {
        $this->redirectIntended(default: route('dashboard', absolute: false));

        return;
    }

    $user->sendEmailVerificationNotification();

    Session::flash('status', 'verification-link-sent');
};

?>

<section>
    <header>
        <h2 class="text-lg font-medium text-green-700 font-arial">
            {{ __('ကိုယ်ရေးအချက်လက်') }}
        </h2>

        <p class="mt-1 text-sm text-yellow-500 font-arial">
            {{ __("ကိုယ်ရေးအချက်လက်နှင့်အီးမေးလ်လိပ်စာပြင်ရန်") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            @if ($user->avatar)
                <img src="{{ $avatar ? $avatar->temporaryUrl() : route('file', $user->avatar)}}" class="w-20 h-20 rounded-full border-2 dark:border-green-600 border-green-400 mb-4">
            @else
                <img src="{{ $avatar ? $avatar->temporaryUrl() : asset('img/user.png') }}" class="w-20 h-20 rounded-full border-2 dark:border-green-600 border-green-400 mb-4">
            @endif
            <x-input-label for="ဓါတ်ပုံ" :value="__('ဓါတ်ပုံ')"/>
            <x-input-file wire:model='avatar' id="avatar" accept=".jpg, .jpeg, .png" name="avatar"/>
            <x-input-error class="mt-1" :messages="$errors->get('avatar')" />
        </div>

        <div>
            <x-input-label for="အမည်" :value="__('အမည်')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="အီးမေးလ်" :value="__('အီးမေးလ်')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
