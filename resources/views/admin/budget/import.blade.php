<!-- Modal -->
<div class="modal fade" id="Modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background: #0D276B">
                <h5 class="modal-title text-white" id="exampleModalLabel">Import</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <p class="card-title">Please select .xls/.xlsx file, using this <a href="https://bit.ly/import_budget_template" target="_blank">format.</a></p>
                    <form action="{{ route('budget.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="imported_file" id="imported_file" class="form-control-file @error('imported_file') is-invalid @enderror" accept=".xls,.xlsx">
                        @error('imported_file')
                            <div class="alert alert-message">{{ $message }}</div>
                        @enderror
                </div>
            </div>
            <div class="modal-footer card-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" value="Import" class="btn btn-success">Import</button>
            </div>
                    </form>
        </div>
    </div>
</div>
