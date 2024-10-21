{{-- <!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .container {
        text-align: center;
    }

    .search-dropdown {
        margin: 20px auto;
        position: relative;
        width: 200px; /* Set a fixed width for the dropdown */
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
        display: none; /* Hide by default */
        border: 1px solid #ddd;
        border-radius: 4px;
        position: absolute;
        width: 100%;
        background: white;
        z-index: 1000;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
</style>

<div class="container">
    <form method="POST"> <!-- Add your route name here -->
        @csrf <!-- Include CSRF token for security -->

        <div class="search-dropdown">
            <div class="dropdown-display" id="dropdownDisplay">ស្វែងរកឆ្នាំ</div>
            <div class="dropdown-content" id="dropdownContent">
                <input type="text" class="search-input" id="searchInput" placeholder="ស្វែងរកឆ្នាំ">
                <ul id="dropdownList"></ul>
            </div>
        </div>

        <!-- Hidden input to store the selected year -->
        <input type="hidden" name="selected_year" id="selectedYear" value="">

        <button type="submit" class="btn btn-primary">Save</button> <!-- Add a submit button -->
    </form>
</div>

<script>
    $(document).ready(function() {
        // Generate Khmer years from 1950 to 2000
        const khmerNumbers = ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'];
        const khmerYears = [];

        function convertToKhmerNumber(number) {
            return number.toString().split('').map(digit => khmerNumbers[digit]).join('');
        }

        for (let year = 1950; year <= 2000; year++) {
            khmerYears.push(convertToKhmerNumber(year));
        }

        // Populate dropdown list with Khmer years
        khmerYears.forEach(year => {
            $('#dropdownList').append(`<li>${year}</li>`);
        });

        $('#dropdownDisplay').on('click', function() {
            $('#dropdownContent').toggle();
        });

        $('#searchInput').on('input', function() {
            let value = $(this).val().toLowerCase();
            $('#dropdownList li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#dropdownList').on('click', 'li', function() {
            $('#dropdownDisplay').text($(this).text());
            $('#selectedYear').val($(this).text()); // Set the hidden input value
            $('#dropdownContent').hide();
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.search-dropdown').length) {
                $('#dropdownContent').hide();
            }
        });
    });
</script> --}}
