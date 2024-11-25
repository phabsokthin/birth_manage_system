@extends('layouts.layout')
@section('content')
@extends('cdn')
<style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>
<div style="background-color: white" class="content-wrapper  -mt-4 p-5">

    <div class="d-flex justify-content-center mb-3">
        <img width="150px"
            src="https://static.wixstatic.com/media/949475_3b301df3106b436799f365fd857076d2~mv2.png/v1/fill/w_214,h_210,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Logo%2001.png"
            alt="">
    </div>

    <div class="d-flex justify-content-end" style="margin-top: -20px">
        <div class="text-center">
            <h4 style=" font-family: 'Moul', cursive;">ព្រះរាជាណាចក្រកម្ពុជា</h4>
            <h5 style=" font-family: 'Moul', cursive;">ជាតិ​​ សាសនា ព្រះមហាក្សត្រ</h5>
            <div>
                <img width="100px" src="{{ asset('asset/Screenshot 2024-11-02 at 9.31.46 at night.png') }}"
                    alt="">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div style="line-height: 15px">
            <div style=" font-family: 'Moul', cursive;" class="d-flex ">រាជធានី​​ ខេត្ត &nbsp; &nbsp;<p> <b>{{ $births->birth_province }} </b></p>
            </div>
            <div style=" font-family: 'Moul', cursive;" class="d-flex">ក្រុង​​ ស្រុក ខណ្ឌ &nbsp; &nbsp;<p><b>{{ $births->birth_district }}</b></p>
            </div>
            <div style=" font-family: 'Moul', cursive;" class="d-flex">ឃុំ​ សង្កាត់ &nbsp; &nbsp;<p><b>{{ $births->birth_commune }}</b></p>
            </div>
        </div>

        <div style="line-height: 15px">
            <div style=" font-family: 'Moul', cursive;" class="d-flex">លេខ<p>..............................................................</p>
            </div>
            <div style=" font-family: 'Moul', cursive;" class="d-flex">សៀវភៅកំណើតលេខ<p><b> &nbsp; &nbsp;&nbsp;{{ $births->birth_no }}</b></p>
            </div>
            <div style=" font-family: 'Moul', cursive;" class="d-flex">ឆ្នាំ<p>..................................................................</p>
            </div>
        </div>
    </div>



    <div class="text-center">
        <h2 class="mb-2 mt-2" style=" font-family: 'Moul', cursive;">សំបុត្រកំណើត</h2>
    </div>

    <table class="table table-bordered form-table">

        <tbody>
            <tr>
                <td style="width: 36.80%;" colspan="2">នាមត្រកូល</td>
                <td width="50%" class="text-center">{{ $births->fname_kh }}</td>

                <td colspan="2" width="10%" rowspan="2">
                    <h6 class="text-center">ភេទ</h6>
                    <h6 class="text-center">{{ $births->gender }}</h6>
                </td>
            </tr>
            <tr>
                <td style="width: 36.80%;" colspan="2" class="">នាមខ្លួនទារក</td>
                <td class="text-center">{{ $births->lname_kh }}</td>

            </tr>
            <tr>
                <td class="p-4" rowspan="2">
                    <h6>ជាអក្សឡាតាំង</h6>
                </td>
                <td width="15%">
                    <h6>នាមត្រកូល</h6>
                </td>
                <td colspan="2" class="text-center">{{ $births->lname_en }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
            </tr>

            <tr>
                <td width="20px">
                    <h6>នាមខ្លួនទារក</h6>
                </td>
                <td colspan="4" class="text-center">{{ $births->fname_en }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>

            </tr>
            <tr>
                <td colspan="2">សញ្ជាតិ</td>

                <td colspan="4" class="text-center">{{ $births->nationality }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>

            </tr>
            <tr>
                <td colspan="2">ថ្ងៃ​ ខែ ឆ្នាំកំណើត</td>

                <td colspan="4" class="text-center">នៅថ្ងៃទី{{ $births->day }} ខែ {{ $births->month }} ឆ្នាំ​ {{ $births->year }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>

            </tr>
            <tr>
                <td rowspan="2" colspan="2">
                    <div class="text-center">
                        ទីកន្លែងកំណើត<br>
                        ភូមិ​​ ឃុំ សង្កាត់ ក្រុង ស្រុក ខណ្ឌ <br>
                        រាជធានី​ ខេត្ត ប្រទេស
                    </div>
                </td>
                <td colspan="2" rowspan="2" class="text-center">

                    <p class="mt-3">នៅភូម​ {{ $births->birth_village }} ឃុំ​ {{ $births->birth_commune }} ស្រុក​​ {{ $births->birth_district }} ខេត្ត​ {{ $births->birth_province }}&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</p>


                </td>

            </tr>
            <tr>

            </tr>


        </tbody>



    </table>

    <table class="table table-bordered form-table ">
        <tbody>
            <tr>
                <td style="width: 37.80%; text-align: center;" class="text-center">ឪពុក ម្តាយទារក</td>

                <td class="text-center">ឪពុក</td>

                <td class="text-center">ម្តាយ</td>

            </tr>
            <tr>
                <td width="560px">នាមត្រកូល និង នាមខ្លួន</td>

                <td width="560px" class="text-center">{{ $births->father_name_kh }} {{ $births->father_last_name_kh }}</td>

                <td width="560px" class="text-center">{{ $births->mother_name_kh }} {{ $births->mother_last_name_kh }}</td>

            </tr>
            <tr>
                <td width="560px">ជាអក្សរឡាតាំង</td>

                <td width="560px" class="text-center">{{ $births->father_first_name_en }} {{ $births->father_last_name_en }}</td>

                <td width="560px" class="text-center">{{ $births->mother_first_name_en }} {{ $births->mother_last_name_en }}</td>
            </tr>
            <tr>
                <td width="580px">សញ្ជាត្តិ</td>
                <td width="560px" class="text-center">{{ $births->father_nationality }}</td>

                <td width="560px" class="text-center">{{ $births->mother_nationality }}</td>


            </tr>
            <tr>
                <td width="580px">ថ្ងៃ ខែ ឆ្នាំកំណើត</td>

                <td width="560px" class="text-center">នៅថ្ងៃទី​{{ $births->father_birth_day }} ខែ {{ $births->father_birth_month }} ឆ្នាំ​ {{ $births->father_birth_year }}</td>

                <td width="560px" class="text-center">នៅថ្ងៃទី​{{ $births->mother_birth_day }} ខែ {{ $births->mother_birth_month }} ឆ្នាំ​ {{ $births->mother_birth_year }}</td>

            </tr>
            <tr>
                <td width="580px">
                    <div class="text-center">
                        ទីកន្លែងកំណើត<br>
                        ភូមិ​​ ឃុំ សង្កាត់ ក្រុង ស្រុក ខណ្ឌ <br>
                        រាជធានី​ ខេត្ត ប្រទេស
                    </div>
                </td>
                <td width="560px" class="text-center">
                    @if($births->father_village && $births->father_commune && $births->father_district && $births->father_province)
                    {{ $births->father_village }} ឃុំ {{ $births->father_commune }} ស្រុក {{ $births->father_district }} ខេត្ត {{ $births->father_province }}
                    @else
                    {{ 'ឪពុកមិនទាន់មានអាសយដ្ឋាន' }}
                    @endif
                </td>
                <td width="560px" class="text-center">
                    @if($births->mother_village && $births->mother_commune && $births->mother_district && $births->mother_province)
                    {{ $births->mother_village }} ឃុំ {{ $births->mother_commune }} ស្រុក {{ $births->mother_district }} ខេត្ត {{ $births->mother_province }}
                    @else
                    {{ 'ម្តាយមិនទាន់មានអាសយដ្ឋាន' }}
                    @endif
                </td>

            </tr>


            <tr>
                <td width="580px">ទីលំនៅពេលទារកកើត</td>

                <td colspan="2"></td>


            </tr>
        </tbody>
    </table>

    <div class="text-right mb-4">
        <div>
            <h6 class="mt-3">ធ្វើនៅ......................ថ្ងៃទី..........ខែ............ឆ្នាំ..............</h6>
            <h6 class="mt-3" style="font-family: 'Moul', cursive;margin-right: 80px; margin-bottom:30px;">មន្ត្រីអនុត្រាកូលដ្ឋាន</h6>

        </div>
        <hr style="border: 1px solid white">


    </div>


    <div class="mb-5 d-flex justify-content-end">
        <a href="{{ route('tab.birthcertificate') }}" class="btn btn-danger no-print"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-corner-up-left">
                <polyline points="9 14 4 9 9 4" />
                <path d="M20 20v-7a4 4 0 0 0-4-4H4" />
            </svg> ត្រឡប់</a>
        <button onclick="window.print()" class="btn btn-primary ml-2 no-print"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-printer">
                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                <rect x="6" y="14" width="12" height="8" rx="1" />
            </svg> បោះពុម្ភ</button>
    </div>
    <hr style="border: 1px solid white">

    {{-- <div style="border: 1px solid black; relative">
            <p style="width: 200px;height:auto ;border-right:1px solid black;">hello</p>
        </div> --}}
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection