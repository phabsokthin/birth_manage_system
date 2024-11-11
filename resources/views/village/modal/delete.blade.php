@foreach ($villages as $vill)

<div class="modal fade" id="ModalDelete{{$vill->id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងលុប</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form data-delete-id="{{$vill->id}}" class="delete_form" action="{{route('village.destroy',$vill->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="p_code" class="form-label">
                           <h2>តើអ្នកចង់លុប 
                            <a style="color: red;"> {{$vill->village_kh_name}}</a>
                            ?
                            </h2> 
                        </label>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="button" class="btn btn-danger deleteButton" data-delete-id="{{$vill->id}}">លុប</button>
                        <button type="button" class="btn btn-danger deletingButton" data-delete-id="{{$vill->id}}" style="display: none;" disabled>កំពុងលុប...</button>
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
        const deleteId = form.getAttribute("data-delete-id");
        const deleteButton = form.querySelector(`.deleteButton[data-delete-id="${deleteId}"]`);
        const deletingButton = form.querySelector(`.deletingButton[data-delete-id="${deleteId}"]`);

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
