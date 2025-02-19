<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ucwords($pharmacy->name)}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Pharmacy Profile Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update your pharmacy account's profile information.") }}
                            </p>
                        </header>


                        <form method="post" action="{{ route('pharmacy.update', $pharmacy->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method("patch")

                            <div>
                                <x-input-label for="name" value="Pharmacy name"/>
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ucwords($pharmacy->name)}}" disabled/>

                            </div>

                            <div>
                                <x-input-label for="employees" value="Enter Employees\s Phone Number" />
                                <x-text-input type="text" class="mt-4 block w-full" name="employees" id="members-tags" autocomplete="off" placeholder="Add members..." />
                                <x-input-error :messages="$errors->get('employees')" class="mt-2"/>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>Save</x-primary-button>
                            </div>
                        </form>
                    </section>

                </div>

            </div>


        </div>

    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                               Employees
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 mb-6">
                                {{ __("List of all employees in your pharmacy.") }}
                            </p>
                        </header>
                        <div class="overflow-x-auto">
                            <table class="table">
                                <!-- head -->
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Date Added</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- row 1 -->
                                @foreach ($pharmacy->users as $user)
                                    <tr>

                                        <td>{{$user->name}}</td>
                                        <td>{{$user->pivot->role->name}}</td>
                                        <td>{{$user->pivot->created_at}}</td>
                                    </tr>
                                @endforeach




                                </tbody>
                            </table>
                        </div>
                        </section>
</div>
            </div>
            </div>
        </div>
</x-app-layout>
