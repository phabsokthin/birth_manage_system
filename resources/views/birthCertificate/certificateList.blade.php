{{--
@extends('cdn')
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
            title: '<h6 class="d-flex align-items-center" style="margin-left:10px">បានលុបដោយជោគជ័យ។</h6>'
        });
    </script>
@endif --}}

<div class="mt-3">
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">បញ្ជីសំបុត្រកំណើត</legend>

        <div class="mt-3 table-responsive">
            <h6 style="font-size: 18px">តារាងបញ្ជី</h6>
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
                    @foreach ($births as $b)
                        <tr>
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
                            <td>
                                @if (empty($b->fatherName_kh) || empty($b->lfatherName_kh))
                                <button class="btn btn-xs btn-danger rounded-pill">មិនមាន</button>
                            @else
                                {{ $b->fatherName_kh }} {{ $b->lfatherName_kh }}
                            @endif
                            
                            
                            </td>
                            <td>{{ $b->fmotherName_kh }} {{ $b->lmotherName_kh }}</td>

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

                                <a href="{{ route('print_certificate.birth_certificate', $b->birth_id) }}"
                                    class="btn btn-success btn-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        style="color: white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-printer">
                                        <path
                                            d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                        <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                                        <rect x="6" y="14" width="12" height="8" rx="1" />
                                    </svg>
                                </a>
                                <a href="{{ route('get_birth.birthCertificate', $b->birth_id) }}"
                                    class="btn btn-primary btn-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                    data-target="#delete{{ $b->birth_id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                            </td>


                            <!-- delete -->
                            <div class="modal fade" id="delete{{ $b->birth_id }}" tabindex="-1" role="dialog"
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
                                                        <a style="color: red;"> {{ $b->fname_kh }}
                                                            {{ $b->fname_kh }} </a>មែនទេ?
                                                    </h3>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">បិទ</button>
                                            <a href="{{ route('delete.birthCertificate', $b->birth_id) }}"
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
    </fieldset>
</div>
