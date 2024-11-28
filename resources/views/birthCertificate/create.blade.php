<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .container {
        text-align: center;
    }

    .search-dropdown {
        margin: 20px auto;
        position: relative;
    }

    .dropdown-display {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .search-input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-bottom: 1px solid #ddd;
        box-sizing: border-box;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .dropdown-content {
        display: none;
        /* Hide by default */
        border: 1px solid #ddd;
        border-radius: 4px;
        position: absolute;
        width: 100%;
        background: white;
        z-index: 1000;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        height: 300px;
        overflow: hidden;
        overflow: auto
    }

    .dropdown-content ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .dropdown-content ul li {
        padding: 10px;
        cursor: pointer;
    }

    .dropdown-content ul li:hover {
        background-color: #f1f1f1;
    }

    /* Other styles */
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.1em 1.1em 1.1em !important;
        margin: 0 0 1.5em 0 !important;
        /* box-shadow: 0px 0px 0px 0px #000; */
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        /* font-weight: bold !important; */
        text-align: left !important;
        border: none;
        width: 250px;
        margin-left: 5px;
        padding-left: 5px;
    }
</style>


<form action="{{ route('create.birthCertificate') }}" method="POST" enctype="multipart/form-data" class="mt-4">
    @csrf
    <fieldset class="scheduler-border">
        <legend class="scheduler-border" style="color:blue; font-family: 'Koulen', sans-serif;">បង្កើតចម្លងសំបុត្រកំណើត</legend>

        <!-- Other form fields -->

        <div class="control-group">
            <div class="mt-3 d-flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-calendar-fold">
                    <path d="M8 2v4" />
                    <path d="M16 2v4" />
                    <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                    <path d="M3 10h18" />
                    <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                </svg>
                <h5 class="ml-2">រដ្ធាបាលស្រុក</h5>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">ខេត្ត: *</label>
                    <input type="text" class="form-control" required placeholder="ខេត្ត" name="	province">
                </div>
                <div class="col-md-3">
                    <label for="">ស្រុក: *</label>
                    <input type="text" class="form-control" required placeholder="ស្រុក" name="district">
                </div>
                <div class="col-md-3">
                    <label for="">ឃុំ: *</label>
                    <input type="text" class="form-control" required placeholder="ឃុំ" name="commune">
                </div>
            </div>
            <div class="col-md-2">
                <label for="">លម្អិត: *</label>
            </div>

            <!-- date note -->
            <div class="mt-3 d-flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-book">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                    <path d="M20 2H6.5A2.5 2.5 0 0 0 4 4.5v15" />
                    <path d="M20 2v15" />
                    <path d="M12 2v15" />
                </svg>
                <h5 class="ml-2">ព័ត៌មានសៀវភៅ</h5>
            </div>

            <div class="row ">
                <div class="col-md-3">
                    <label for="">លេខសំបុត្រកំណើត: *</label>
                    <input type="text" class="form-control" required placeholder="លេខសំបុត្រកំណើត" name="birth_no">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">លេខ: *</label>
                    <input type="text" class="form-control" required placeholder="ចុះលេខ" name="birth_note">
                </div>
                <div class="col-md-3">
                    <label for="">ចុះថ្ងៃទី: *</label>
                    <select name="note_day" required id="day" class="form-control">
                        <option value="">--ជ្រើសរើសថ្ងៃ--</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                        <label for="">ខែ: *</label>
                        <div>
                            <div class="form-control" id="dropdownDisplayMonth">--ជ្រើសរើសខែ--</div>
                            <div class="dropdown-content p-2" id="dropdownContentMonth">
                                <input type="text" class="form-control" id="searchInputMonth"
                                    placeholder="ស្វែងរកខែ">
                                <ul id="dropdownListMonth"></ul>
                            </div>
                        </div>
                    </div>

                    {{-- for display name to backend --}}
                    <input type="hidden" required name="note_month" id="selectedMonth" value="">
                </div>
                <div class="col-md-3">
                    <div class="search-dropdown" style="margin-top: 0px; margin-left: 0px;">
                        <label for="">ឆ្នាំ: *</label>
                        <div>
                            <div class="form-control" id="dropdownDisplayYear">--ជ្រើសរើសឆ្នាំ--</div>
                            <div class="dropdown-content p-2" id="dropdownContentYear" style="display: none;">
                                <input type="text" class="form-control" id="searchInputYear"
                                    placeholder="ស្វែងរកឆ្នាំ">
                                <ul id="dropdownListYear"></ul>
                            </div>
                        </div>
                    </div>

                    {{-- For backend --}}
                    <input type="hidden" name="note_year" id="selectedYear" value="">
                </div>
            </div>

            <fieldset class="scheduler-border">
                <legend class="scheduler-border d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-baby">
                        <circle cx="12" cy="4" r="2" />
                        <path d="M14 10a2 2 0 0 0-4 0v4" />
                        <path d="M12 20v-6" />
                        <path d="M6 20h12" />
                        <path d="M6 16l3.5-3" />
                        <path d="M18 16l-3.5-3" />
                    </svg>
                    <span style="color:blue; font-family: 'Koulen', sans-serif;">ព័ត៌មានទារក</span>
                </legend>


                <div class="row">
                    <div class="col-md-3">
                        <label for="">នាមត្រកូល(ខ្មែរ): *</label>
                        <input type="text" class="form-control" placeholder="នាមត្រកូល(ខ្មែរ)" name="ba_fname_kh">
                    </div>
                    <div class="col-md-3">
                        <label for="">នាមខ្លួនទារក(ខ្មែរ): *</label>
                        <input type="text" class="form-control" placeholder="នាមខ្លួនទារក(ខ្មែរ)" name="ba_lname_kh">
                    </div>
                    <div class="col-md-3">
                        <label for="">នាមត្រកូល(ឡាតាំង): *</label>
                        <input type="text" class="form-control" placeholder="នាមត្រកូល(ឡាតាំង)" name="ba_fname_en">
                    </div>
                    <div class="col-md-3">
                        <label for="">នាមខ្លួនទារក(ឡាតាំង): *</label>
                        <input type="text" class="form-control" placeholder="នាមខ្លួនទារក(ឡាតាំង)" name="ba_lname_en">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">ភេទ: *</label>
                        <select name="ba_gender" required class="form-control" id="">
                            <option value="">--ជ្រើសរើស--</option>
                            <option value="ប្រុស">ប្រុស</option>
                            <option value="ស្រី">ស្រី</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">សញ្ជាតិ</label>
                        <input type="text" class="form-control" placeholder="សញ្ជាតិ" name="ba_nationality">
                    </div>
                </div>
                <div class="mt-3 d-flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-calendar-fold">
                        <path d="M8 2v4" />
                        <path d="M16 2v4" />
                        <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                        <path d="M3 10h18" />
                        <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                    </svg>
                    <h5 class="ml-2">ថ្ងៃខែឆ្នាំកំណើត</h5>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">ថ្ងៃទី: *</label>
                        <select name="ba_day"  id="ba_day" class="form-control">
                            <option value="">--ជ្រើសរើសថ្ងៃ--</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">ខែ: *</label>
                            <div>
                                <div class="form-control" id="ba_dropdownDisplayMonth">--ជ្រើសរើសខែ--</div>
                                <div class="dropdown-content p-2" id="ba_dropdownContentMonth">
                                    <input type="text" class="form-control" id="ba_searchInputMonth"
                                        placeholder="ស្វែងរកខែ">
                                    <ul id="ba_dropdownListMonth"></ul>
                                </div>
                            </div>
                        </div>

                        {{-- for display name to backend --}}
                        <input type="hidden"  name="ba_month" id="ba_selectedMonth" value="">
                    </div>
                    <div class="col-md-3">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left: 0px;">
                            <label for="">ឆ្នាំ: *</label>
                            <div>
                                <div class="form-control" id="ba_dropdownDisplayYear">--ជ្រើសរើសឆ្នាំ--</div>
                                <div class="dropdown-content p-2" id="ba_dropdownContentYear" style="display: none;">
                                    <input type="text" class="form-control" id="ba_searchInputYear"
                                        placeholder="ស្វែងរកឆ្នាំ">
                                    <ul id="ba_dropdownListYear"></ul>
                                </div>
                            </div>
                        </div>

                        {{-- For backend --}}
                        <input type="hidden" name="ba_year" id="ba_selectedYear" value="">
                    </div>
                </div>
                <div class="mt-1 d-flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pinned">
                        <path
                            d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                        <circle cx="12" cy="8" r="2" />
                        <path
                            d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
                    </svg>
                    <h5 class="ml-2">ទីកន្លែងកំណើត</h5>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="">ខេត្ត: *</label>
                        <select name="ba_province" id="province-select"  class="form-control">
                            <option value="">--ជ្រើសរើស--</option>
                            @foreach ($province as $pro)
                            <option value="{{ $pro->province_kh_name }}">{{ $pro->province_kh_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">ស្រុក: *</label>
                            <div>
                                <div class="form-control" id="ba_dropdownDisplayDistrict"
                                    onclick="toggleDropdown('ba_dropdownContentDistrict')">
                                    --ជ្រើសរើសស្រុក--
                                </div>
                                <div class="dropdown-content p-2" id="ba_dropdownContentDistrict">
                                    <input type="text" class="form-control" id="ba_searchInputDistrict"
                                        placeholder="ស្វែងរកស្រុក">
                                    <ul id="ba_dropdownListDistrict"></ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ba_district" id="ba_selectedDistrict" value="">
                    </div>

                    <div class="col-md-2">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">ឃុំ/សង្កាត់: *</label>
                            <div>
                                <div class="form-control" id="ba_dropdownDisplayCommune"
                                    onclick="toggleDropdown('ba_dropdownContentCommune')">
                                    --ជ្រើសរើស--
                                </div>
                                <div class="dropdown-content p-2" id="ba_dropdownContentCommune">
                                    <input type="text" class="form-control" id="ba_searchInputCommune"
                                        placeholder="ស្វែងរកឃុំ">
                                    <ul id="ba_dropdownListCommune"></ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ba_commune" id="ba_selectedCommune" value="">
                    </div>

                    <div class="col-md-2">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">នៅភូមិ: *</label>
                            <div>
                                <div class="form-control" id="ba_dropdownDisplayVillage"
                                    onclick="toggleDropdown('ba_dropdownContentVillage')">
                                    --ជ្រើសរើស--
                                </div>
                                <div class="dropdown-content p-2" id="ba_dropdownContentVillage">
                                    <input type="text" class="form-control" id="ba_searchInputVillage"
                                        placeholder="ស្វែងរកភូមិ">
                                    <ul id="ba_dropdownListVillage"></ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ba_village" id="ba_selectedVillage" value="">
                    </div>
                    <div class="col-md-2">
                        <label for="">:ប្រទេស *</label>
                        <input type="text" class="form-control" placeholder="ប្រទេស" name="ba_country">
                    </div>
                    <div class="col-md-2">
                        <label for="">លម្អិត: *</label>
                    </div>
            </fieldset>
            <!-- father infor -->
            <fieldset class="scheduler-border">
                <legend class="scheduler-border d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-user">
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                    <h5 class="ml-2" style="color:blue; font-family: 'Koulen', sans-serif;">ព័ត៌មានឪពុក</h5>

                </legend>


                <div class="row">
                    <div class="col-md-3">
                        <label for="">នាមត្រកូល(ខ្មែរ): *</label>
                        <input type="text" class="form-control" placeholder="នាមត្រកូល(ខ្មែរ)" name="fa_fname_kh">
                    </div>
                    <div class="col-md-3">
                        <label for="">នាមខ្លួន(ខ្មែរ): *</label>
                        <input type="text" class="form-control" placeholder="នាមខ្លួន(ខ្មែរ)" name="fa_lname_kh">
                    </div>
                    <div class="col-md-3">
                        <label for="">នាមត្រកូល(ឡាតាំង): *</label>
                        <input type="text" class="form-control" placeholder="នាមត្រកូល(ឡាតាំង)" name="fa_fname_en">
                    </div>
                    <div class="col-md-3">
                        <label for="">នាមខ្លួន(ឡាតាំង): *</label>
                        <input type="text" class="form-control" placeholder="នាមខ្លួន(ឡាតាំង)" name="fa_lname_en">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">សញ្ជាតិ</label>
                        <input type="text" class="form-control" placeholder="សញ្ជាតិ" name="fa_nationality">
                    </div>
                </div>
                <!-- DOB of father  -->
                <div class="mt-3 d-flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-calendar-fold">
                        <path d="M8 2v4" />
                        <path d="M16 2v4" />
                        <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                        <path d="M3 10h18" />
                        <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                    </svg>
                    <h5 class="ml-2">ថ្ងៃខែឆ្នាំកំណើត</h5>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">ថ្ងៃទី: *</label>
                        <select name="fa_day"  id="fa_day" class="form-control">
                            <option value="">--ជ្រើសរើសថ្ងៃ--</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">ខែ: *</label>
                            <div>
                                <div class="form-control" id="fa_dropdownDisplayMonth">--ជ្រើសរើសខែ--</div>
                                <div class="dropdown-content p-2" id="fa_dropdownContentMonth">
                                    <input type="text" class="form-control" id="fa_searchInputMonth"
                                        placeholder="ស្វែងរកខែ">
                                    <ul id="fa_dropdownListMonth"></ul>
                                </div>
                            </div>
                        </div>

                        {{-- for display name to backend --}}
                        <input type="hidden"  name="fa_month" id="fa_selectedMonth" value="">
                    </div>
                    <div class="col-md-3">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left: 0px;">
                            <label for="">ឆ្នាំ: *</label>
                            <div>
                                <div class="form-control" id="fa_dropdownDisplayYear">--ជ្រើសរើសឆ្នាំ--</div>
                                <div class="dropdown-content p-2" id="fa_dropdownContentYear" style="display: none;">
                                    <input type="text" class="form-control" id="fa_searchInputYear"
                                        placeholder="ស្វែងរកឆ្នាំ">
                                    <ul id="fa_dropdownListYear"></ul>
                                </div>
                            </div>
                        </div>

                        {{-- For backend --}}
                        <input type="hidden" name="fa_year" id="fa_selectedYear" value="">
                    </div>
                </div>
                <div class="mt-1 d-flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pinned">
                        <path
                            d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                        <circle cx="12" cy="8" r="2" />
                        <path
                            d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
                    </svg>
                    <h5 class="ml-2">ទីកន្លែងកំណើត</h5>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <label for="">ខេត្ត: *</label>
                        <select name="fa_province" id="fa_province-select"  class="form-control">
                            <option value="">--ជ្រើសរើស--</option>
                            @foreach ($province as $pro)
                            <option value="{{ $pro->province_kh_name }}">{{ $pro->province_kh_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">ស្រុក: *</label>
                            <div>
                                <div class="form-control" id="fa_dropdownDisplayDistrict"
                                    onclick="toggleDropdown('fa_dropdownContentDistrict')">
                                    --ជ្រើសរើសស្រុក--
                                </div>
                                <div class="dropdown-content p-2" id="fa_dropdownContentDistrict">
                                    <input type="text" class="form-control" id="fa_searchInputDistrict"
                                        placeholder="ស្វែងរកស្រុក">
                                    <ul id="fa_dropdownListDistrict"></ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="fa_district" id="fa_selectedDistrict" value="">
                    </div>

                    <div class="col-md-2">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">ឃុំ/សង្កាត់: *</label>
                            <div>
                                <div class="form-control" id="fa_dropdownDisplayCommune"
                                    onclick="toggleDropdown('fa_dropdownContentCommune')">
                                    --ជ្រើសរើស--
                                </div>
                                <div class="dropdown-content p-2" id="fa_dropdownContentCommune">
                                    <input type="text" class="form-control" id="fa_searchInputCommune"
                                        placeholder="ស្វែងរកឃុំ">
                                    <ul id="fa_dropdownListCommune"></ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="fa_commune" id="fa_selectedCommune" value="">
                    </div>

                    <div class="col-md-2">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">នៅភូមិ: *</label>
                            <div>
                                <div class="form-control" id="fa_dropdownDisplayVillage"
                                    onclick="toggleDropdown('fa_dropdownContentVillage')">
                                    --ជ្រើសរើស--
                                </div>
                                <div class="dropdown-content p-2" id="fa_dropdownContentVillage">
                                    <input type="text" class="form-control" id="fa_searchInputVillage"
                                        placeholder="ស្វែងរកភូមិ">
                                    <ul id="fa_dropdownListVillage"></ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="fa_village" id="fa_selectedVillage" value="">
                    </div>
                    <div class="col-md-2">
                        <label for="">:ប្រទេស *</label>
                        <input type="text" class="form-control" placeholder="ប្រទេស" name="fa_country">
                    </div>
                    <div class="col-md-2">
                        <label for="">លម្អិត: *</label>
                    </div>
            </fieldset>
            <!-- mother infor -->
            <fieldset class="scheduler-border">
                <legend class="scheduler-border d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-user-female">
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-4a6 6 0 0 1 12 0v4" />
                    </svg>
                    <h5 class="ml-2" style="color:blue; font-family: 'Koulen', sans-serif;">ព័ត៌មានម្តាយ</h5>
                </legend>


                <div class="row">
                    <div class="col-md-3">
                        <label for="">នាមត្រកូល(ខ្មែរ): *</label>
                        <input type="text" class="form-control" placeholder="នាមត្រកូល(ខ្មែរ)" name="mo_fname_kh">
                    </div>
                    <div class="col-md-3">
                        <label for="">នាមខ្លួន(ខ្មែរ): *</label>
                        <input type="text" class="form-control" placeholder="នាមខ្លួន(ខ្មែរ)" name="mo_lname_kh">
                    </div>
                    <div class="col-md-3">
                        <label for="">នាមត្រកូល(ឡាតាំង): *</label>
                        <input type="text" class="form-control" placeholder="នាមត្រកូល(ឡាតាំង)" name="mo_fname_en">
                    </div>
                    <div class="col-md-3">
                        <label for="">នាមខ្លួន(ឡាតាំង): *</label>
                        <input type="text" class="form-control" placeholder="នាមខ្លួន(ឡាតាំង)" name="mo_lname_en">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">សញ្ជាតិ</label>
                        <input type="text" class="form-control" placeholder="សញ្ជាតិ" name="mo_nationality">
                    </div>
                </div>
                <div class="mt-3 d-flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-calendar-fold">
                        <path d="M8 2v4" />
                        <path d="M16 2v4" />
                        <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                        <path d="M3 10h18" />
                        <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                    </svg>
                    <h5 class="ml-2">ថ្ងៃខែឆ្នាំកំណើត</h5>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">ថ្ងៃទី: *</label>
                        <select name="mo_day"  id="mo_day" class="form-control">
                            <option value="">--ជ្រើសរើសថ្ងៃ--</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">ខែ: *</label>
                            <div>
                                <div class="form-control" id="mo_dropdownDisplayMonth">--ជ្រើសរើសខែ--</div>
                                <div class="dropdown-content p-2" id="mo_dropdownContentMonth">
                                    <input type="text" class="form-control" id="mo_searchInputMonth"
                                        placeholder="ស្វែងរកខែ">
                                    <ul id="mo_dropdownListMonth"></ul>
                                </div>
                            </div>
                        </div>

                        {{-- for display name to backend --}}
                        <input type="hidden"  name="mo_month" id="mo_selectedMonth" value="">
                    </div>
                    <div class="col-md-3">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left: 0px;">
                            <label for="">ឆ្នាំ: *</label>
                            <div>
                                <div class="form-control" id="mo_dropdownDisplayYear">--ជ្រើសរើសឆ្នាំ--</div>
                                <div class="dropdown-content p-2" id="mo_dropdownContentYear" style="display: none;">
                                    <input type="text" class="form-control" id="mo_searchInputYear"
                                        placeholder="ស្វែងរកឆ្នាំ">
                                    <ul id="mo_dropdownListYear"></ul>
                                </div>
                            </div>
                        </div>

                        {{-- For backend --}}
                        <input type="hidden" name="mo_year" id="mo_selectedYear" value="">
                    </div>
                </div>
                <div class="mt-1 d-flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pinned">
                        <path
                            d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                        <circle cx="12" cy="8" r="2" />
                        <path
                            d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
                    </svg>
                    <h5 class="ml-2">ទីកន្លែងកំណើត</h5>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="">ខេត្ត: *</label>
                        <select name="mo_province" id="mo_province-select"  class="form-control">
                            <option value="">--ជ្រើសរើស--</option>
                            @foreach ($province as $pro)
                            <option value="{{ $pro->province_kh_name }}">{{ $pro->province_kh_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">ស្រុក: *</label>
                            <div>
                                <div class="form-control" id="mo_dropdownDisplayDistrict"
                                    onclick="toggleDropdown('mo_dropdownContentDistrict')">
                                    --ជ្រើសរើសស្រុក--
                                </div>
                                <div class="dropdown-content p-2" id="mo_dropdownContentDistrict">
                                    <input type="text" class="form-control" id="mo_searchInputDistrict"
                                        placeholder="ស្វែងរកស្រុក">
                                    <ul id="mo_dropdownListDistrict"></ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="mo_district" id="mo_selectedDistrict" value="">
                    </div>

                    <div class="col-md-2">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">ឃុំ/សង្កាត់: *</label>
                            <div>
                                <div class="form-control" id="mo_dropdownDisplayCommune"
                                    onclick="toggleDropdown('mo_dropdownContentCommune')">
                                    --ជ្រើសរើស--
                                </div>
                                <div class="dropdown-content p-2" id="mo_dropdownContentCommune">
                                    <input type="text" class="form-control" id="mo_searchInputCommune"
                                        placeholder="ស្វែងរកឃុំ">
                                    <ul id="mo_dropdownListCommune"></ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="mo_commune" id="mo_selectedCommune" value="">
                    </div>

                    <div class="col-md-2">
                        <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                            <label for="">នៅភូមិ: *</label>
                            <div>
                                <div class="form-control" id="mo_dropdownDisplayVillage"
                                    onclick="toggleDropdown('mo_dropdownContentVillage')">
                                    --ជ្រើសរើស--
                                </div>
                                <div class="dropdown-content p-2" id="mo_dropdownContentVillage">
                                    <input type="text" class="form-control" id="mo_searchInputVillage"
                                        placeholder="ស្វែងរកភូមិ">
                                    <ul id="mo_dropdownListVillage"></ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="mo_village" id="mo_selectedVillage" value="">
                    </div>
                    <div class="col-md-2">
                        <label for="">ប្រទេស: *</label>
                        <input type="text" class="form-control" placeholder="ប្រទេស" name="mo_country">
                    </div>
                    <div class="col-md-2">
                        <label for="">លម្អិត: *</label>
                    </div>
                </div>
            </fieldset>
        </div>

        <!-- current address -->
        <div class="mt-1 d-flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-map-pinned">
                <path
                    d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                <circle cx="12" cy="8" r="2" />
                <path
                    d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
            </svg>
            <h5 class="ml-2">ទីកលំនៅបច្ចុប្បន្ន</h5>
        </div>

        <div class="row">

            <div class="col-md-3">
                <label for="">ខេត្ត: *</label>
                <select name="stay_province" id="stay_province-select"  class="form-control">
                    <option value="">--ជ្រើសរើស--</option>
                    @foreach ($province as $pro)
                    <option value="{{ $pro->province_kh_name }}">{{ $pro->province_kh_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                    <label for="">ស្រុក: *</label>
                    <div>
                        <div class="form-control" id="stay_dropdownDisplayDistrict"
                            onclick="toggleDropdown('stay_dropdownContentDistrict')">
                            --ជ្រើសរើសស្រុក--
                        </div>
                        <div class="dropdown-content p-2" id="stay_dropdownContentDistrict">
                            <input type="text" class="form-control" id="stay_searchInputDistrict"
                                placeholder="ស្វែងរកស្រុក">
                            <ul id="stay_dropdownListDistrict"></ul>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="stay_district" id="stay_selectedDistrict" value="">
            </div>

            <div class="col-md-2">
                <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                    <label for="">ឃុំ/សង្កាត់: *</label>
                    <div>
                        <div class="form-control" id="stay_dropdownDisplayCommune"
                            onclick="toggleDropdown('stay_dropdownContentCommune')">
                            --ជ្រើសរើស--
                        </div>
                        <div class="dropdown-content p-2" id="stay_dropdownContentCommune">
                            <input type="text" class="form-control" id="stay_searchInputCommune"
                                placeholder="ស្វែងរកឃុំ">
                            <ul id="stay_dropdownListCommune"></ul>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="stay_commune" id="stay_selectedCommune" value="">
            </div>

            <div class="col-md-2">
                <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                    <label for="">នៅភូមិ: *</label>
                    <div>
                        <div class="form-control" id="stay_dropdownDisplayVillage"
                            onclick="toggleDropdown('stay_dropdownContentVillage')">
                            --ជ្រើសរើស--
                        </div>
                        <div class="dropdown-content p-2" id="stay_dropdownContentVillage">
                            <input type="text" class="form-control" id="stay_searchInputVillage"
                                placeholder="ស្វែងរកភូមិ">
                            <ul id="stay_dropdownListVillage"></ul>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="stay_village" id="stay_selectedVillage" value="">
            </div>
            <div class="col-md-2">
                <label for="">ប្រទេស: *</label>
                <input type="text" class="form-control" placeholder="ប្រទេស" name="stay_country">
            </div>
            <div class="col-md-2">
                <label for="">លម្អិត: *</label>
            </div>

        </div>
        <!-- current address -->
        <div class="mt-1 d-flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-map-pinned">
                <path
                    d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                <circle cx="12" cy="8" r="2" />
                <path
                    d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
            </svg>
            <h5 class="ml-2">ធ្វើនៅ</h5>
        </div>

        <div class="row">

            <div class="col-md-3">
                <label for="">ធ្វើនៅ: *</label>
                <input type="text" class="form-control" placeholder="ធ្វើនៅ" name="place_start">

            </div>
            <div class="col-md-3">
                <label for="">ថ្ងៃទី: *</label>
                <select name="sta_day"  id="sta_day" class="form-control">
                    <option value="">--ជ្រើសរើសថ្ងៃ--</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                    <label for="">ខែ: *</label>
                    <div>
                        <div class="form-control" id="sta_dropdownDisplayMonth">--ជ្រើសរើសខែ--</div>
                        <div class="dropdown-content p-2" id="sta_dropdownContentMonth">
                            <input type="text" class="form-control" id="sta_searchInputMonth"
                                placeholder="ស្វែងរកខែ">
                            <ul id="sta_dropdownListMonth"></ul>
                        </div>
                    </div>
                </div>

                {{-- for display name to backend --}}
                <input type="hidden"  name="sta_month" id="sta_selectedMonth" value="">
            </div>
            <div class="col-md-3">
                <div class="search-dropdown" style="margin-top: 0px; margin-left: 0px;">
                    <label for="">ឆ្នាំ: *</label>
                    <div>
                        <div class="form-control" id="sta_dropdownDisplayYear">--ជ្រើសរើសឆ្នាំ--</div>
                        <div class="dropdown-content p-2" id="sta_dropdownContentYear" style="display: none;">
                            <input type="text" class="form-control" id="sta_searchInputYear"
                                placeholder="ស្វែងរកឆ្នាំ">
                            <ul id="sta_dropdownListYear"></ul>
                        </div>
                    </div>
                </div>

                {{-- For backend --}}
                <input type="hidden" name="sta_year" id="sta_selectedYear" value="">
            </div>

        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">រូបថត(4x6)</label>
                <input type="file" name="photo" id="imageValide" class="form-control">
                <div id="image-holder_one" class=""></div>
            </div>
        </div>


        <div class="d-flex justify-content-end mt-2">
            <button type="reset" class="btn btn-danger mr-2">ជម្រះ</button>
            <button type="submit" class="btn btn-primary" id="saveButton">រក្សាទុក</button>
            <button type="button" class="btn btn-primary" id="savingButton" style="display: none;"
                disabled>កំពុងរក្សាទុក...</button>

            <script>
                document.getElementById('saveButton').addEventListener('click', function(event) {

                    document.getElementById('savingButton').style.display = 'block';
                    document.getElementById('saveButton').style.display = 'none';

                    setTimeout(() => {
                        document.getElementById('savingButton').style.display = 'none';
                        document.getElementById('saveButton').style.display = 'block';
                    }, 1000);
                });
            </script>
        </div>

    </fieldset>
</form>

<script>
    $("#imageValide").on('change', function() {
        const size = this.files[0].size;
        // Check file size (2MB limit)
        if (size > 2000000) {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });
            Toast.fire({
                icon: 'error',
                title: '<h6 class="d-flex align-items-center" style="margin-left:10px">មិនអាចបញ្ចូលរូបភាពលើស2MBបានទេ</h6>'
            });

            var image_holder = $("#image-holder_one");
            $("#imageValide").val(null); // Clear input
            image_holder.empty(); // Clear image preview

        } else {
            // File type validation
            var countFiles = $(this)[0].files.length;
            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $("#image-holder_one");
            image_holder.empty(); // Clear existing images

            if (extn === "gif" || extn === "png" || extn === "jpg" || extn === "jpeg") {
                if (typeof(FileReader) != "undefined") {
                    for (var i = 0; i < countFiles; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $("<img />", {
                                "src": e.target.result,
                                "class": "thumb-image",
                                "width": "100px"
                            }).appendTo(image_holder);
                        };
                        image_holder.show();
                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                } else {
                    alert("This browser does not support FileReader.");
                }
            } else {
                // SweetAlert for invalid file type
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000
                });

                Toast.fire({
                    icon: 'error',
                    title: '<h6 class="d-flex align-items-center" style="margin-left:10px">សូមបញ្ចូលរូបភាពជា(gif, png, jpg, jpeg)</h6>'
                });

                $("#imageValide").val(null); // Clear input
            }
        }
    });




    // Convert numbers to Khmer digits
    function convertToKhmerNumber(num) {
        const khmerNumbers = ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'];
        return num.toString().split('').map(digit => khmerNumbers[digit]).join('');
    }

    //note date 
    // Generate days in Khmer numerals
    const daySelect = document.getElementById('day');
    for (let day = 1; day <= 31; day++) {
        let option = document.createElement('option');
        const khmerDay = convertToKhmerNumber(day);
        option.value = khmerDay; // Set value in Khmer numerals
        option.textContent = khmerDay; // Display text in Khmer numerals
        daySelect.appendChild(option);
    }

    $(document).ready(function() {
        // Array of Khmer month names
        const khmerMonths = [
            'មករា', 'កម្ភះ', 'មីនា', 'មេសា', 'ឧសភា',
            'មិថុនា', 'កក្កដា', 'សីហា', 'កញ្ញា',
            'តុលា', 'វិច្ឆិកា', 'ធ្នូ'
        ];

        // Populate month dropdown list
        khmerMonths.forEach(month => {
            $('#dropdownListMonth').append(`<li>${month}</li>`);
        });

        $('#dropdownDisplayMonth').on('click', function() {
            $('#dropdownContentMonth').toggle();
        });

        $('#searchInputMonth').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#dropdownListMonth li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#dropdownListMonth').on('click', 'li', function() {
            $('#dropdownDisplayMonth').text($(this).text());
            $('#selectedMonth').val($(this).text());
            $('#dropdownContentMonth').hide();
        });


        $('#dropdownDisplayMonth').on('click', function() {
            $('#dropdownContentMonth').toggle();
        });


        $('#dropdownDisplayMonth').on('click', function() {
            $('#dropdownContentMonth').toggle();
        });

        // Generate years from 2050 to 1900
        const startYear = 2050;
        const endYear = 1900;
        const khmerYears = [];

        // Populate khmerYears with Khmer numeral representations
        for (let year = startYear; year >= endYear; year--) {
            khmerYears.push(convertToKhmerNumber(year));
        }

        // Populate year dropdown list
        khmerYears.forEach(year => {
            $('#dropdownListYear').append(`<li>${year}</li>`);
        });

        // Toggle dropdown on click
        $('#dropdownDisplayYear').on('click', function() {
            $('#dropdownContentYear').toggle();
        });

        // Search functionality in the dropdown
        $('#searchInputYear').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#dropdownListYear li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Handle year selection from the dropdown
        $('#dropdownListYear').on('click', 'li', function() {
            $('#dropdownDisplayYear').text($(this).text());
            $('#selectedYear').val($(this).text());
            $('#dropdownContentYear').hide();
        });

        // Close dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.search-dropdown').length) {
                $('#dropdownContentYear').hide();
            }
        });

        
        //start baby dropdown
        //district dropdown
        $('#ba_dropdownDisplayDistrict').on('click', function() {
            $('#ba_dropdownContentDistrict').toggle();
        });

        $('#ba_searchInputDisctrict').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#ba_dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#ba_dropdownDisplayDistrict').on('click', 'li', function() {
            $('#ba_dropdownDisplayMonth').text($(this).text());
            $('#ba_selectedDistrict').val($(this).text());
            $('#ba_dropdownContentDistrict').hide();
        });


        $('#ba_dropdownDisplayDistrict').on('click', function() {
            $('#ba_dropdownContentDistrict').toggle();
        });


        $('#ba_dropdownDisplayDistrict').on('click', function() {
            $('#ba_dropdownContentDistrict').toggle();
        });
        //end destrict

        //commune dropdown
        $('#ba_dropdownDisplayCommune').on('click', function() {
            $('#ba_dropdownContentCommune').toggle();
        });

        $('#ba_searchInputCommune').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#ba_dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#ba_dropdownListCommune').on('click', 'li', function() {
            $('#ba_dropdownDisplayCommune').text($(this).text());
            $('#ba_selectedCommune').val($(this).text());
            $('#ba_dropdownContentCommune').hide();
        });


        $('#ba_dropdownDisplayCommune').on('click', function() {
            $('#ba_dropdownContentCommune').toggle();
        });


        $('#ba_dropdownDisplayCommune').on('click', function() {
            $('#ba_dropdownContentCommune').toggle();
        });

        //end commune dropdown

        //village

        $('#ba_dropdownDisplayVillage').on('click', function() {
            $('#ba_dropdownContentVillage').toggle();
        });

        $('#ba_searchInputVillage').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#ba_dropdownListVillage li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#ba_dropdownListVillage').on('click', 'li', function() {
            $('#ba_dropdownDisplayVillage').text($(this).text());
            $('#ba_selectedVillage').val($(this).text());
            $('#ba_dropdownContentVillage').hide();
        });


        $('#ba_dropdownDisplayVillage').on('click', function() {
            $('#ba_dropdownContentVillage').toggle();
        });


        $('#ba_dropdownDisplayVillage').on('click', function() {
            $('#ba_dropdownContentVillage').toggle();
        });
        //end villagedropdown
        //end baby dropdown 

        //start Father  dropdown
        //district dropdown
        $('#fa_dropdownDisplayDistrict').on('click', function() {
            $('#fa_dropdownContentDistrict').toggle();
        });

        $('#fa_searchInputDisctrict').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#fa_dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#fa_dropdownDisplayDistrict').on('click', 'li', function() {
            $('#fa_dropdownDisplayMonth').text($(this).text());
            $('#fa_selectedDistrict').val($(this).text());
            $('#fa_dropdownContentDistrict').hide();
        });


        $('#fa_dropdownDisplayDistrict').on('click', function() {
            $('#fa_dropdownContentDistrict').toggle();
        });


        $('#fa_dropdownDisplayDistrict').on('click', function() {
            $('#fa_dropdownContentDistrict').toggle();
        });
        //end destrict

        //commune dropdown
        $('#fa_dropdownDisplayCommune').on('click', function() {
            $('#fa_dropdownContentCommune').toggle();
        });

        $('#fa_searchInputCommune').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#fa_dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#fa_dropdownListCommune').on('click', 'li', function() {
            $('#fa_dropdownDisplayCommune').text($(this).text());
            $('#fa_selectedCommune').val($(this).text());
            $('#fa_dropdownContentCommune').hide();
        });


        $('#fa_dropdownDisplayCommune').on('click', function() {
            $('#fa_dropdownContentCommune').toggle();
        });


        $('#fa_dropdownDisplayCommune').on('click', function() {
            $('#fa_dropdownContentCommune').toggle();
        });

        //end commune dropdown

        //village

        $('#fa_dropdownDisplayVillage').on('click', function() {
            $('#fa_dropdownContentVillage').toggle();
        });

        $('#fa_searchInputVillage').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#fa_dropdownListVillage li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#fa_dropdownListVillage').on('click', 'li', function() {
            $('#fa_dropdownDisplayVillage').text($(this).text());
            $('#fa_selectedVillage').val($(this).text());
            $('#fa_dropdownContentVillage').hide();
        });


        $('#fa_dropdownDisplayVillage').on('click', function() {
            $('#fa_dropdownContentVillage').toggle();
        });


        $('#fa_dropdownDisplayVillage').on('click', function() {
            $('#fa_dropdownContentVillage').toggle();
        });
        //end village 
        //end father 

        //start mother  dropdown
        //district dropdown
        $('#mo_dropdownDisplayDistrict').on('click', function() {
            $('#mo_dropdownContentDistrict').toggle();
        });

        $('#mo_searchInputDisctrict').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#mo_dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#mo_dropdownDisplayDistrict').on('click', 'li', function() {
            $('#mo_dropdownDisplayMonth').text($(this).text());
            $('#mo_selectedDistrict').val($(this).text());
            $('#mo_dropdownContentDistrict').hide();
        });


        $('#mo_dropdownDisplayDistrict').on('click', function() {
            $('#mo_dropdownContentDistrict').toggle();
        });


        $('#mo_dropdownDisplayDistrict').on('click', function() {
            $('#mo_dropdownContentDistrict').toggle();
        });
        //end destrict

        //commune dropdown
        $('#mo_dropdownDisplayCommune').on('click', function() {
            $('#mo_dropdownContentCommune').toggle();
        });

        $('#mo_searchInputCommune').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#mo_dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#mo_dropdownListCommune').on('click', 'li', function() {
            $('#mo_dropdownDisplayCommune').text($(this).text());
            $('#mo_selectedCommune').val($(this).text());
            $('#mo_dropdownContentCommune').hide();
        });


        $('#mo_dropdownDisplayCommune').on('click', function() {
            $('#mo_dropdownContentCommune').toggle();
        });


        $('#mo_dropdownDisplayCommune').on('click', function() {
            $('#mo_dropdownContentCommune').toggle();
        });

        //end commune dropdown

        //village

        $('#mo_dropdownDisplayVillage').on('click', function() {
            $('#mo_dropdownContentVillage').toggle();
        });

        $('#mo_searchInputVillage').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#mo_dropdownListVillage li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#mo_dropdownListVillage').on('click', 'li', function() {
            $('#mo_dropdownDisplayVillage').text($(this).text());
            $('#mo_selectedVillage').val($(this).text());
            $('#mo_dropdownContentVillage').hide();
        });


        $('#mo_dropdownDisplayVillage').on('click', function() {
            $('#mo_dropdownContentVillage').toggle();
        });


        $('#mo_dropdownDisplayVillage').on('click', function() {
            $('#mo_dropdownContentVillage').toggle();
        });
        //end village 
        //end mother

        //start current address  dropdown
        //district dropdown
        $('#stay_dropdownDisplayDistrict').on('click', function() {
            $('#stay_dropdownContentDistrict').toggle();
        });

        $('#stay_searchInputDisctrict').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#stay_dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#stay_dropdownDisplayDistrict').on('click', 'li', function() {
            $('#stay_dropdownDisplayMonth').text($(this).text());
            $('#stay_selectedDistrict').val($(this).text());
            $('#stay_dropdownContentDistrict').hide();
        });


        $('#stay_dropdownDisplayDistrict').on('click', function() {
            $('#stay_dropdownContentDistrict').toggle();
        });


        $('#stay_dropdownDisplayDistrict').on('click', function() {
            $('#stay_dropdownContentDistrict').toggle();
        });
        //end destrict

        //commune dropdown
        $('#stay_dropdownDisplayCommune').on('click', function() {
            $('#stay_dropdownContentCommune').toggle();
        });

        $('#stay_searchInputCommune').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#stay_dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#stay_dropdownListCommune').on('click', 'li', function() {
            $('#stay_dropdownDisplayCommune').text($(this).text());
            $('#stay_selectedCommune').val($(this).text());
            $('#stay_dropdownContentCommune').hide();
        });


        $('#stay_dropdownDisplayCommune').on('click', function() {
            $('#stay_dropdownContentCommune').toggle();
        });


        $('#stay_dropdownDisplayCommune').on('click', function() {
            $('#stay_dropdownContentCommune').toggle();
        });

        //end commune dropdown

        //village

        $('#stay_dropdownDisplayVillage').on('click', function() {
            $('#stay_dropdownContentVillage').toggle();
        });

        $('#stay_searchInputVillage').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#stay_dropdownListVillage li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#stay_dropdownListVillage').on('click', 'li', function() {
            $('#stay_dropdownDisplayVillage').text($(this).text());
            $('#stay_selectedVillage').val($(this).text());
            $('#stay_dropdownContentVillage').hide();
        });


        $('#stay_dropdownDisplayVillage').on('click', function() {
            $('#stay_dropdownContentVillage').toggle();
        });


        $('#stay_dropdownDisplayVillage').on('click', function() {
            $('#stay_dropdownContentVillage').toggle();
        });
        //end village 
        //end current address 
    });

    //start baby infor 
    //discrict dropdown search
    $(document).ready(function() {
        $('#province-select').change(function() {
            let provinceId = $(this).val();
            $('#ba_dropdownListDistrict').empty();
            $('#ba_dropdownDisplayDistrict').text('--ជ្រើសរើសស្រុក--');

            if (provinceId) {
                $.ajax({
                    url: '/provinces/' + provinceId + '/districts',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let districtList = '';
                        $.each(data, function(key, district) {
                            districtList += '<li class="district-item" data-id="' +
                                district.district_kh_name + '">' + district.district_kh_name +
                                '</li>';
                        });
                        $('#ba_dropdownListDistrict').html(
                            districtList); // Populate district list
                    },
                    error: function() {
                        alert('Error retrieving districts.');
                    }
                });
            }
        });

        // Toggle dropdown display
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Handle district selection
        $(document).on('click', '.district-item', function() {
            const districtName = $(this).text();
            const districtId = $(this).data('id');
            $('#ba_dropdownDisplayDistrict').text(districtName); // Update display text
            var item = $('#ba_selectedDistrict').val(districtId);
            console.log(item)
            $('#ba_dropdownContentDistrict').hide(); // Hide dropdown after selection
        });

        // Implement search functionality
        $('#ba_searchInputDistrict').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#ba_dropdownListDistrict .district-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter district items
            });
        });

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#ba_dropdownContentDistrict').hide(); // Hide dropdown on outside click
            }
        });
    });

    //commune dropdown search
    $(document).ready(function() {
        // Handle district selection
        $(document).on('click', '.district-item', function() {
            const districtId = $(this).data('id');
            $('#selectedDistrict').val(districtId); // Set hidden input value for district
            $('#dropdownDisplayDistrict').text($(this).text()); // Update display text
            $('#dropdownContentDistrict').hide(); // Hide dropdown after selection

            // Fetch communes based on selected district
            fetchCommunes(districtId);
        });

        function fetchCommunes(districtId) {
            $('#ba_dropdownListCommune').empty(); // Clear previous communes
            $('#ba_dropdownDisplayCommune').text('--ជ្រើសរើស--'); // Reset commune display
            $('#ba_selectedCommune').val(''); // Reset selected commune ID

            if (districtId) {
                $.ajax({
                    url: '/districts/' + districtId + '/communes',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let communeList = '';
                        $.each(data, function(key, commune) {
                            communeList += '<li class="commune-item" data-id="' +
                                commune.commune_kh_name + '">' + commune.commune_kh_name + '</li>';
                        });
                        $('#ba_dropdownListCommune').html(communeList); // Populate commune list
                    },
                    error: function() {
                        alert('Error retrieving communes.');
                    }
                });
            }
        }

        // Handle commune selection
        $(document).on('click', '.commune-item', function() {
            const communeName = $(this).text();
            const communeId = $(this).data('id');
            $('#ba_dropdownDisplayCommune').text(communeName); // Update display text
            $('#ba_selectedCommune').val(communeId); // Set hidden input value for commune
            $('#ba_dropdownContentCommune').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for communes
        $('#ba_searchInputCommune').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#ba_dropdownListCommune .commune-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter commune items
            });
        });

        // Toggle dropdown display for communes
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#ba_dropdownContentDistrict').hide(); // Hide district dropdown on outside click
                $('#ba_dropdownContentCommune').hide(); // Hide commune dropdown on outside click
            }
        });
    });

    //village dropdown search
    $(document).ready(function() {
        // Handle commune selection
        $(document).on('click', '.commune-item', function() {
            const communeId = $(this).data('id');
            $('#ba_selectedCommune').val(communeId); // Set hidden input value for commune
            $('#ba_dropdownDisplayCommune').text($(this).text()); // Update display text
            $('#ba_dropdownContentCommune').hide(); // Hide dropdown after selection

            // Fetch villages based on selected commune
            fetchVillages(communeId);
        });

        // Function to fetch villages based on selected commune
        function fetchVillages(communeId) {
            $('#ba_dropdownListVillage').empty(); // Clear previous villages
            $('#ba_dropdownDisplayVillage').text('--ជ្រើសរើស--'); // Reset village display
            $('#ba_selectedVillage').val(''); // Reset selected village ID

            if (communeId) {
                $.ajax({
                    url: '/communes/' + communeId + '/villages',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let villageList = '';
                        $.each(data, function(key, village) {
                            villageList += '<li class="village-item" data-id="' + village
                                .village_kh_name + '">' +
                                village.village_kh_name + '</li>';
                        });
                        $('#ba_dropdownListVillage').html(villageList); // Populate village list
                    },
                    error: function() {
                        alert('Error retrieving villages.');
                    }
                });
            }
        }

        // Handle village selection
        $(document).on('click', '.village-item', function() {
            const villageName = $(this).text();
            const villageId = $(this).data('id');
            $('#ba_dropdownDisplayVillage').text(villageName); // Update display text
            $('#ba_selectedVillage').val(villageId); // Set hidden input value for village
            $('#ba_dropdownContentVillage').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for villages
        $('#ba_searchInputVillage').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#ba_dropdownListVillage .village-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter village items
            });
        });

        // Toggle dropdown display for villages
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#ba_dropdownContentCommune').hide(); // Hide commune dropdown on outside click
                $('#ba_dropdownContentVillage').hide(); // Hide village dropdown on outside click
            }
        });
    });

    //end baby infor 

    //start father infor 
    //discrict dropdown search
    $(document).ready(function() {
        $('#fa_province-select').change(function() {
            let provinceId = $(this).val();
            $('#fa_dropdownListDistrict').empty();
            $('#fa_dropdownDisplayDistrict').text('--ជ្រើសរើសស្រុក--');

            if (provinceId) {
                $.ajax({
                    url: '/provinces/' + provinceId + '/districts',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let districtList = '';
                        $.each(data, function(key, district) {
                            districtList += '<li class="district-item" data-id="' +
                                district.district_kh_name + '">' + district.district_kh_name +
                                '</li>';
                        });
                        $('#fa_dropdownListDistrict').html(
                            districtList); // Populate district list
                    },
                    error: function() {
                        alert('Error retrieving districts.');
                    }
                });
            }
        });

        // Toggle dropdown display
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Handle district selection
        $(document).on('click', '.district-item', function() {
            const districtName = $(this).text();
            const districtId = $(this).data('id');
            $('#fa_dropdownDisplayDistrict').text(districtName); // Update display text
            var item = $('#fa_selectedDistrict').val(districtId);
            console.log(item)
            $('#fa_dropdownContentDistrict').hide(); // Hide dropdown after selection
        });

        // Implement search functionality
        $('#fa_searchInputDistrict').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#fa_dropdownListDistrict .district-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter district items
            });
        });

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#fa_dropdownContentDistrict').hide(); // Hide dropdown on outside click
            }
        });
    });

    //commune dropdown search
    $(document).ready(function() {
        // Handle district selection
        $(document).on('click', '.district-item', function() {
            const districtId = $(this).data('id');
            $('#selectedDistrict').val(districtId); // Set hidden input value for district
            $('#dropdownDisplayDistrict').text($(this).text()); // Update display text
            $('#dropdownContentDistrict').hide(); // Hide dropdown after selection

            // Fetch communes based on selected district
            fetchCommunes(districtId);
        });

        function fetchCommunes(districtId) {
            $('#fa_dropdownListCommune').empty(); // Clear previous communes
            $('#fa_dropdownDisplayCommune').text('--ជ្រើសរើស--'); // Reset commune display
            $('#fa_selectedCommune').val(''); // Reset selected commune ID

            if (districtId) {
                $.ajax({
                    url: '/districts/' + districtId + '/communes',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let communeList = '';
                        $.each(data, function(key, commune) {
                            communeList += '<li class="commune-item" data-id="' +
                                commune.commune_kh_name + '">' + commune.commune_kh_name + '</li>';
                        });
                        $('#fa_dropdownListCommune').html(communeList); // Populate commune list
                    },
                    error: function() {
                        alert('Error retrieving communes.');
                    }
                });
            }
        }

        // Handle commune selection
        $(document).on('click', '.commune-item', function() {
            const communeName = $(this).text();
            const communeId = $(this).data('id');
            $('#fa_dropdownDisplayCommune').text(communeName); // Update display text
            $('#fa_selectedCommune').val(communeId); // Set hidden input value for commune
            $('#fa_dropdownContentCommune').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for communes
        $('#fa_searchInputCommune').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#fa_dropdownListCommune .commune-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter commune items
            });
        });

        // Toggle dropdown display for communes
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#fa_dropdownContentDistrict').hide(); // Hide district dropdown on outside click
                $('#fa_dropdownContentCommune').hide(); // Hide commune dropdown on outside click
            }
        });
    });

    //village dropdown search
    $(document).ready(function() {
        // Handle commune selection
        $(document).on('click', '.commune-item', function() {
            const communeId = $(this).data('id');
            $('#fa_selectedCommune').val(communeId); // Set hidden input value for commune
            $('#fa_dropdownDisplayCommune').text($(this).text()); // Update display text
            $('#fa_dropdownContentCommune').hide(); // Hide dropdown after selection

            // Fetch villages based on selected commune
            fetchVillages(communeId);
        });

        // Function to fetch villages based on selected commune
        function fetchVillages(communeId) {
            $('#fa_dropdownListVillage').empty(); // Clear previous villages
            $('#fa_dropdownDisplayVillage').text('--ជ្រើសរើស--'); // Reset village display
            $('#fa_selectedVillage').val(''); // Reset selected village ID

            if (communeId) {
                $.ajax({
                    url: '/communes/' + communeId + '/villages',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let villageList = '';
                        $.each(data, function(key, village) {
                            villageList += '<li class="village-item" data-id="' + village
                                .village_kh_name + '">' +
                                village.village_kh_name + '</li>';
                        });
                        $('#fa_dropdownListVillage').html(villageList); // Populate village list
                    },
                    error: function() {
                        alert('Error retrieving villages.');
                    }
                });
            }
        }

        // Handle village selection
        $(document).on('click', '.village-item', function() {
            const villageName = $(this).text();
            const villageId = $(this).data('id');
            $('#fa_dropdownDisplayVillage').text(villageName); // Update display text
            $('#fa_selectedVillage').val(villageId); // Set hidden input value for village
            $('#fa_dropdownContentVillage').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for villages
        $('#fa_searchInputVillage').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#fa_dropdownListVillage .village-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter village items
            });
        });

        // Toggle dropdown display for villages
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#fa_dropdownContentCommune').hide(); // Hide commune dropdown on outside click
                $('#fa_dropdownContentVillage').hide(); // Hide village dropdown on outside click
            }
        });
    });

    //end father infor 

    //start mother infor 
    //discrict dropdown search
    $(document).ready(function() {
        $('#mo_province-select').change(function() {
            let provinceId = $(this).val();
            $('#mo_dropdownListDistrict').empty();
            $('#mo_dropdownDisplayDistrict').text('--ជ្រើសរើសស្រុក--');

            if (provinceId) {
                $.ajax({
                    url: '/provinces/' + provinceId + '/districts',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let districtList = '';
                        $.each(data, function(key, district) {
                            districtList += '<li class="district-item" data-id="' +
                                district.district_kh_name + '">' + district.district_kh_name +
                                '</li>';
                        });
                        $('#mo_dropdownListDistrict').html(
                            districtList); // Populate district list
                    },
                    error: function() {
                        alert('Error retrieving districts.');
                    }
                });
            }
        });

        // Toggle dropdown display
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Handle district selection
        $(document).on('click', '.district-item', function() {
            const districtName = $(this).text();
            const districtId = $(this).data('id');
            $('#mo_dropdownDisplayDistrict').text(districtName); // Update display text
            var item = $('#mo_selectedDistrict').val(districtId);
            console.log(item)
            $('#mo_dropdownContentDistrict').hide(); // Hide dropdown after selection
        });

        // Implement search functionality
        $('#mo_searchInputDistrict').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#mo_dropdownListDistrict .district-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter district items
            });
        });

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#mo_dropdownContentDistrict').hide(); // Hide dropdown on outside click
            }
        });
    });

    //commune dropdown search
    $(document).ready(function() {
        // Handle district selection
        $(document).on('click', '.district-item', function() {
            const districtId = $(this).data('id');
            $('#selectedDistrict').val(districtId); // Set hidden input value for district
            $('#dropdownDisplayDistrict').text($(this).text()); // Update display text
            $('#dropdownContentDistrict').hide(); // Hide dropdown after selection

            // Fetch communes based on selected district
            fetchCommunes(districtId);
        });

        function fetchCommunes(districtId) {
            $('#mo_dropdownListCommune').empty(); // Clear previous communes
            $('#mo_dropdownDisplayCommune').text('--ជ្រើសរើស--'); // Reset commune display
            $('#mo_selectedCommune').val(''); // Reset selected commune ID

            if (districtId) {
                $.ajax({
                    url: '/districts/' + districtId + '/communes',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let communeList = '';
                        $.each(data, function(key, commune) {
                            communeList += '<li class="commune-item" data-id="' +
                                commune.commune_kh_name + '">' + commune.commune_kh_name + '</li>';
                        });
                        $('#mo_dropdownListCommune').html(communeList); // Populate commune list
                    },
                    error: function() {
                        alert('Error retrieving communes.');
                    }
                });
            }
        }

        // Handle commune selection
        $(document).on('click', '.commune-item', function() {
            const communeName = $(this).text();
            const communeId = $(this).data('id');
            $('#mo_dropdownDisplayCommune').text(communeName); // Update display text
            $('#mo_selectedCommune').val(communeId); // Set hidden input value for commune
            $('#mo_dropdownContentCommune').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for communes
        $('#mo_searchInputCommune').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#mo_dropdownListCommune .commune-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter commune items
            });
        });

        // Toggle dropdown display for communes
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#mo_dropdownContentDistrict').hide(); // Hide district dropdown on outside click
                $('#mo_dropdownContentCommune').hide(); // Hide commune dropdown on outside click
            }
        });
    });

    //village dropdown search
    $(document).ready(function() {
        // Handle commune selection
        $(document).on('click', '.commune-item', function() {
            const communeId = $(this).data('id');
            $('#mo_selectedCommune').val(communeId); // Set hidden input value for commune
            $('#mo_dropdownDisplayCommune').text($(this).text()); // Update display text
            $('#mo_dropdownContentCommune').hide(); // Hide dropdown after selection

            // Fetch villages based on selected commune
            fetchVillages(communeId);
        });

        // Function to fetch villages based on selected commune
        function fetchVillages(communeId) {
            $('#mo_dropdownListVillage').empty(); // Clear previous villages
            $('#mo_dropdownDisplayVillage').text('--ជ្រើសរើស--'); // Reset village display
            $('#mo_selectedVillage').val(''); // Reset selected village ID

            if (communeId) {
                $.ajax({
                    url: '/communes/' + communeId + '/villages',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let villageList = '';
                        $.each(data, function(key, village) {
                            villageList += '<li class="village-item" data-id="' + village
                                .village_kh_name + '">' +
                                village.village_kh_name + '</li>';
                        });
                        $('#mo_dropdownListVillage').html(villageList); // Populate village list
                    },
                    error: function() {
                        alert('Error retrieving villages.');
                    }
                });
            }
        }

        // Handle village selection
        $(document).on('click', '.village-item', function() {
            const villageName = $(this).text();
            const villageId = $(this).data('id');
            $('#mo_dropdownDisplayVillage').text(villageName); // Update display text
            $('#mo_selectedVillage').val(villageId); // Set hidden input value for village
            $('#mo_dropdownContentVillage').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for villages
        $('#mo_searchInputVillage').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#mo_dropdownListVillage .village-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter village items
            });
        });

        // Toggle dropdown display for villages
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#mo_dropdownContentCommune').hide(); // Hide commune dropdown on outside click
                $('#mo_dropdownContentVillage').hide(); // Hide village dropdown on outside click
            }
        });
    });

    //end mother  infor 

    //start current address infor 
    //discrict dropdown search
    $(document).ready(function() {
        $('#stay_province-select').change(function() {
            let provinceId = $(this).val();
            $('#stay_dropdownListDistrict').empty();
            $('#stay_dropdownDisplayDistrict').text('--ជ្រើសរើសស្រុក--');

            if (provinceId) {
                $.ajax({
                    url: '/provinces/' + provinceId + '/districts',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let districtList = '';
                        $.each(data, function(key, district) {
                            districtList += '<li class="district-item" data-id="' +
                                district.district_kh_name + '">' + district.district_kh_name +
                                '</li>';
                        });
                        $('#stay_dropdownListDistrict').html(
                            districtList); // Populate district list
                    },
                    error: function() {
                        alert('Error retrieving districts.');
                    }
                });
            }
        });

        // Toggle dropdown display
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Handle district selection
        $(document).on('click', '.district-item', function() {
            const districtName = $(this).text();
            const districtId = $(this).data('id');
            $('#stay_dropdownDisplayDistrict').text(districtName); // Update display text
            var item = $('#stay_selectedDistrict').val(districtId);
            console.log(item)
            $('#stay_dropdownContentDistrict').hide(); // Hide dropdown after selection
        });

        // Implement search functionality
        $('#stay_searchInputDistrict').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#stay_dropdownListDistrict .district-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter district items
            });
        });

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#stay_dropdownContentDistrict').hide(); // Hide dropdown on outside click
            }
        });
    });

    //commune dropdown search
    $(document).ready(function() {
        // Handle district selection
        $(document).on('click', '.district-item', function() {
            const districtId = $(this).data('id');
            $('#selectedDistrict').val(districtId); // Set hidden input value for district
            $('#dropdownDisplayDistrict').text($(this).text()); // Update display text
            $('#dropdownContentDistrict').hide(); // Hide dropdown after selection

            // Fetch communes based on selected district
            fetchCommunes(districtId);
        });

        function fetchCommunes(districtId) {
            $('#stay_dropdownListCommune').empty(); // Clear previous communes
            $('#stay_dropdownDisplayCommune').text('--ជ្រើសរើស--'); // Reset commune display
            $('#stay_selectedCommune').val(''); // Reset selected commune ID

            if (districtId) {
                $.ajax({
                    url: '/districts/' + districtId + '/communes',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let communeList = '';
                        $.each(data, function(key, commune) {
                            communeList += '<li class="commune-item" data-id="' +
                                commune.commune_kh_name + '">' + commune.commune_kh_name + '</li>';
                        });
                        $('#stay_dropdownListCommune').html(communeList); // Populate commune list
                    },
                    error: function() {
                        alert('Error retrieving communes.');
                    }
                });
            }
        }

        // Handle commune selection
        $(document).on('click', '.commune-item', function() {
            const communeName = $(this).text();
            const communeId = $(this).data('id');
            $('#stay_dropdownDisplayCommune').text(communeName); // Update display text
            $('#stay_selectedCommune').val(communeId); // Set hidden input value for commune
            $('#stay_dropdownContentCommune').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for communes
        $('#stay_searchInputCommune').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#stay_dropdownListCommune .commune-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter commune items
            });
        });

        // Toggle dropdown display for communes
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#stay_dropdownContentDistrict').hide(); // Hide district dropdown on outside click
                $('#stay_dropdownContentCommune').hide(); // Hide commune dropdown on outside click
            }
        });
    });

    //village dropdown search
    $(document).ready(function() {
        // Handle commune selection
        $(document).on('click', '.commune-item', function() {
            const communeId = $(this).data('id');
            $('#stay_selectedCommune').val(communeId); // Set hidden input value for commune
            $('#stay_dropdownDisplayCommune').text($(this).text()); // Update display text
            $('#stay_dropdownContentCommune').hide(); // Hide dropdown after selection

            // Fetch villages based on selected commune
            fetchVillages(communeId);
        });

        // Function to fetch villages based on selected commune
        function fetchVillages(communeId) {
            $('#stay_dropdownListVillage').empty(); // Clear previous villages
            $('#stay_dropdownDisplayVillage').text('--ជ្រើសរើស--'); // Reset village display
            $('#stay_selectedVillage').val(''); // Reset selected village ID

            if (communeId) {
                $.ajax({
                    url: '/communes/' + communeId + '/villages',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let villageList = '';
                        $.each(data, function(key, village) {
                            villageList += '<li class="village-item" data-id="' + village
                                .village_kh_name + '">' +
                                village.village_kh_name + '</li>';
                        });
                        $('#stay_dropdownListVillage').html(villageList); // Populate village list
                    },
                    error: function() {
                        alert('Error retrieving villages.');
                    }
                });
            }
        }

        // Handle village selection
        $(document).on('click', '.village-item', function() {
            const villageName = $(this).text();
            const villageId = $(this).data('id');
            $('#stay_dropdownDisplayVillage').text(villageName); // Update display text
            $('#stay_selectedVillage').val(villageId); // Set hidden input value for village
            $('#stay_dropdownContentVillage').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for villages
        $('#stay_searchInputVillage').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#stay_dropdownListVillage .village-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter village items
            });
        });

        // Toggle dropdown display for villages
        window.toggleDropdown = function(id) {
            const dropdown = document.getElementById(id);
        };

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#stay_dropdownContentCommune').hide(); // Hide commune dropdown on outside click
                $('#stay_dropdownContentVillage').hide(); // Hide village dropdown on outside click
            }
        });
    });

    //end current address  infor 

</script>