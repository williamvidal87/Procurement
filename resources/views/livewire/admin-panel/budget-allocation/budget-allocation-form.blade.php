<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Budget Allocation</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeBudgetUtilizationForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        
        
    <div class="container-fluid" style="font-size: 12px;">
        <div class="row">
    
            <!-- Table -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header">
                        <div class="form-group">
                            <select wire:model="changeYear" wire:change="doSomething" style="max-width: 10rem" class="form-control form-control-sm" id="changeYear">
                                <option>Select Year</option>
                                @foreach ($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center">Total Approved Budget({{$this->changeYear ?? "none"}})</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Item Category</th>
                                        <th>1st Quarter</th>
                                        <th>2nd Quarter</th>
                                        <th>3rd Quarter</th>
                                        <th>4th Quarter</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($insertBudgets as $index => $insertBudget)
                                        <tr>
                                            <td>
                                                @foreach($ItemCategoryData as $data)
                                                    @if($insertBudgets[$index]['item_category_id']==$data->id)
                                                        {{ $data->item_category }}
                                                    @endif
                                                @endforeach
                                                <?php
                                                    $purchaseRequestId=$this->insertBudgets[$index]['id'];
                                                ?>
                                            </td>
                                            <td>
                                                <a style="color: red;" href="javascript: void(0)" wire:click="createPurchaseRequestItem({{$purchaseRequestId}},1)">₱{{ number_format($insertBudgets[$index]['first_quarter'], 2, '.', ',') ?? '0' }}</a>
                                                <?php
                                                    if ($this->insertBudgets[$index]['first_quarter']!=null) {
                                                        $first_quarter_total+=$this->insertBudgets[$index]['first_quarter'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a style="color: red;" href="javascript: void(0)" wire:click="createPurchaseRequestItem({{$purchaseRequestId}},2)">₱{{ number_format($insertBudgets[$index]['second_quarter'], 2, '.', ',') ?? '0' }}</a>
                                                <?php
                                                    if ($this->insertBudgets[$index]['second_quarter']!=null) {
                                                        $second_quarter_total+=$this->insertBudgets[$index]['second_quarter'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a style="color: red;" href="javascript: void(0)" wire:click="createPurchaseRequestItem({{$purchaseRequestId}},3)">₱{{ number_format($insertBudgets[$index]['third_quarter'], 2, '.', ',') ?? '0' }}</a>
                                                <?php
                                                    if ($this->insertBudgets[$index]['third_quarter']!=null) {
                                                        $third_quarter_total+=$this->insertBudgets[$index]['third_quarter'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a style="color: red;" href="javascript: void(0)" wire:click="createPurchaseRequestItem({{$purchaseRequestId}},4)">₱{{ number_format($insertBudgets[$index]['fourth_quarter'], 2, '.', ',') ?? '0' }}</a>
                                                <?php
                                                    if ($this->insertBudgets[$index]['fourth_quarter']!=null) {
                                                        $fourth_quarter_total+=$this->insertBudgets[$index]['fourth_quarter'];
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="border: 2px solid;">
                                    <tr>
                                        <th>Total</th>
                                        <th>₱{{ number_format($first_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th>₱{{ number_format($second_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th>₱{{ number_format($third_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th>₱{{ number_format($fourth_quarter_total, 2, '.', ',') ?? '0' }}</th>
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
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closeBudgetUtilizationForm">Close</button>
        
    </div>
</div>
