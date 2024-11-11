@extends('layouts.layout')

@section('content')


    
    <div class="content-wrapper p-3">
        <div class="bg-white shadow-md p-3">
            <h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper">
                    <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/>
                    <path d="M18 14h-8"/>
                    <path d="M15 18h-5"/>
                    <path d="M10 6h8v4h-8V6Z"/>
                </svg>
                របាយការណ៍សំបុត្រកំណើត
            </h5>
        </div>

        <div class=" shadow-md bg-white mt-3 p-3 ">
            <div class="row">
                <div class="col-md-9">
                    <form action="{{ route('report_birth') }}" method="GET">
                        <div class="row ">
                            <div class="col-md-3">
                                <label for="from_date">ចាប់ផ្តើម</label>
                                <input type="date" class="form-control" name="from_date" value="{{ request('from_date') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="to_date">រហូតដល់</label>
                                <input type="date" class="form-control" name="to_date" value="{{ request('to_date') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="filter_button"></label>
                                <button type="submit" class="btn-primary btn btn-sm rounded-pill" style="margin-top: 35px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                                    </svg> ច្រោះ
                                </button>
                            </div>
    
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="{{ route('report_birth') }}" method="GET">
                        <div class="row">
                            <!-- Other form fields -->
                            
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="bstatus">ច្រោះតាម</label>
                                    <select name="bstatus" class="form-control" id="bstatus">
                                        <option value="">--ស្ថានភាព--</option>
                                        <option value="1" {{ request('bstatus') == '1' ? 'selected' : '' }}>មិនបានធ្វើ</option>
                                        <option value="2" {{ request('bstatus') == '2' ? 'selected' : '' }}>ធម្មតា</option>
                                        <option value="3" {{ request('bstatus') == '3' ? 'selected' : '' }}>បានធ្វើ</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-sm rounded-pill" style="margin-top: 35px">តម្រៀប</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           


          
            
            <div class="mt-3 table-responsive bg-white">

                <table class="table table-striped my-3 table-bordered" id="Datatable">
                    <thead class="bg-dark text-white" style="width: 100px">
                        <tr>
    
                            <th>រូបភាព</th>
                            <th>ស្ថានភាព</th>
                            <th>លេខ(No)</th>
                            <th>ឈ្មោះខ្មែរ</th>
                            <th>ឈ្មោះឡាតាំង</th>
                            <th>ឪពុក</th>
                            <th>ម្តាយ</th>
                            <th>ភេទ</th>
                            <th>លេខទូរស័ព្ទ</th>
                            <th>សញ្ជាត្តិ</th>
                            <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                            <th>មុខរបរ</th>
                            <th>ភូម</th>
                            <th>ឃុំ/សង្កាត់</th>
                            <th>ស្រុក/ក្រុង/ខ័ណ្ឌ</th>
                            <th>ខេត្ត/ក្រុង</th>
                            <th width="300px">កាលបរិច្ឆេត</th>
                            <th>សកម្មភាព</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($query_birth as $b)
                        <tr style="{{ $b->bstatus == 1 ? 'background-color: rgba(220, 53, 69, 0.6); color: white;' : '' }}">
                            <td>
                                    @if ($b->photo)
                                        <img src="{{ asset('upload/' . $b->photo) }}" style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGh5WFH8TOIfRKxUrIgJZoDCs1yvQ4hIcppw&s" 
                                             alt="Default Photo" style="width: 50px; height: auto;">
                                    @endif
                                </td>
                                <td>
                                    @if ($b->bstatus === 1)
                                        <button class="btn btn-danger btn-xs rounded-pill">មិនបានធ្វើ</button>
                                    @elseif ($b->bstatus === 2)
                                        <button class="btn btn-info btn-xs rounded-pill">ធម្មតា</button>
                                    @elseif ($b->bstatus === 3)
                                        <button class="btn btn-success btn-xs rounded-pill">បានធ្វើ</button>
                                    @endif
                                </td>
                                <td>{{ $b->birth_no }} </td>
                                <td>{{ $b->fname_kh }} {{ $b->lname_kh }}</td>
                                <td>{{ $b->fname_en }} {{ $b->lname_en }}</td>
                                <td>{{ $b->fatherName_kh }} {{ $b->fatherLname_kh }} </td>
                                <td>{{ $b->motherName_kh }} {{ $b->motherLname_kh }}</td>
                                <td>{{ $b->gender }}</td>
                                <td>{{ $b->phones }}</td>
                                <td>{{ $b->nationality }}</td>
                                <td align="center">{{ $b->day }}-{{ $b->month }}-{{ $b->year }}</td>
                                <td>{{ $b->job_title }}</td>
                                <td>{{ $b->village_kh_name }} {{ $b->village_en_name }}</td>
                                <td>{{ $b->commune_kh_name }} {{ $b->commune_en_name }}</td>
                                <td>{{ $b->district_kh_name }} {{ $b->district_en_name }}</td>
                                <td>{{ $b->province_kh_name }} {{ $b->province_en_name }}</td>
                                <td width="300px">{{ $b->created_at }}</td>
                    
                                <td>
                                    <a href="{{ route('print_certificate.birth_certificate', $b->birth_id) }}" class="btn btn-success btn-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" style="color: white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-printer">
                                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                            <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                                            <rect x="6" y="14" width="12" height="8" rx="1" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('get_birth.birthCertificate', $b->birth_id) }}" class="btn btn-primary btn-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $b->birth_id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                    
                                <!-- delete modal -->
                                <div class="modal fade" id="delete{{ $b->birth_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">លុបទិន្ន័យ</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="p_code" class="form-label">
                                                        <h3>តើអ្នកចង់លុបឈ្មោះ <a style="color: red;"> {{ $b->fname_kh }} {{ $b->fname_kh }} </a>មែនទេ?</h3>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">បិទ</button>
                                                <a href="{{ route('delete.birthCertificate', $b->birth_id) }}" class="btn btn-danger">លុប</a>
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
                    ចំនួនសំបុត្រកំណើតបានធ្វើ
                    <p><b>{{ $count }} ច្បាប់</b></p>
                </div>
                
            </div>
            <div class="col-md-4 ">
                <div class="bg-white m-2 p-4">
                    ចំនួនសំបុតកំណើតមិនបានធ្វើ
                    <p><b>{{ $count_undo }} ច្បាប់</b></p>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class=" bg-white m-2 p-4">
                    ចំនួនសរុបទាំងអស់
                    <p><b>{{ $countFamily }} គ្រួសារ</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection
