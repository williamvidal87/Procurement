<div>
    
        <div class="modal-body">
            <div class="form-group">
                <label for="remark">Remarks <small>(optional)</small></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" wire:model="remark" style="height: 1in"></textarea>
            </div>
        </div>
        <div class="modal-footer justify-content-center">
            <button class="btn btn-secondary" wire:click="NoRemark">No</button>
            <button class="btn btn-danger" wire:click="YesRemark">Yes</button>
        </div>
    
</div>
