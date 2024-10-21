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
        height: 500px;
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

<form action="" class="mt-2">
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">បង្កើតព័ត៌មានរបស់ឪពុក</legend>

        <!-- Other form fields -->

        <div class="control-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="">នាមត្រកូល(ខ្មែរ): *</label>
                    <input type="text" class="form-control" placeholder="នាមត្រកូល(ខ្មែរ)" name="fname_kh">
                </div>
                <div class="col-md-3">
                    <label for="">កិត្តិនាម(ខ្មែរ): *</label>
                    <input type="text" class="form-control" placeholder="កិត្តិនាម(ខ្មែរ)" name="lname_kh">
                </div>
                <div class="col-md-3">
                    <label for="">នាមត្រកូល(ឡាតាំង): *</label>
                    <input type="text" class="form-control" placeholder="នាមត្រកូល(ខ្មែរ)" name="fname_en">
                </div>
                <div class="col-md-3">
                    <label for="">កិត្តិនាម(ឡាតាំង): *</label>
                    <input type="text" class="form-control" placeholder="កិត្តិនាម(ខ្មែរ)" name="lname_en">
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
                    <input type="text" class="form-control" required placeholder="លេខទូរស័ព្ទ" name="phone">
                </div>
                <div class="col-md-3">
                    <label for="">សញ្ជាត្តិ</label>
                    <input type="text" class="form-control" placeholder="សញ្ជាត្តិ" name="national">
                </div>
                <div class="col-md-3">
                    <label for="">រូបថត</label>
                    <input type="file" class="form-control" required name="photo">
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
                <select name="day" id="day" class="form-control">
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
                <input type="hidden" name="selected_month" id="selectedMonth" value="">
            </div>

            <div class="col-md-3">
                <div class="search-dropdown" style="margin-top: 0px; margin-left:0px;">
                    <label for="">នៅឆ្នាំ: *</label>
                    <div>
                        <div class="form-control" id="dropdownDisplayYear">--ជ្រើសរើសឆ្នាំ--</div>
                        <div class="dropdown-content p-2" id="dropdownContentYear">
                            <input type="text" class="form-control" id="searchInputYear"
                                placeholder="ស្វែងរកឆ្នាំ">
                            <ul id="dropdownListYear"></ul>
                        </div>
                    </div>
                </div>

                {{-- for display name to backend --}}
                <input type="hidden" name="selected_year" id="selectedYear" value="">
            </div>
        </div>
    </fieldset>
</form>

<script>
    // Convert numbers to Khmer digits
    function convertToKhmerNumber(num) {
        const khmerNumbers = ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'];
        return num.toString().split('').map(digit => khmerNumbers[digit]).join('');
    }

    // Generate days in Khmer numerals
    const daySelect = document.getElementById('day');
    for (let day = 1; day <= 31; day++) {
        let option = document.createElement('option');
        option.value = day;
        option.textContent = convertToKhmerNumber(day);
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

        // Generate Khmer years from 1950 to 2024
        const startYear = 1950;
        const endYear = 2024;
        const khmerYears = [];
        for (let year = startYear; year <= endYear; year++) {
            khmerYears.push(convertToKhmerNumber(year));
        }

        // Populate year dropdown list
        khmerYears.forEach(year => {
            $('#dropdownListYear').append(`<li>${year}</li>`);
        });

        $('#dropdownDisplayYear').on('click', function() {
            $('#dropdownContentYear').toggle();
        });

        $('#searchInputYear').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#dropdownListYear li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#dropdownListYear').on('click', 'li', function() {
            $('#dropdownDisplayYear').text($(this).text());
            $('#selectedYear').val($(this).text());
            $('#dropdownContentYear').hide();
        });

        // Close dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.search-dropdown').length) {
                $('#dropdownContentMonth, #dropdownContentYear').hide();
            }
        });
    });
</script>
