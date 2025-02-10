<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pharmacy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Pharmacy") }}
                </div>
            </div>
        </div>
    </div>


    <x-guest-layout>
        <form method="POST" action="{{ route('pharmacy') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name of Pharmacy')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="acpn_zone" :value="__('Acpn zone')" />
                <x-text-input id="acpn_zone" class="block mt-1 w-full" type="text" name="acpn_zone" :value="old('acpn_zone')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('acpn_zone')" class="mt-2" />
            </div>

                <x-primary-button class="mt-2">
                    {{ __('Submit') }}
                </x-primary-button>
        </form>

    </x-guest-layout>

</x-app-layout>
