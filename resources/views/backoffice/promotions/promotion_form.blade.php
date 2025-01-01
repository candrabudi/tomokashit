<!-- Modal Create / Update Promotion -->
<div class="modal fade" id="promotionModal" tabindex="-1" aria-labelledby="promotionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="promotionModalLabel">Create Promotion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="promotionForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Promotion Form -->
                    <div class="mb-3">
                        <label for="promotion_name" class="form-label">Promotion Name</label>
                        <input type="text" class="form-control" id="promotion_name" name="promotion_name">
                    </div>
                    <div class="mb-3">
                        <label for="promotion_code" class="form-label">Promotion Code</label>
                        <input type="text" class="form-control" id="promotion_code" name="promotion_code">
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <div class="mb-3">
                        <label for="detail_description" class="form-label">Detail Description</label>
                        <textarea class="form-control" id="detail_description" name="detail_description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detail_image" class="form-label">Detail Image</label>
                        <input type="file" class="form-control" id="detail_image" name="detail_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
