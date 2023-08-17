<div>
    
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Update Status</h1>
        <button class="close" wire:click="closeStatusForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="form-group" style="text-align: center">
            <strong>PR No.:</strong><span style="color: red"> {{ $this->pr_no }}</span>
            <br>
            <strong>PR Date.:</strong><span style="color: red"> {{ $this->pr_date }} </span>   
        </div>
    </div>
    <div class="modal-footer justify-content-center">
        
        <!-- FOR PBC -->
        @if($this->RequestCategoryId==1)
            @if($this->StatusId==14)
                <button class="btn btn-warning" wire:click="ProjectImplementation">For Project Implementation</button>
            @endif
            @if($this->StatusId==15)
                <button class="btn btn-warning" wire:click="ProjectCompleted">For Project Implementation</button>
            @endif
        @endif
        
        
        <!-- FOR SVP -->
        @if($this->RequestCategoryId==2)
            @if($this->StatusId==19)
                <button class="btn btn-warning" wire:click="PurchaseOrder">For Purchase Order</button>
            @endif
            @if($this->StatusId==20)
                <button class="btn btn-warning" wire:click="PurchaseOrderApproval">For Purchase Order Approval</button>
            @endif
            @if($this->StatusId==21)
                <button class="btn btn-warning" wire:click="ApprovePurchaseOrder">Approved Purchase Order</button>
            @endif
            @if($this->StatusId==22)
                <button class="btn btn-warning" wire:click="SupplierConforme">For Suppliers Conforme</button>
            @endif
            @if($this->StatusId==23)
                <button class="btn btn-warning" wire:click="Delivery">For Delivery</button>
            @endif
            @if($this->StatusId==24)
                <button class="btn btn-success" wire:click="CompletelyDelivered">Completely Delivered</button>
            @endif
        @endif
        
        
    </div>
    
</div>
