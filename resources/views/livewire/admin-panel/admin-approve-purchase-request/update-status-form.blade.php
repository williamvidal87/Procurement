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
            @if($this->StatusId==1)
                <button class="btn btn-warning" wire:click="PreProcurement">For Pre-Procurement</button>
            @endif
            @if($this->StatusId==2)
                <button class="btn btn-warning" wire:click="PostingInvitation">For Posting of Invitation to Bid & Bidding Document</button>
            @endif
            @if($this->StatusId==3)
                <button class="btn btn-warning" wire:click="PreBidConference">For Pre-Bid Conference</button>
            @endif
            @if($this->StatusId==4)
                <button class="btn btn-warning" wire:click="BidOpeningEvaluation">For Bid Opening & Evaluation</button>
            @endif
            @if($this->StatusId==5)
                <button class="btn btn-danger" wire:click="FailedBidding">Failed Bidding</button>
                <button class="btn btn-warning" wire:click="AbstractBids">For Abstract of Bids</button>
            @endif
            @if($this->StatusId==10)
                <button class="btn btn-warning" wire:click="PostQualification">For Post Qualification</button>
            @endif
            @if($this->StatusId==11)
                <button class="btn btn-warning" wire:click="NoticeAward">For Notice of Award</button>
            @endif
            @if($this->StatusId==12)
                <button class="btn btn-warning" wire:click="ContaractSigning">For Contract Signing</button>
            @endif
            @if($this->StatusId==13)
                <button class="btn btn-warning" wire:click="NoticeProceed">For Notice to Proceed</button>
            @endif
        @endif
        
        
        <!-- FOR SVP -->
        @if($this->RequestCategoryId==2)
            @if(
                $this->StatusId==17||
                $this->StatusId==18
                )
                <button class="btn btn-warning" wire:click="AbstractQuatation">For Abstract of Quotation</button>
            @endif
        @endif
        
        
    </div>
    
</div>
