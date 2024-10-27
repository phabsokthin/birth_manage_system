<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងបង្កើតថ្មី</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createForm" action="{{ route('commune.store') }}" method="POST">
                    @csrf
                
                    <div class="mb-3">
                        <label for="dis_id" class="form-label">ឈ្មោះស្រុក(Khmer)</label>
                        <select class="form-select" id="dis_id" name="dis_id" required>
                            <option value="">ជ្រើសរើសឈ្មោះស្រុកជាភាសាខ្មែរ</option>
                            @foreach($districts as $dis)
                                <option value="{{ $dis->dis_id }}" data-en-name="{{ $dis->district_en_name }}">
                                    {{ $dis->district_kh_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="district_en_name" class="form-label">ឈ្មោះស្រុក(English)</label>
                        <input type="text" class="form-control" id="district_en_name" name="district_en_name" placeholder="ចូរបញ្ចូលស្រុកជាភាសាEnglish" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="commune_kh_name" class="form-label">ឃុំ(ខ្មែរ)</label>
                        <input type="text" class="form-control" id="commune_kh_name" name="commune_kh_name" 
                        placeholder="ចូរបញ្ចូលឈ្មោះឃុំជាភាសាខ្មែរ" required pattern="[\u1780-\u17FF\s]+"
                               title="Only Khmer characters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="commune_en_name" class="form-label">ឃុំ(Engish)</label>
                        <input type="text" class="form-control" id="commune_en_name" name="commune_en_name" 
                        placeholder="ចូរបញ្ចូលឈ្មោះឃុំជាភាសា English" pattern="[A-Za-z\s]+"
                               title="Only letters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="commune_code" class="form-label">លេដកូដ</label>
                        <input type="text" class="form-control" id="commune_code" name="commune_code" 
                        placeholder="ចូរបញ្ចូលលេខកូដ" required pattern="\d+"
                        title="Only numbers are allowed">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-primary" id="saveButton" disabled>រក្សាទុក</button>
                        <button type="button" class="btn btn-primary" id="savingButton" style="display: none;" disabled>កំពុងរក្សាទុក...</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('dis_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];

        const englishName = selectedOption.getAttribute('data-en-name');

        document.getElementById('district_en_name').value = englishName;
    });
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("createForm");
        const saveButton = document.getElementById("saveButton");
        const savingButton = document.getElementById("savingButton");
        
        form.addEventListener("input", function () {
            saveButton.disabled = !form.checkValidity();
        });
    });

    document.getElementById('createForm').addEventListener('submit', function() {
        document.getElementById('saveButton').style.display = 'none';
        document.getElementById('savingButton').style.display = 'inline-block';
    });
</script>