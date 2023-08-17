<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Submitted Purchase Request</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeAdminSubmmitedPurchaseRequestForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
            
            
            
            
            
            
            
            
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Purchase Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Request Attachments</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        
                        <div class="container-fluid" style="font-size: 12px;">
                            <div class="row">
                                <!-- Table -->
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header">
                                            <h6 class="m-0 font-weight-bold text-primary" style="text-align: center">Purchase Request</h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive text-center">
                                                <div style="height: 330px; overflow-y: scroll;">
                                                    <table class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="6" class="text-left">{{ $UserData->getOffice->office ?? 'none' }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="6" class="text-left">{{ $ItemCategoryData->item_category ?? 'none' }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="6" class="text-left">{{ $QuarterData->quarter ?? 'none' }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Item No</th>
                                                                <th>Unit of Measure</th>
                                                                <th>Item Description</th>
                                                                <th>Quantity</th>
                                                                <th>Estimated Unit Cost</th>
                                                                <th>Estimated Total Cost</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($insertProcureds as $index => $insertProcured)
                                                                <tr>
                                                                    <td>
                                                                        {{ $index+1 }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $insertProcureds[$index]['unit_measure'] }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $insertProcureds[$index]['item_description'] }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $insertProcureds[$index]['qty'] }}
                                                                    </td>
                                                                    <td>
                                                                        {{ number_format($insertProcureds[$index]['estimated_cost'], 2, '.', ',') ?? '0' }}
                                                                        <?php
                                                                            if ($this->insertProcureds[$index]['estimated_cost']!=null) {
                                                                                $estimated_cost_total+=$this->insertProcureds[$index]['estimated_cost'];
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        ₱
                                                                        @if($this->insertProcureds[$index]['estimated_cost']!=null&&$this->insertProcureds[$index]['qty']!=null)
                                                                        {{ number_format($this->insertProcureds[$index]['estimated_cost']*$this->insertProcureds[$index]['qty'], 2, '.', ',') ?? '0' }}
                                                                        @endif
                                                                        <?php
                                                                            if ($this->insertProcureds[$index]['estimated_cost']!=null&&$this->insertProcureds[$index]['qty']!=null) {
                                                                            $total+=$this->insertProcureds[$index]['estimated_cost']*$this->insertProcureds[$index]['qty'];
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr style="border: 2px solid;">
                                                                <th colspan="5" class="text-right">Total:</th>
                                                                <th colspan="1">₱
                                                                {{ number_format($total, 2, '.', ',') ?? '0' }}
                                                                <?php
                                                                    $this->total_all=$total;
                                                                ?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="6" class="text-left">{{ $this->purpose ?? '' }}</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <div class="container-fluid" style="font-size: 12px;">
                        
                            <div class="row">
                                <!-- Table -->
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header">
                                            <h6 class="m-0 font-weight-bold text-primary" style="text-align: center">Request Attachments</h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                
                                            <div class="form-group">
                                                PDF Preview:
                                                @foreach ($this->documents as $document)
                                                @endforeach
                                                @foreach ($this->documents as $document)
                                                @endforeach
                                                <div class="row" style="height: 300px; overflow-y: scroll;">
                                                    @foreach ($this->documents as $document)
                                                        <div class="mb-1 col-6 card me-1" style="height: 200px;">
                                                            <embed src="/storage/{{ $document }}"/>
                                                            <a href="/storage/{{$document}}" target="_blank">View</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
    
        
        
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closeAdminSubmmitedPurchaseRequestForm">Close</button>
        
        <div>
            {{-- <button class="btn btn-warning" wire:click="Revise">Revise</button> --}}
            <button class="btn btn-success" wire:click="ForFinalPrinting">For Final Printing</button>
        </div>
    </div>
</div>
