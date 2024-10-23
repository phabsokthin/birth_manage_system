<!-- Include jQuery and DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<div class="mt-3">
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">បញ្ជីព័ត៌មានរបស់ម្តាយ</legend>

        <div class="mt-5">
            <table class="table table-bordered table-striped" id="data-table">
                <thead class="bg-dark">
                    <tr>
                        <th>នាមត្រកូល(ខ្មែរ)</th>
                        <th>កិត្តិនាម(ខ្មែរ)</th>
                        <th>នាមត្រកូល(ឡាតាំង)</th>
                        <th>កិត្តិនាម(ឡាតាំង)</th>
                        <th>ភេទ</th>
                        <th>លេខទូរស័ព្ទ</th>
                        <th>សញ្ជាត្តិ</th>
                        <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                        <th>មុខរបរ</th>
                        <th>ទីកន្លែងកំណើត</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <!-- Data will be appended here -->
                </tbody>
            </table>
        </div>

    </fieldset>
</div>

<script>
    // Sample data
    const people = [
        {
            lastNameKh: "សៀង",
            firstNameKh: "សុផាត",
            lastNameLat: "Seang",
            firstNameLat: "Sopheat",
            gender: "ប្រុស",
            phone: "012345678",
            nationality: "កម្ពុជា",
            birthDate: "1990-01-01",
            occupation: "វិស្វករ",
            birthPlace: "ភ្នំពេញ"
        },
        {
            lastNameKh: "សុក",
            firstNameKh: "សាន",
            lastNameLat: "Sok",
            firstNameLat: "San",
            gender: "ប្រុស",
            phone: "098765432",
            nationality: "កម្ពុជា",
            birthDate: "1985-05-20",
            occupation: "គ្រូ",
            birthPlace: "កណ្តាល"
        },


    ];

    // Function to generate and append table rows
    function generateTable() {
        const tableBody = document.querySelector('#table-body');

        people.forEach(person => {
            const row = document.createElement('tr');

            // Create and append cells for each field
            row.innerHTML = `
                <td>${person.lastNameKh}</td>
                <td>${person.firstNameKh}</td>
                <td>${person.lastNameLat}</td>
                <td>${person.firstNameLat}</td>
                <td>${person.gender}</td>
                <td>${person.phone}</td>
                <td>${person.nationality}</td>
                <td>${person.birthDate}</td>
                <td>${person.occupation}</td>
                <td>${person.birthPlace}</td>
            `;

            // Append the row to the table body
            tableBody.appendChild(row);
        });

        // Initialize DataTables
        $('#data-table').DataTable();
    }

    // Call the function to generate table on document ready
    $(document).ready(function() {
        generateTable();
    });
</script>
