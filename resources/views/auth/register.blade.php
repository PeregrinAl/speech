<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Регистрация</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Давайте заполним необходимые поля</p>
        </div>
        
        <x-validation-errors class="mb-4" />



        <form method="POST" action="{{ route('register') }}" x-data="{tip: 'specialist'}">
            @csrf
            <div class="mt-4">
                <x-label for="name" value="{{ __('forms.name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            
            <div class="mt-4">
                <x-label for="surname" value="{{ __('forms.surname') }}" />
                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('forms.email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4 space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                  <div class="flex items-center">
                    <input id="role_selector_pat" name="role"  type="radio" value="patient" class="" x-model="tip">
                    <label for="role_selector_pat" class="ml-3 block text-base font-medium text-gray-700">Я - пациент</label>
                  </div>
                  <div class="flex items-center">
                    <input id="role_selector_sp" name="role" type="radio" value="specialist" class="" x-model="tip">
                    <label for="role_selector_sp" class="ml-3 block text-base font-medium text-gray-700" value="specialist">Я - врач</label>
                  </div>

                </div>

            <div class="mt-4" x-show="tip=='patient'">
            <x-label for="date_of_birth" value="{{ __('Дата рождения') }}" />
                <x-input id="date_of_birth" class="block mt-1 w-full" name="date_of_birth" :value="old('date_of_birth')" autocomplete="date_of_birth" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('forms.password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('forms.repeat_password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('forms.already_have_account') }}
                </a>

                <x-button class="ms-4">
                    {{ __('forms.confirm') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
