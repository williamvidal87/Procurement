<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Purchase Request</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closePurchaseRequestItemForm"><span aria-hidden="true">&times;</span></button>
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
                                            <div class="form-group" style="text-align: left">
                                                <select wire:model="status_id" style="max-width: 10rem" class="form-control form-control-sm" id="status_id" required>
                                                    <option>Select Status</option>
                                                    @foreach ($StatusData as $data)
                                                        <option value="{{$data->id}}">{{$data->status_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('status_id') <span style="color: red;">{{ $message }}</span> @enderror
                                            </div>
                                        </tr>
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
                                        @foreach ($insertBudgets as $index => $insertBudgeted)
                                            <tr>
                                                <td>
                                                    {{ $index+1 }}
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" type="text"  wire:model="insertBudgets.{{$index}}.unit_measure" size="2" required>
                                                    @error('insertBudgets'.'.'.$index.'.'.'unit_measure') <span style="color: red">Required</span> @enderror
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" type="text" wire:model="insertBudgets.{{$index}}.item_description" size="40" required>
                                                    @error('insertBudgets'.'.'.$index.'.'.'item_description') <span style="color: red">Required</span> @enderror
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" type="number" wire:model="insertBudgets.{{$index}}.qty" size="1" onkeypress='return event.charCode >= 46 && event.charCode <= 57' required>
                                                    @error('insertBudgets'.'.'.$index.'.'.'qty') <span style="color: red">Required</span> @enderror
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" type="text" wire:model="insertBudgets.{{$index}}.estimated_cost" size="3" onkeypress='return event.charCode >= 46 && event.charCode <= 57' required>
                                                    @error('insertBudgets'.'.'.$index.'.'.'estimated_cost') <span style="color: red">Required</span> @enderror
                                                    <?php
                                                        if ($this->insertBudgets[$index]['estimated_cost']!=null) {
                                                            $estimated_cost_total+=$this->insertBudgets[$index]['estimated_cost'];
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    ₱
                                                    @if($this->insertBudgets[$index]['estimated_cost']!=null&&$this->insertBudgets[$index]['qty']!=null)
                                                    {{ number_format($this->insertBudgets[$index]['estimated_cost']*$this->insertBudgets[$index]['qty'], 2, '.', ',') ?? '0' }}
                                                    @endif
                                                    <?php
                                                        if ($this->insertBudgets[$index]['estimated_cost']!=null&&$this->insertBudgets[$index]['qty']!=null) {
                                                        $total+=$this->insertBudgets[$index]['estimated_cost']*$this->insertBudgets[$index]['qty'];
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button style="width: 5.3rem" wire:click.prevent="removeItem({{$index}})" class="py-0 btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>Remove</button>
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
                            <button class="btn btn-sm btn-secondary" wire:click.prevent="addItem">+ Add Items</button>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
    
    </div>
        
        
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closePurchaseRequestItemForm">Close</button>
        
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
