<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">For Final Printing</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeForFinalPrintingForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="request_category_id">Mode of Procrement</label>
            <select class="form-control" id="request_category_id" wire:model="request_category_id">
                <option value="0">Select Mode of Procrement</option>
                @foreach($RequestCategoryData as $requestCategoryData)
                    <option value="{{ $requestCategoryData->id }}">{{ $requestCategoryData->request_category }}</option>
                @endforeach
            </select>
            @error('request_category_id') <span style="color: red">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closeForFinalPrintingForm">Close</button>
        
        <button class="btn btn-primary" wire:click="store">Submit</button>
    </div>
</div>
