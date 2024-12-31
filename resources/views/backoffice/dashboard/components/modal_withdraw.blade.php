
<div class="modal fade" id="updateStatusWithdrawModal" tabindex="-1" aria-labelledby="updateStatusWithdrawModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStatusWithdrawModalLabel">Update Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateStatusWithdrawForm">
                    <div class="mb-3">
                        <input type="hidden" id="transactionWithdrawId" value="">
                        <label for="transactionWithdrawStatus" class="form-label">Pilih Status</label>
                        <select class="form-select" id="transactionWithdrawStatus">
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailWithdrawModal" tabindex="-1" aria-labelledby="detailWithdrawModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailWithdrawModalLabel">Detail Withdraw</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detailWithdrawContent">
                
            </div>
        </div>
    </div>
</div>