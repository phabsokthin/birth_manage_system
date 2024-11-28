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
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        box-shadow: 0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        border: none;
        width: 200px;
        margin-left: 5px;
        padding-left: 10px;
    }
</style>


<form action="{{ route('create.father') }}" method="POST" enctype="multipart/form-data" class="mt-4">
    @csrf
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">បង្កើតព័ត៌មានរបស់ឪពុក</legend>

        <!-- Other form fields -->

        <div class="control-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="">នាមត្រកូល(ខ្មែរ): *</label>
                    <input type="text" class="form-control" required placeholder="នាមត្រកូល(ខ្មែរ)" name="fname_kh">
                </div>
                <div class="col-md-3">
                    <label for="">កិត្តិនាម(ខ្មែរ): *</label>
                    <input type="text" class="form-control" required placeholder="កិត្តិនាម(ខ្មែរ)" name="lname_kh">
                </div>
                <div class="col-md-3">
                    <label for="">នាមត្រកូល(ឡាតាំង): *</label>
                    <input type="text" class="form-control" required placeholder="នាមត្រកូល(ឡាតាំង)" name="fname_en">
                </div>
                <div class="col-md-3">
                    <label for="">កិត្តិនាម(ឡាតាំង): *</label>
                    <input type="text" class="form-control" required placeholder="កិត្តិនាម(ឡាតាំង)" name="lname_en">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="">ភេទ: *</label>
                    <select name="gender" required class="form-control" id="">
                        <option value="">--ជ្រើសរើស--</option>
                        <option value="ប្រុស">ប្រុស</option>
                        <option value="ស្រី">ស្រី</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">លេខទូរស័ព្ទ: *</label>
                    <input type="text" class="form-control" required placeholder="លេខទូរស័ព្ទ" name="phones">
                </div>
                <div class="col-md-3">
                    <label for="">សញ្ជាត្តិ</label>
                    <input type="text" class="form-control" placeholder="សញ្ជាត្តិ" name="national">
                </div>
                {{-- <div class="col-md-3">
                    <div class="form-group">
                        <label for="">រូបថត</label>
                        <input type="file"  name="photo"
                            id="imageValide" class="form-control">
                        <div class="mt-2" id="image-holder_one"></div>
                    </div>
                </div> --}}

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">រូបថត(4x6)</label>
                        <input type="file" name="photo" id="imageValide" class="form-control">
                        <div id="image-holder_one" class=""></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="">ស្ថានភាពបច្ចុប្បន្ន</label>
                    <select name="fstatus" required class="form-control">
                        <option value="">--ជ្រើសរើសស្ថានភាព--</option>
                        <option value="1">នៅរស់</option>
                        <option value="0">ស្លាប់</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="mt-3 d-flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-calendar-fold">
                <path d="M8 2v4" />
                <path d="M16 2v4" />
                <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                <path d="M3 10h18" />
                <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
            </svg>
            <h5 class="ml-2">ថ្ងៃខែឆ្នាំកំណើត</h5>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label for="">នៅថ្ងៃ: *</label>
                <select name="day" required id="day" class="form-control">
                    <option value="">--ជ្រើសរើសថ្ងៃ--</option>
                </select>
            </div>

            <div class="col-md-3">
                <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                    <label for="">នៅខែ: *</label>
                    <div>
                        <div class="form-control" id="dropdownDisplayMonth">--ជ្រើសរើសខែ--</div>
                        <div class="dropdown-content p-2" id="dropdownContentMonth">
                            <input type="text" class="form-control" id="searchInputMonth" placeholder="ស្វែងរកខែ">
                            <ul id="dropdownListMonth"></ul>
                        </div>
                    </div>
                </div>

                {{-- for display name to backend --}}
                <input type="hidden" required name="selected_month" id="selectedMonth" value="">
            </div>

            <div class="col-md-3">
                <div class="search-dropdown" style="margin-top: 0px; margin-left: 0px;">
                    <label for="">នៅឆ្នាំ: *</label>
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
                <input type="hidden" name="selected_year" id="selectedYear" value="">
            </div>

            <div class="col-md-4">
                <label for="">មុខរបរ</label>
                <textarea class="form-control" placeholder="មុខរបរ" name="job_title"></textarea>
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
                <select name="province" id="province-select" required class="form-control">
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
                        <div class="form-control" id="dropdownDisplayDistrict"
                            onclick="toggleDropdown('dropdownContentDistrict')">
                            --ជ្រើសរើសស្រុក--
                        </div>
                        <div class="dropdown-content p-2" id="dropdownContentDistrict">
                            <input type="text" class="form-control" id="searchInputDistrict"
                                placeholder="ស្វែងរកស្រុក">
                            <ul id="dropdownListDistrict"></ul>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="selected_district" id="selectedDistrict" value="">
            </div>

            <div class="col-md-3">
                <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                    <label for="">ឃុំ/សង្កាត់: *</label>
                    <div>
                        <div class="form-control" id="dropdownDisplayCommune"
                            onclick="toggleDropdown('dropdownContentCommune')">
                            --ជ្រើសរើស--
                        </div>
                        <div class="dropdown-content p-2" id="dropdownContentCommune">
                            <input type="text" class="form-control" id="searchInputCommune"
                                placeholder="ស្វែងរកឃុំ">
                            <ul id="dropdownListCommune"></ul>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="selected_commune" id="selectedCommune" value="">
            </div>

            <div class="col-md-3">
                <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                    <label for="">នៅភូមិ: *</label>
                    <div>
                        <div class="form-control" id="dropdownDisplayVillage"
                            onclick="toggleDropdown('dropdownContentVillage')">
                            --ជ្រើសរើស--
                        </div>
                        <div class="dropdown-content p-2" id="dropdownContentVillage">
                            <input type="text" class="form-control" id="searchInputVillage"
                                placeholder="ស្វែងរកភូមិ">
                            <ul id="dropdownListVillage"></ul>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="selected_village" id="selectedVillage" value="">
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


        //district dropdown
        $('#dropdownDisplayDistrict').on('click', function() {
            $('#dropdownContentDistrict').toggle();
        });

        $('#searchInputDisctrict').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#dropdownDisplayDistrict').on('click', 'li', function() {
            $('#dropdownDisplayMonth').text($(this).text());
            $('#selectedDiscrict').val($(this).text());
            $('#dropdownContentDistrict').hide();
        });


        $('#dropdownDisplayDistrict').on('click', function() {
            $('#dropdownContentDistrict').toggle();
        });


        $('#dropdownDisplayDistrict').on('click', function() {
            $('#dropdownContentDistrict').toggle();
        });

        //end destrict

        //commune dropdown
        $('#dropdownDisplayCommune').on('click', function() {
            $('#dropdownContentCommune').toggle();
        });

        $('#searchInputCommune').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#dropdownListDiscrict li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#dropdownListCommune').on('click', 'li', function() {
            $('#dropdownDisplayCommune').text($(this).text());
            $('#selectedCommune').val($(this).text());
            $('#dropdownContentCommune').hide();
        });


        $('#dropdownDisplayCommune').on('click', function() {
            $('#dropdownContentCommune').toggle();
        });


        $('#dropdownDisplayCommune').on('click', function() {
            $('#dropdownContentCommune').toggle();
        });

        //end commune dropdown

        //village

        $('#dropdownDisplayVillage').on('click', function() {
            $('#dropdownContentVillage').toggle();
        });

        $('#searchInputVillage').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#dropdownListVillage li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#dropdownListVillage').on('click', 'li', function() {
            $('#dropdownDisplayVillage').text($(this).text());
            $('#selectedVillage').val($(this).text());
            $('#dropdownContentVillage').hide();
        });


        $('#dropdownDisplayVillage').on('click', function() {
            $('#dropdownContentVillage').toggle();
        });


        $('#dropdownDisplayVillage').on('click', function() {
            $('#dropdownContentVillage').toggle();
        });
        //end village



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


    });


    //discrict dropdown search
    $(document).ready(function() {
        $('#province-select').change(function() {
            let provinceId = $(this).val();
            $('#dropdownListDistrict').empty();
            $('#dropdownDisplayDistrict').text('--ជ្រើសរើសស្រុក--');

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
                        $('#dropdownListDistrict').html(
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
            $('#dropdownDisplayDistrict').text(districtName); // Update display text
            var item = $('#selectedDistrict').val(districtId);
            console.log(item)
            $('#dropdownContentDistrict').hide(); // Hide dropdown after selection
        });

        // Implement search functionality
        $('#searchInputDistrict').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#dropdownListDistrict .district-item').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -
                    1); // Filter district items
            });
        });

        // Close dropdown if clicked outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-dropdown').length) {
                $('#dropdownContentDistrict').hide(); // Hide dropdown on outside click
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
            $('#dropdownListCommune').empty(); // Clear previous communes
            $('#dropdownDisplayCommune').text('--ជ្រើសរើស--'); // Reset commune display
            $('#selectedCommune').val(''); // Reset selected commune ID

            if (districtId) {
                $.ajax({
                    url: '/districts/' + districtId + '/communes',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let communeList = '';
                        $.each(data, function(key, commune) {
                            communeList += '<li class="commune-item" data-id="' + 
                            commune.commune_kh_name + '">' +commune.commune_kh_name + '</li>';
                        });
                        $('#dropdownListCommune').html(communeList); // Populate commune list
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
            $('#dropdownDisplayCommune').text(communeName); // Update display text
            $('#selectedCommune').val(communeId); // Set hidden input value for commune
            $('#dropdownContentCommune').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for communes
        $('#searchInputCommune').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#dropdownListCommune .commune-item').filter(function() {
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
                $('#dropdownContentDistrict').hide(); // Hide district dropdown on outside click
                $('#dropdownContentCommune').hide(); // Hide commune dropdown on outside click
            }
        });
    });



    //village dropdown search

    $(document).ready(function() {
        // Handle commune selection
        $(document).on('click', '.commune-item', function() {
            const communeId = $(this).data('id');
            $('#selectedCommune').val(communeId); // Set hidden input value for commune
            $('#dropdownDisplayCommune').text($(this).text()); // Update display text
            $('#dropdownContentCommune').hide(); // Hide dropdown after selection

            // Fetch villages based on selected commune
            fetchVillages(communeId);
        });

        // Function to fetch villages based on selected commune
        function fetchVillages(communeId) {
            $('#dropdownListVillage').empty(); // Clear previous villages
            $('#dropdownDisplayVillage').text('--ជ្រើសរើស--'); // Reset village display
            $('#selectedVillage').val(''); // Reset selected village ID

            if (communeId) {
                $.ajax({
                    url: '/communes/' + communeId + '/villages',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let villageList = '';
                        $.each(data, function(key, village) {
                            villageList += '<li class="village-item" data-id="' + 
                            village.village_kh_name + '">' +village.village_kh_name + '</li>';
                        });
                        $('#dropdownListVillage').html(villageList); // Populate village list
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
            $('#dropdownDisplayVillage').text(villageName); // Update display text
            $('#selectedVillage').val(villageId); // Set hidden input value for village
            $('#dropdownContentVillage').hide(); // Hide dropdown after selection
        });

        // Implement search functionality for villages
        $('#searchInputVillage').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('#dropdownListVillage .village-item').filter(function() {
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
                $('#dropdownContentCommune').hide(); // Hide commune dropdown on outside click
                $('#dropdownContentVillage').hide(); // Hide village dropdown on outside click
            }
        });
    });
</script>
