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
        <legend class="scheduler-border">បញ្ជីព័ត៌មានរបស់ឪពុក</legend>

        <div class="mt-3 table-responsive">
            <h6 style="font-size: 18px">តារាងបញ្ជី</h6>
            <table class="table table-striped my-3 table-bordered" id="Datatable">
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
                    @foreach ($fathers as $father)
                        <tr>
                            <td>
                                @if ($father->photo)
                                    <img src="{{ asset('upload/' . $father->photo) }}"
                                        style="width: 80px; height: auto;">
                                @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGh5WFH8TOIfRKxUrIgJZoDCs1yvQ4hIcppw&s"
                                        alt="Default Photo" style="width: 50px; height: auto;">
                                @endif
                            </td>
                            <td>{{ $father->fname_kh }}</td>
                            <td>{{ $father->lname_kh }}</td>
                            <td>{{ $father->fname_en }}</td>
                            <td>{{ $father->lname_en }}</td>
                            <td>{{ $father->gender }}</td>
                            <td>{{ $father->phones }}</td>
                            <td>{{ $father->nationality }}</td>
                            <td>
                                @if ($father->fstatus === 1  )
                                    <button class="btn btn-success btn-xs rounded-pill">នៅរស់</button>
                                @else
                                    <button class="btn btn-danger btn-xs rounded-pill">ស្លាប់</button>
                                @endif
                            </td>
                            <td align="center">{{ $father->day }}-{{ $father->month }}-{{ $father->year }}</td>
                            <td>{{ $father->job_title }}</td>
                            <td>{{ $father->village_kh_name }} {{ $father->village_en_name }}</td>
                            <td>{{ $father->commune_kh_name }} {{ $father->commune_en_name }}</td>
                            <td>{{ $father->district_kh_name }} {{ $father->district_en_name }}</td>
                            <td>{{ $father->province_kh_name }} {{ $father->province_en_name }}</td>
                            <td>

                                <a href="{{ route('view_details.father', $father->father_id) }}" class="btn btn-warning btn-xs">
                                    <i class="fas fa-eye text-white"></i>
                                </a>
                                <a href="{{ route('update.father', $father->father_id) }}" class="btn btn-primary btn-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                    data-target="#delete{{ $father->father_id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                            </td>


                            <!-- delete -->
                            <div class="modal fade" id="delete{{ $father->father_id }}" tabindex="-1" role="dialog"
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
                                                        <a style="color: red;"> {{ $father->fname_kh }}
                                                            {{ $father->fname_kh }} </a>មែនទេ?
                                                    </h3>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">បិទ</button>
                                            <a href="{{ route('delete.father', $father->father_id) }}"
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
