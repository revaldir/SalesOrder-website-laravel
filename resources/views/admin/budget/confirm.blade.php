<!-- Modal -->
<div class="modal fade" id="Modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background: #0D276B">
                <h5 class="modal-title text-white" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Bulan</th>
                            <td id="bln"></td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td id="cat"></td>
                        </tr>
                        <tr>
                            <th>Nominal (Rp).</th>
                            <td id="price">Please input a value.</td>
                        </tr>
                    </table>
                    <p class="card-title">Are you sure you want to submit a new budget?</p>
                </div>
            </div>
            <div class="modal-footer card-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Add Budget</button>
            </div>
        </div>
    </div>
</div>
