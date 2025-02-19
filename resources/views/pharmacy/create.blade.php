<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pharmacy') }}
        </h2>
    </x-slot>

    <x-pharm-layout>
        <form method="POST" action="{{ route('pharmacy.index') }}">
            @csrf

            <!-- Name -->
            <div class="pt-6">

                <x-input-label for="name" :value="__('Name of Pharmacy')"/>
                <div class="mt-4">
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                  required autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
            </div>
            <!-- State -->
            <div class="pt-6">
                <x-input-label for="state" :value="__('State')"/>
                <div class="mt-4">
                    <select name="state" id="select-state" placeholder="Select a state..." autocomplete="off">
                        <option value="">Select a state...</option>
                        <option value="lagos" {{ old('state') === 'lagos' ? 'selected' : ''}} >Lagos</option>
                        <option value="oyo" {{ old('state') === 'oyo' ? 'selected' : ''}} >Oyo</option>
                        <option value="ogun" {{ old('state') === 'ogun' ? 'selected' : ''}} >Ogun</option>
                    </select>
                    <x-input-error :messages="$errors->get('state')" class="mt-2"/>
                </div>

            </div>

            <!-- lga  -->
            <div hidden id="zone" class="pt-6">
                <x-input-label for="lga" :value="__('LGA/Acpn Zones')"/>
                <div class="mt-4">
                    <select name="lga" id="select-lga" placeholder="Select LGA/ACPN Zone..." autocomplete="off">
                    </select>
                    <x-input-error :messages="$errors->get('lga')" class="mt-2"/>
                </div>

            </div>


            <!-- adding members -->
            <div class="pt-6">
                <x-input-label for="employeesta" :value="__('Add Employees\' Phone number')"/>
                <div class="mt-4">
                    <input name="employees" id="members-tags" autocomplete="off" placeholder="Add members..." value=" {{old('employees')}} ">
                    <x-input-error :messages="$errors->get('employees')" class="mt-2"/>
                </div>

            </div>


            <x-primary-button class="mt-4">
                {{ __('Submit') }}
            </x-primary-button>
        </form>

    </x-pharm-layout>


</x-app-layout>
