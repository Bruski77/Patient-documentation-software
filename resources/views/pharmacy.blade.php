<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pharmacy') }}
        </h2>
    </x-slot>



    <x-guest-layout>
        <form method="POST" action="{{ route('pharmacy') }}">
            @csrf

            <!-- Name -->
            <div class="pt-6">
                <x-input-label for="name" :value="__('Name of Pharmacy')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    <!-- State -->
            <div class="pt-6">
            <x-input-label for="name" :value="__('State')" />
                <div class="mt-4">
                <select id="select-state" placeholder="Select a state..." autocomplete="off" >
                    <option value="">Select a state...</option>
                    <option value="lagos">Lagos</option>
                    <option value="oyo">Oyo</option>
                    <option value="ogun">Ogun</option>
                </select>
                </div>

            </div>

<!-- Acpn zones -->
         <div hidden id="zone" class="pt-6">
            <x-input-label for="Acpn" :value="__('LGA/Acpn Zones')" />
                <div class="mt-4">
                <select x-data="{ lgas: {{$lgas}} }" id="select-LGA/ACPN zone" placeholder="Select LGA/ACPN Zone..." autocomplete="off" >
                    <option value="">Select LGA/ACPN Zone...</option>
{{--                    <option value="4">Lagos</option>--}}
{{--                    <option value="1">Oyo</option>--}}
{{--                    <option value="3">Ogun</option>--}}
                    <template x-for="lga in lgas">

                        <option x-text="lga" :value="lga">Lagos</option>
                    </template>
                </select>
                </div>

            </div>


            <!-- adding members -->
            <div class="pt-6">
                <x-input-label for="members" :value="__('Add Employees')" />
                <div class="mt-4">
                    <input id="members-tags"  autocomplete="off" placeholder="Add members...">
                </div>

            </div>


                <x-primary-button class="mt-4">
                    {{ __('Submit') }}
                </x-primary-button>
        </form>

    </x-guest-layout>


</x-app-layout>
