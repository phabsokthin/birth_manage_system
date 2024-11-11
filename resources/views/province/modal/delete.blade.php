@foreach ($province as $pro)
<div class="modal fade" id="ModalDelete{{$pro->province_id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងលុប</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form data-province-id="{{$pro->province_id}}" class="delete_form" action="{{route('province.destroy',$pro->province_id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="p_code" class="form-label">
                            <h2>តើអ្នកចង់លុប 
                            <a style="color: red;"> {{$pro->province_kh_name}}</a>?
                            </h2> 
                        </label>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="button" class="btn btn-danger deleteButton" data-province-id="{{$pro->province_id}}">លុប</button>
                        <button type="button" class="btn btn-danger deletingButton" data-province-id="{{$pro->province_id}}" style="display: none;" disabled>កំពុងលុប...</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll(".delete_form");

    forms.forEach(form => {
        const provinceId = form.getAttribute("data-province-id");
        const deleteButton = form.querySelector(`.deleteButton[data-province-id="${provinceId}"]`);
        const deletingButton = form.querySelector(`.deletingButton[data-province-id="${provinceId}"]`);

        deleteButton.addEventListener("click", function () {
            // Show loading button
            deleteButton.style.display = "none";
            deletingButton.style.display = "inline-block";

            // Submit the form immediately
            form.submit();
        });
    });
});
</script>

