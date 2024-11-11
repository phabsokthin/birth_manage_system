@extends('layouts.layout')

@section('content')
    @extends('cdn')
    @if (Session::has('success'))
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });

            Toast.fire({
                icon: 'success',
                title: '<h6 class="d-flex align-items-center" style="margin-left:10px">បានរក្សាទុកដោយជោគជ័យ</h6>'
            });
        </script>
    @endif

    @if (Session::has('delete'))
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });

            Toast.fire({
                icon: 'success',
                title: '<h6 class="d-flex align-items-center" style="margin-left:10px">បានរក្សាលុបដោយជោគជ័យ</h6>'
            });
        </script>
    @endif

    @if (Session::has('update'))
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });

            Toast.fire({
                icon: 'success',
                title: '<h6 class="d-flex align-items-center" style="margin-left:10px">បានកែប្រែដោយជោគជ័យ។</h6>'
            });
        </script>
    @endif

    <div class="content-wrapper p-4">
        <div class="d-flex gap-2 my-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-calendar-plus">
                <path d="M8 2v4" />
                <path d="M16 2v4" />
                <path d="M21 13V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8" />
                <path d="M3 10h18" />
                <path d="M16 19h6" />
                <path d="M19 16v6" />
            </svg>
            <h5 class="ml-1">សំបុត្រកំណើត</h5>
        </div>
        <div style="background-color: white; border-top:2px solid blue;" class="p-3">

            <!-- Tab links -->
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'new')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-plus">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg> បង្កើតថ្មី</button>
                <button class="tablinks" onclick="openCity(event, 'list')"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-clipboard-list">
                        <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                        <path d="M12 11h4" />
                        <path d="M12 16h4" />
                        <path d="M8 11h.01" />
                        <path d="M8 16h.01" />
                    </svg> បញ្ជីគ្រប់គ្រងសំបុត្រកំណើត</button>
                {{-- <button class="tablinks" onclick="openCity(event, 'other')"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-notebook-pen">
                        <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                        <path d="M2 6h4" />
                        <path d="M2 10h4" />
                        <path d="M2 14h4" />
                        <path d="M2 18h4" />
                        <path
                            d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                    </svg>ព័ត៍មានទាក់ទង់និងសំបុត្រកំណើត</button> --}}


                <button class="tablinks">
                    <a href="{{ route('report_birth') }}" onclick="openCity(event, 'other')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-newspaper">
                            <path
                                d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                            <path d="M18 14h-8" />
                            <path d="M15 18h-5" />
                            <path d="M10 6h8v4h-8V6Z" />
                        </svg>
                        របាយការណ៍</a>

                </button>
            </div>

            <div id="new" class="tabcontent" style="display:none;">
                @include('birthCertificate.create')
            </div>

            <div id="list" class="tabcontent" style="display:none;">
                @include('birthCertificate.certificateList')
            </div>

            <div id="other" class="tabcontent" style="display:none;">
                <h3>មិនទាន់មានទេ?</h3>
                <p>សូមរងចាំពេលក្រោយ។</p>
            </div>
        </div>
    </div>


    <script>
        function openCity(evt, cityName) {
            var tabcontent = document.getElementsByClassName("tabcontent");
            for (var i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            var tablinks = document.getElementsByClassName("tablinks");
            for (var i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // By default, open the first tab (London)
        document.getElementsByClassName('tablinks')[0].click();
    </script>
@endsection
