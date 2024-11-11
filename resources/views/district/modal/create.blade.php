<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងបង្កើតថ្មី</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createForm" action="{{ route('district.store') }}" method="POST">
                    @csrf
                
                    <div class="mb-3">
                        <label for="province_id" class="form-label">ឈ្មោះខេត្ត (Khmer)</label>
                        <select class="form-select" id="province_id" name="province_id" required>
                            <option value="">ជ្រើសរើសឈ្មោះខេត្តជាភាសាខ្មែរ</option>
                            @foreach($province as $pro)
                                <option value="{{ $pro->province_id }}" data-en-name="{{ $pro->province_en_name }}">
                                    {{ $pro->province_kh_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="province_en_name" class="form-label">ឈ្មោះខេត្ត (English)</label>
                        <input type="text" class="form-control" id="province_en_name" name="province_en_name" placeholder="ចូរបញ្ចូលខេត្តជាភាសាEnglish" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="district_kh_name" class="form-label">ស្រុក(ខ្មែរ)</label>
                        <input type="text" class="form-control" id="district_kh_name" name="district_kh_name" 
                        placeholder="ចូរបញ្ចូលឈ្មោះស្រុកជាភាសាខ្មែរ" required 
                               title="Only Khmer characters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="district_en_name" class="form-label">ស្រុក(Engish)</label>
                        <input type="text" class="form-control" required id="district_en_name" name="district_en_name" 
                        placeholder="ចូរបញ្ចូលឈ្មោះស្រុកជាភាសា English" 
                               title="Only letters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="dis_code" class="form-label">លេដកូដ</label>
                        <input type="text" class="form-control" id="dis_code" name="dis_code"  
                        placeholder="ចូរបញ្ចូលលេខកូដ" required 
                        title="Only numbers are allowed">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">ស្ថានភាព</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="" disabled selected>ជ្រើសរើសស្ថានភាព</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-primary" id="saveButton" >រក្សាទុក</button>
                        <button type="button" class="btn btn-primary" id="savingButton" style="display: none;" disabled>កំពុងរក្សាទុក...</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('province_id').addEventListener('change', function() {
       
        const selectedOption = this.options[this.selectedIndex];
        const englishName = selectedOption.getAttribute('data-en-name');
        
        document.getElementById('province_en_name').value = englishName;
    });

    // document.addEventListener("DOMContentLoaded", function () {
    //     const form = document.getElementById("createForm");
    //     const saveButton = document.getElementById("saveButton");
    //     const savingButton = document.getElementById("savingButton");
        
    //     form.addEventListener("input", function () {
    //         saveButton.disabled = !form.checkValidity();
    //     });
    // });

    document.getElementById('createForm').addEventListener('submit', function() {
        document.getElementById('saveButton').style.display = 'none';
        document.getElementById('savingButton').style.display = 'inline-block';
    });
</script>