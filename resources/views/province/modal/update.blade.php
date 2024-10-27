@foreach ($province as $pro)
<div class="modal fade" id="ModalEdit{{$pro->province_id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងកែប្រែ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> 
            <div class="modal-body">
                <form data-province-id="{{$pro->province_id}}" id="updateForm" class="update-form" action="{{route('province.update', $pro->province_id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="p_code" class="form-label">លេខកូដ</label>
                        <input type="text" class="form-control" name="p_code" value="{{$pro->p_code}}" 
                        placeholder="ចូរបញ្ចូលលេខកូដ" required pattern="\d+"
                        title="Only numbers are allowed">
                    </div>
                    <div class="mb-3">
                        <label for="province_en_name" class="form-label">ឈ្មោះខេត្ត(English)</label>
                        <input type="text" class="form-control" name="province_en_name" value="{{$pro->province_en_name}}" 
                        placeholder="ចូរបញ្ចូលឈ្មោះខេត្តជាភាសា English" pattern="[A-Za-z\s]+"
                               title="Only letters are allowed">
                    </div>
                    <div class="mb-3">
                        <label for="province_kh_name" class="form-label">ឈ្មោះខេត្ត (Khmer)</label>
                        <input type="text" class="form-control" name="province_kh_name" value="{{$pro->province_kh_name}}" 
                        placeholder="ចូរបញ្ចូលឈ្មោះខេត្តជាភាសាខ្មែរ" required pattern="[\u1780-\u17FF\s]+"
                               title="Only Khmer characters are allowed">
                    </div>
                    <div class="mb-3">
                        <label for="modify_date" class="form-label">កាលបរិច្ឆេទ</label>
                        <input type="date" class="form-control" name="modify_date" value="{{$pro->modify_date}}" required>
                    </div>
                 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-primary save-button" data-province-id="{{$pro->province_id}}" disabled>រក្សាទុក</button>
                        <button type="button" class="btn btn-primary saving-button" data-province-id="{{$pro->province_id}}" style="display: none;" disabled>កំពុងរក្សាទុក...</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll(".update-form");

    forms.forEach(form => {
        const provinceId = form.getAttribute("data-province-id");
        const saveButton = form.querySelector(`.save-button[data-province-id="${provinceId}"]`);
        const savingButton = form.querySelector(`.saving-button[data-province-id="${provinceId}"]`);

        // Enable save button if form is valid
        form.addEventListener("input", function () {
            saveButton.disabled = !form.checkValidity();
        });

      
        form.addEventListener("submit", function (e) {
            e.preventDefault(); // Prevent default form submission to show loading state
            saveButton.style.display = "none";
            savingButton.style.display = "inline-block";

           
            form.submit();
        });
    });
});

</script>
