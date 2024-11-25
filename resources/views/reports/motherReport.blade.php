@extends('layouts.layout')

@section('content')
    <div class="content-wrapper p-3">
        <div class="bg-white shadow-md p-3">
            <h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-newspaper">
                    <path
                        d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                    <path d="M18 14h-8" />
                    <path d="M15 18h-5" />
                    <path d="M10 6h8v4h-8V6Z" />
                </svg>
                របាយការណ៍ម្តាយ
            </h5>
        </div>

        <div class=" shadow-md bg-white mt-3 p-3 ">
            <h3 class="my-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg> ច្រោះ</h3>
            <div class="row">
               
                <div class="col-md-9">
                    <form method="GET" action="{{ route('motherReport.report') }}">
                        <div class="row ">
                            
                            <div class="col-md-3 d-flex justify-content-center align-items-center">

                                <div>
                                    <label for="province">ខេត្ត</label>
                                    <select class="form-control" name="province" id="province">
                                        <option value="">ច្រោះតាមខេត្ត</option>
                                        @foreach ($province as $pro)
                                            <option value="{{ $pro->province_id }}"
                                                {{ $selectedProvince == $pro->province_id ? 'selected' : '' }}>
                                                {{ $pro->province_kh_name }} || {{ $pro->province_en_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm ml-1 rounded-pill"
                                        style="margin-top: 30px">ច្រោះ</button>
                                </div>

                            </div>
                            <div class="col-md-3 d-flex justify-content-center align-items-center">

                                <div>
                                    <label for="district">ស្រុក</label>
                                    <select class="form-control" name="district" id="district">
                                        <option value="">ច្រោះតាមស្រុក</option>
                                        @foreach ($distrinct as $dis)
                                            <option value="{{ $dis->dis_id }}" {{ $selectedDistrict == $dis->dis_id ? 'selected' : '' }}>
                                                {{ $dis->district_kh_name }} || {{ $dis->district_en_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm ml-1 rounded-pill"
                                        style="margin-top: 30px">ច្រោះ</button>
                                </div>

                            </div>
                            <div class="col-md-2 d-flex justify-content-center align-items-center">

                                <div>
                                    <label for="commune">ឃុំ/សង្កាត់</label>
                                    <select class="form-control" name="commune" id="commune">
                                        <option value="">ច្រោះតាមឃុំ/សង្កាត់</option>
                                        @foreach ($commune as $com)
                                            <option value="{{ $com->commune_id }}" {{ $selectedCommune == $com->commune_id ? 'selected' : '' }}>
                                                {{ $com->commune_kh_name }} || {{ $com->commune_en_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm ml-1 rounded-pill"
                                        style="margin-top: 30px">ច្រោះ</button>
                                </div>

                            </div>
                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                <div>
                                    <label for="village">ភូមិ</label>
                                    <select class="form-control" name="village" id="village">
                                        <option value="">ច្រោះតាមភូមិ</option>
                                        @foreach ($village as $vill)
                                            <option value="{{ $vill->id }}" {{ $selectedVillage == $vill->id ? 'selected' : '' }}>
                                                {{ $vill->village_kh_name }} || {{ $vill->village_en_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm ml-1 rounded-pill"
                                        style="margin-top: 30px">ច្រោះ</button>
                                </div>

                            </div>
                            <div class="col-md-2 d-flex justify-content-center align-items-center">

                                <div>
                                    <label for="status">ស្ថានភាព</label>
                                    <select class="form-control" name="mstatus">
                                        <option value="">ច្រោះតាមស្ថានភាព</option>
                                        <option value="1" {{ $selectedStatus == '1' ? 'selected' : '' }}>នៅរស់</option>
                                        <option value="0" {{ $selectedStatus == '0' ? 'selected' : '' }}>ស្លាប់</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm ml-1 rounded-pill"
                                        style="margin-top: 30px">ច្រោះ</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="p-3 bg-white mt-4">
            <div class="mt-3 table-responsive" style="height: 700px">
                <h6 style="font-size: 18px">តារាងបញ្ជី</h6>
                <table class="table table-striped my-3 table-bordered">
                    <thead class="bg-dark text-white" style="width: 100px">
                        <tr>
                            <th>រូបភាព</th>
                            <th>នាមត្រកូល(ខ្មែរ)</th>
                            <th>កិត្តិនាម(ខ្មែរ)</th>
                            <th>នាមត្រកូល(ឡាតាំង)</th>
                            <th>កិត្តិនាម(ឡាតាំង)</th>
                            <th>ភេទ</th>
                            <th>លេខទូរស័ព្ទ</th>
                            <th>សញ្ជាត្តិ</th>
                            <th>ស្ថានភាព</th>
                            <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                            <th>មុខរបរ</th>
                            <th>ភូម</th>
                            <th>ឃុំ/សង្កាត់</th>
                            <th>ស្រុក/ក្រុង/ខ័ណ្ឌ</th>
                            <th>ខេត្ត/ក្រុង</th>
                            <th>សកម្មភាព</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mothers as $mother)
                            <tr>
                                <td>
                                    @if ($mother->photo)
                                        <img src="{{ asset('upload/' . $mother->photo) }}"
                                            style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGh5WFH8TOIfRKxUrIgJZoDCs1yvQ4hIcppw&s"
                                            alt="Default Photo" style="width: 50px; height: auto;">
                                    @endif
                                </td>
                                <td>{{ $mother->fname_kh }}</td>
                                <td>{{ $mother->lname_kh }}</td>
                                <td>{{ $mother->fname_en }}</td>
                                <td>{{ $mother->lname_en }}</td>
                                <td>{{ $mother->gender }}</td>
                                <td>{{ $mother->phones }}</td>
                                <td>{{ $mother->nationality }}</td>
                                <td>
                                    @if ($mother->mstatus === 1)
                                        <button class="btn btn-success btn-xs rounded-pill">នៅរស់</button>
                                    @else
                                        <button class="btn btn-danger btn-xs rounded-pill">ស្លាប់</button>
                                    @endif
                                </td>
                                <td align="center">{{ $mother->day }}-{{ $mother->month }}-{{ $mother->year }}</td>
                                <td>{{ $mother->job_title }}</td>
                                <td>{{ $mother->village_kh_name }} {{ $mother->village_en_name }}</td>
                                <td>{{ $mother->commune_kh_name }} {{ $mother->commune_en_name }}</td>
                                <td>{{ $mother->district_kh_name }} {{ $mother->district_en_name }}</td>
                                <td>{{ $mother->province_kh_name }} {{ $mother->province_en_name }}</td>
                                <td>

                                    <a href="{{ route('view_details.mother', $mother->mother_id) }}"
                                        class="btn btn-warning btn-xs">
                                        <i class="fas fa-eye text-white"></i>
                                    </a>
                                    <a href="{{ route('fetch_mother.mother', $mother->mother_id) }}"
                                        class="btn btn-primary btn-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete{{ $mother->mother_id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </td>


                                <div class="modal fade" id="delete{{ $mother->mother_id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">លុបទិន្ន័យ</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="p_code" class="form-label">
                                                        <h3>តើអ្នកចង់លុបឈ្មោះ
                                                            <a style="color: red;"> {{ $mother->fname_kh }}
                                                                {{ $mother->fname_kh }} </a>មែនទេ?
                                                        </h3>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">បិទ</button>
                                                <a href="{{ route('delete.mother', $mother->mother_id) }}"
                                                    class="btn btn-danger">លុប</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4 ">
                <div class=" bg-white m-2 p-4">
                    ចំនួន
                    <p><b>{{ $count }} នាក់</b></p>
                </div>

            </div>
            <div class="col-md-4 ">
                <div class="bg-white m-2 p-4">
                    ស្ថានភាព(ស្លាប់)
                    <p><b>{{ $count_died }} នាក់</b></p>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class=" bg-white m-2 p-4">
                    ស្ថានភាព(រស់)
                    <p><b>{{ $count_alive }} គ្រួសារ</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection
