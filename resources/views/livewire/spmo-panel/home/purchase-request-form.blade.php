<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Purchase Request</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closePurchaseRequestForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        
    <form wire:submit.prevent="store" enctype="multipart/form-data">
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
                            <div style="height: 400px; overflow-y: scroll;">
                                <table class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th colspan="7" class="text-left">{{ $ItemCategoryData->item_category ?? 'none' }}</th>
                                        </tr>
                                        <tr>
                                            <th colspan="7" class="text-left">{{ $QuarterData->quarter ?? 'none' }}</th>
                                        </tr>
                                        <tr>
                                            <th>Item No</th>
                                            <th>Unit of Measure</th>
                                            <th>Item Description</th>
                                            <th>Quantity</th>
                                            <th>Estimated Unit Cost</th>
                                            <th>Estimated Total Cost</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($insertProcureds as $index => $insertProcured)
                                            <tr>
                                                <td>
                                                    <input class="form-control form-control-sm" type="text" size="1" onkeypress='return event.charCode >= 46 && event.charCode <= 57' disabled value="{{ $index+1 }}">
                                                    @error('insertProcureds'.'.'.$index.'.'.'item_no') <span style="color: red">Required</span> @enderror
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" type="text"  wire:model="insertProcureds.{{$index}}.unit_measure" size="2" disabled>
                                                    @error('insertProcureds'.'.'.$index.'.'.'unit_measure') <span style="color: red">Required</span> @enderror
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" type="text" wire:model="insertProcureds.{{$index}}.item_description" size="40" disabled>
                                                    @error('insertProcureds'.'.'.$index.'.'.'item_description') <span style="color: red">Required</span> @enderror
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" type="number" wire:model="insertProcureds.{{$index}}.qty" size="1" onkeypress='return event.charCode >= 46 && event.charCode <= 57' required max="{{ $this->insertProcureds[$index]['temp_qty'] }}" disabled>
                                                    @error('insertProcureds'.'.'.$index.'.'.'qty') <span style="color: red">Required</span> @enderror
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" type="text" wire:model="insertProcureds.{{$index}}.estimated_cost" size="3" onkeypress='return event.charCode >= 46 && event.charCode <= 57' disabled>
                                                    @error('insertProcureds'.'.'.$index.'.'.'estimated_cost') <span style="color: red">Required</span> @enderror
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
                                                        if ($this->insertProcureds[$index]['estimated_cost']!=null&&$this->insertProcureds[$index]['qty']!=null&&$this->insertProcureds[$index]['checkbox']==true) {
                                                        $total+=$this->insertProcureds[$index]['estimated_cost']*$this->insertProcureds[$index]['qty'];
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    {{-- <button style="width: 5.3rem" wire:click.prevent="removeItem({{$index}})" class="py-0 btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>Remove</button> --}}
                                                    {{-- <input type="checkbox" class="custom-control-input" id="customCheck"> --}}
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" wire:model="insertProcureds.{{$index}}.checkbox">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot style="border: 2px solid;">
                                        <tr>
                                            <th colspan="5" class="text-right">Total:</th>
                                            <th colspan="1">₱
                                            {{ number_format($total, 2, '.', ',') ?? '0' }}
                                            <?php
                                                $this->total_all=$total;
                                            ?>
                                            @error('total_all') <span style="color: red"><br>{{ $message }}</span> @enderror
                                            </th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{-- <button class="btn btn-sm btn-secondary" wire:click.prevent="addItem">+ Add Items</button> --}}
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
    
    </div>
        
        
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closePurchaseRequestForm">Close</button>
        
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
