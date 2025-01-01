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
                    <th>Promotion Name</th>
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
                        <td>{{ $promotion->promotion_name }}</td>
                        <td>{{ $promotion->promotion_code }}</td>
                        <td>{{ $promotion->start_date }}</td>
                        <td>{{ $promotion->end_date }}</td>
                        <td>
                            <button class="btn btn-info btn-sm edit-promotion" data-id="{{ $promotion->id }}" data-name="{{ $promotion->promotion_name }}" data-code="{{ $promotion->promotion_code }}" data-start-date="{{ $promotion->start_date }}" data-end-date="{{ $promotion->end_date }}" data-description="{{ $promotion->detail->detail_description ?? '' }}" data-image="{{ $promotion->detail->detail_image ?? '' }}" data-bs-toggle="modal" data-bs-target="#promotionModal">Edit</button>

                            <!-- Delete Button -->
                            <button class="btn btn-danger btn-sm delete-promotion" data-id="{{ $promotion->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
