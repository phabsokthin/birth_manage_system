<div class="mt-3">
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">បញ្ជីព័ត៌មានរបស់ម្តាយ</legend>

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
                                @if ($mother->mstatus === 1  )
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

                                <a href="{{ route('view_details.mother', $mother->mother_id) }}" class="btn btn-warning btn-xs">
                                    <i class="fas fa-eye text-white"></i>
                                </a>
                                <a href="{{ route('fetch_mother.mother', $mother->mother_id) }}" class="btn btn-primary btn-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                    data-target="#delete{{ $mother->mother_id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                            </td>


                            <!-- delete -->
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
    </fieldset>
</div>
