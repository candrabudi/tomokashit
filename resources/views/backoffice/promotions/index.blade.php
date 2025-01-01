@extends('backoffice.layouts.app')

@section('content')
    <div style="padding: 15px;">
        <h1>Promotion Settings</h1>

        <!-- Button to Open Create Promotion Modal -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#promotionModal">Add Promotion</button>

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
                                <label for="title" class="form-label">Promotion Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="promotion_code" class="form-label">Promotion Code</label>
                                <input type="text" class="form-control" id="promotion_code" name="promotion_code"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="promotion_type" class="form-label">Promotion Type</label>
                                <select class="form-control" id="promotion_type" name="promotion_type" required>
                                    <option value="posting">Posting</option>
                                    <option value="bonus">Bonus</option>
                                    <option value="new_member">New Member</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="banner" class="form-label">Promotion Banner</label>
                                <input type="file" class="form-control" id="banner" name="banner">
                            </div>

                            <!-- Promotion Financials -->
                            <div class="mb-3">
                                <label for="minimum_deposit" class="form-label">Minimum Deposit</label>
                                <input type="number" class="form-control" id="minimum_deposit" name="minimum_deposit"
                                    step="0.01">
                            </div>
                            <div class="mb-3">
                                <label for="maximum_deposit" class="form-label">Maximum Deposit</label>
                                <input type="number" class="form-control" id="maximum_deposit" name="maximum_deposit"
                                    step="0.01">
                            </div>
                            <div class="mb-3">
                                <label for="minimum_withdraw" class="form-label">Minimum Withdraw</label>
                                <input type="number" class="form-control" id="minimum_withdraw" name="minimum_withdraw"
                                    step="0.01">
                            </div>
                            <div class="mb-3">
                                <label for="maximum_withdraw" class="form-label">Maximum Withdraw</label>
                                <input type="number" class="form-control" id="maximum_withdraw" name="maximum_withdraw"
                                    step="0.01">
                            </div>
                            <div class="mb-3">
                                <label for="turnover" class="form-label">Turnover</label>
                                <input type="number" class="form-control" id="turnover" name="turnover"
                                    step="0.01">
                            </div>
                            <div class="mb-3">
                                <label for="total_turnover" class="form-label">Total Turnover</label>
                                <input type="number" class="form-control" id="total_turnover" name="total_turnover"
                                    step="0.01">
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

        <!-- List of Promotions -->
        <div class="card mt-3">
            <div class="card-header">
                <h5>List of Promotions</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Promotion Title</th>
                            <th>Promotion Code</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promotions as $promotion)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $promotion->title }}</td>
                                <td>{{ $promotion->promotion_code }}</td>
                                <td>{{ $promotion->start_date }}</td>
                                <td>{{ $promotion->end_date }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm edit-promotion" data-id="{{ $promotion->id }}"
                                        data-title="{{ $promotion->title }}" data-code="{{ $promotion->promotion_code }}"
                                        data-start-date="{{ $promotion->start_date }}"
                                        data-end-date="{{ $promotion->end_date }}"
                                        data-description="{{ $promotion->description }}"
                                        data-promotion-type="{{ $promotion->promotion_type }}"
                                        data-banner="{{ $promotion->banner }}" data-bs-toggle="modal"
                                        data-bs-target="#promotionModal">Edit</button>

                                    <!-- Delete Button -->
                                    <button class="btn btn-danger btn-sm delete-promotion" data-id="{{ $promotion->id }}"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Confirmation for Delete -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this promotion?
                    </div>
                    <div class="modal-footer">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Edit Promotion
        // Edit Promotion
        $('.edit-promotion').click(function () {
    let promotionId = $(this).data('id');
    
    // Fetch the promotion data from the server
    $.ajax({
        url: '/system/promotion/detail/' + promotionId,
        method: 'GET',
        success: function (promotion) {
            // Set form values for the modal
            $('#title').val(promotion.title);
            $('#description').val(promotion.description);
            $('#turnover').val(promotion.turnover);
            $('#total_turnover').val(promotion.total_turnover);
            $('#minimum_deposit').val(promotion.minimum_deposit);
            $('#maximum_deposit').val(promotion.maximum_deposit);
            $('#minimum_withdraw').val(promotion.minimum_withdraw);
            $('#maximum_withdraw').val(promotion.maximum_withdraw);
            $('#claim_type').val(promotion.claim_type);
            $('#status').val(promotion.status);
            $('#start_date').val(promotion.start_date);
            $('#end_date').val(promotion.end_date);
            $('#promotion_type').val(promotion.promotion_type);

            // Set the banner image preview if available
            if (promotion.banner) {
                $('#banner-preview').attr('src', '/storage/' + promotion.banner).show();  // Assuming 'banner-preview' is the ID of the image element for preview
            } else {
                $('#banner-preview').hide();  // Hide the preview if there's no banner
            }

            // Set form action for update
            $('#promotionForm').attr('action', '/system/promotion/' + promotion.id); // Update the form action URL
            $('#promotionModalLabel').text('Edit Promotion');
        },
        error: function (xhr, status, error) {
            // Handle error if promotion data is not fetched
            alert('Error fetching promotion data');
        }
    });
});


        // Delete Promotion
        $('.delete-promotion').click(function() {
            let promotionId = $(this).data('id');
            $('#deleteForm').attr('action', '/system/promotion/' + promotionId); // Set form action for delete
        });
    </script>
@endsection
