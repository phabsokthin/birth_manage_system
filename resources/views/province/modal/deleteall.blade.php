<!-- Confirmation Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="confirmDeleteModalLabel">បញ្ជាក់ការលុប</h5>
                {{-- <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" id="reloadpage" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                តើអ្នកពិតជាចង់លុបរបស់ជ្រើសរើសទាំងនេះមែនទេ?
            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-secondary" id="reloadpage">បោះបង់</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">លុប</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Select the cancel button
    document.getElementById("reloadpage").addEventListener("click", function () {
        location.reload();
    });

   
</script>
