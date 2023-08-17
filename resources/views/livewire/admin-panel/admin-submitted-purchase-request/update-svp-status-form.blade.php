<div>
    
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Update Status</h1>
        <button class="close" wire:click="closeUpdateSvpForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="form-group" style="text-align: center">
            <strong>PR No.:</strong><span style="color: red"> {{ $this->pr_no }}</span>
            <br>
            <strong>PR Date.:</strong><span style="color: red"> {{ $this->pr_date }} </span>   
        </div>
    </div>
    <div class="modal-footer justify-content-center">
        <button class="btn btn-warning" wire:click="LocalCanvasing">For Local Canvasing</button>
        <button class="btn btn-success" wire:click="PhilgepsPosting">For PhilGeps Posting</button>
    </div>
    
</div>
