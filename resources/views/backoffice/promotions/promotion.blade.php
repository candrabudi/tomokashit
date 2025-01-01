@extends('backoffice.layouts.app')

@section('content')
    <div style="padding: 15px;">
        <h1>Promotion Settings</h1>

        <!-- Button to Open Create Promotion Modal -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#promotionModal">Add Promotion</button>

        <!-- Include Promotion Form Modal -->
        @include('backoffice.promotions.promotion_form')

        <!-- List of Promotions -->
        @include('backoffice.promotions.promotion_list')

        <!-- Include Delete Confirmation Modal -->
        @include('backoffice.promotions.delete_modal')
    </div>

    @push('scripts')
        <script>
            // Edit Promotion
            $('.edit-promotion').click(function () {
                let promotion = $(this).data();

                // Set form values for the modal
                $('#promotion_name').val(promotion.name);
                $('#promotion_code').val(promotion.code);
                $('#start_date').val(promotion.startDate);
                $('#end_date').val(promotion.endDate);
                $('#detail_description').val(promotion.description);
                $('#promotionForm').attr('action', '/promotion/' + promotion.id); // Set form action for update
                $('#promotionModalLabel').text('Edit Promotion');
            });

            // Delete Promotion
            $('.delete-promotion').click(function () {
                let promotionId = $(this).data('id');
                $('#deleteForm').attr('action', '/promotion/' + promotionId); // Set form action for delete
            });
        </script>
    @endpush
@endsection
