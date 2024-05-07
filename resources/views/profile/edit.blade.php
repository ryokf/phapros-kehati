@extends('layouts.layout')

@section('body')
    {{-- @dd($sorts) --}}
    <x-dashboard-sidebar :menu=$menu></x-dashboard-sidebar>
    <div class="relative md:ml-72 bg-blueGray-50">
        <!-- Header -->
        <div class="py-10">
            <x-dashboard-header />
        </div>
        <div class="relative pb-32 ">
        </div>
        <div class="w-full px-4 mx-auto md:px-10 -m-36">
            <div class="flex flex-wrap mt-4">
                <div class="relative w-full px-4 mb-12">
                    @include('profile.partials.update-profile-information-form')
                    <div class="grid grid-cols-6 lg:grid-cols-12">
                        <div class="col-span-12 lg:col-span-6 lg:mr-6">
                            @include('profile.partials.update-password-form')
                        </div>
                        <div class="col-span-12 lg:col-span-6 ">
                            @include('profile.partials.update-photo-form')
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <x-bottom-nav-bar :menu="$menu"></x-bottom-nav-bar>
    <script type="text/javascript">
        /* Make dynamic date appear */
        (function() {
            if (document.getElementById("get-current-year")) {
                document.getElementById("get-current-year").innerHTML =
                    new Date().getFullYear();
            }
        })();
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start",
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
@endsection
