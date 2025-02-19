<x-app-layout>
    @if($pharmacies->isEmpty())
                <div class="flex w-full h-[70vh] justify-center items-center">
                <div>
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-60 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                  <p class="text-white">You do not have a pharmacy yet</p>
                    <div class="flex justify-center items-center mt-8">
                       <a href="{{ route('pharmacy.create') }}" class="px-4 py-2 text-sm font-medium text-gray-700 border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">Create Pharmacy</a>
                    </div>
                </div>

                </div>


            @endif
        @foreach($pharmacies as $pharmacy)

            <div class="grid lg:grid-cols-3 gap-8">
                <section class="text-white">
                    <x-section-heading>Your Pharmacy</x-section-heading>
                    <div class="mx-9 p-6 bg-white/5 rounded-xl flex flex-col text-center">

                        <div class="self-start text-sm">{{ucfirst($pharmacy->state)}}</div>
                        <div class="py-8 font-bold">
                            <a href="/pharmacy/{{$pharmacy->id}}"><h3>{{ucwords($pharmacy->name)}}</h3></a>
                            <p>{{ucfirst(strtolower($pharmacy->lga))}} Local Government Area</p>
                        </div>
                        <div class="flex justify-between items-center mt-auto">
                            <div>
                                <button class="bg-white/10 hover:bg-white/25 px-2 py-1 rounded-xl text-xs transition-colors duration-300">Pharmacy</button>
                                <button class="bg-white/10 hover:bg-white/25 px-2 py-1 rounded-xl text-xs transition-colors duration-300">Drugs</button>
                            </div>

                        </div>



                    </div>
                </section>

            </div>

        @endforeach

</x-app-layout>



















{{--<x-app-layout>--}}

{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            List of Pharmacies--}}
{{--        </h2>--}}
{{--    </x-slot>--}}


{{--    <div class="space-y-4 mt-10">--}}
{{--        @if($pharmacies->isEmpty())--}}
{{--            <div class="flex w-full h-[70vh] justify-center items-center">--}}
{{--            <div>--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-60 text-white">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />--}}
{{--                </svg>--}}
{{--                <p class="text-white">You do not have a pharmacy yet</p>--}}
{{--                <div class="flex justify-center items-center mt-8">--}}
{{--                    <a href="{{ route('pharmacy.create') }}" class="px-4 py-2 text-sm font-medium text-gray-700 border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">Create Pharmacy</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            </div>--}}


{{--        @endif--}}
{{--        @foreach($pharmacies as $pharmacy)--}}
{{--            <div class="mx-10">--}}
{{--                <a href="#" class="block px-4 py-6 border border-gray-200 rounded-lg">--}}
{{--                    <div class="font-bold text-blue-500 text-sm">--}}
{{--                        {{$pharmacy->name}}--}}
{{--                    </div>--}}
{{--                    <div class="text-white text-sm mt-5">--}}
{{--                        <strong>{{$pharmacy->state}}:</strong> {{$pharmacy->lga}} local government area--}}
{{--                    </div>--}}

{{--                </a>--}}

{{--            </div>--}}


{{--        @endforeach--}}


{{--    </div>--}}


{{--</x-app-layout>--}}
