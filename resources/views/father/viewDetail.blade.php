@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .emp-profile {
        margin-top: 5px;
        border-top: 2px solid blue;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: 100%;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;

        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }

    .view_detail{
        margin-top: 5%;
    }
</style>

@section('content')
    @extends('cdn')
    <div class="content-wrapper p-4 ">

        <div class="m-auto d-flex view_detail" style="width: 70%">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-notebook-pen">
                <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                <path d="M2 6h4" />
                <path d="M2 10h4" />
                <path d="M2 14h4" />
                <path d="M2 18h4" />
                <path
                    d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
            </svg>
            <p class="ml-1">មើលលម្អិត</p>
        </div>
        <div class="container emp-profile pl-5" style="width: 70%">
            <form method="post">
                <div class="row">

                    <div class="col-md-12">
                        <div class="profile-head">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>
                                        {{ $father->fname_kh }} {{ $father->lname_kh }}
                                    </h5>
                                    <h6>
                                        {{ $father->fname_en }} {{ $father->lname_en }}
                                    </h6>
                                </div>

                                <div class="mr-5 mt-3">


                                    <img src="{{ asset('upload/' . $father->photo) }}" width="100px" height="100px"
                                        style="object-fit: contain" alt="">

                                </div>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">ប្រវត្តិរូប</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">ទីកន្លែងកំណើត</a>
                                </li>
                            </ul>
                        </div>


                    </div>

                </div>
                <div class="row">

                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ភេទ៖ </label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $father->gender }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>សញ្ជាត្តិ​៖​​</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{ $father->nationality }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ថ្ងៃខែឆ្នាំកំណើត៖</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $father->day }}-{{ $father->month }}-{{ $father->year }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>លេខទូរស័ព្ទ៖</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $father->phones }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>មុខរបរបច្ចុប្បន្ន៖</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $father->job_title }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ស្ថិនៅភូមិ៖</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $father->village_kh_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ឃុំ/សង្កាត់៖</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $father->commune_kh_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ស្រុក/ខ័ណ្ខ៖</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $father->district_kh_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ខេត្ត/ក្រុង៖</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $father->province_kh_name }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </form>

            <div class="d-flex justify-content-end mr-3">
                <a href="{{ route('tab.father') }}" class="btn btn-primary btn-sm rounded-pill mb-4">
                    < ត្រឡប់ក្រោយ</a>
            </div>
        </div>


    </div>
@endsection
