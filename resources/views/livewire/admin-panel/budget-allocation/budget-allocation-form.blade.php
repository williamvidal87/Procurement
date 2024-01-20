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
                            
                            <label for="">Fiscal Year:</label>
                            <select wire:model="changeYear" wire:change="doSomething" style="max-width: 10rem" class="form-control form-control-sm" id="changeYear">
                                
                                @foreach ($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ $this->UserName ?? 'none'}}</h6>
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
                                    @foreach ($InsertBudgetData as $insertBudget)
                                        <tr>
                                            <td>
                                                @foreach($ItemCategoryData as $data)
                                                    @if($insertBudget->item_category_id==$data->id)
                                                        {{ $data->item_category }}
                                                    @endif
                                                @endforeach
                                                <?php
                                                    $purchaseRequestId=$insertBudget->id;
                                                ?>
                                            </td>
                                            <td>
                                                <a style="<?php
                                                $color = "color: red;";
                                                foreach($OfficeItemData as $data2){
                                                    if($insertBudget->id==$data2->insert_budget_id&&1==$data2->quarter_id&&$insertBudget->item_category_id==$data2->category_id){
                                                        if($data2->status_id==33){
                                                            $color = "color: green;";
                                                        }
                                                    }
                                                }
                                                foreach ($InsertProcuredData as $insertProcured){
                                                    if($insertBudget->user_id==$insertProcured->user_id&&$insertBudget->item_category_id==$insertProcured->item_category_id&&$insertBudget->year_budget==$insertProcured->year_budget){
                                                        if($insertProcured->first_quarter>0){
                                                            echo "pointer-events: none;";
                                                            $color = "color: #000000;";
                                                        }
                                                    }
                                                }
                                                echo $color;
                                                ?>" href="javascript: void(0)" wire:click="createPurchaseRequestItem({{$purchaseRequestId}},1)">₱{{ number_format($insertBudget->first_quarter, 2, '.', ',') ?? '0' }}</a>
                                                <?php
                                                    if ($insertBudget->first_quarter!=null) {
                                                        $first_quarter_total+=$insertBudget->first_quarter;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a style="<?php
                                                $color = "color: red;";
                                                foreach($OfficeItemData as $data2){
                                                    if($insertBudget->id==$data2->insert_budget_id&&2==$data2->quarter_id&&$insertBudget->item_category_id==$data2->category_id){
                                                        if($data2->status_id==33){
                                                            $color = "color: green;";
                                                        }
                                                    }
                                                }
                                                foreach ($InsertProcuredData as $insertProcured){
                                                    if($insertBudget->user_id==$insertProcured->user_id&&$insertBudget->item_category_id==$insertProcured->item_category_id&&$insertBudget->year_budget==$insertProcured->year_budget){
                                                        if($insertProcured->second_quarter>0){
                                                            echo "pointer-events: none;";
                                                            $color = "color: #000000;";
                                                        }
                                                    }
                                                }
                                                echo $color;
                                                ?>" href="javascript: void(0)" wire:click="createPurchaseRequestItem({{$purchaseRequestId}},2)">₱{{ number_format($insertBudget->second_quarter, 2, '.', ',') ?? '0' }}</a>
                                                <?php
                                                    if ($insertBudget->second_quarter!=null) {
                                                        $second_quarter_total+=$insertBudget->second_quarter;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a style="<?php
                                                $color = "color: red;";
                                                foreach($OfficeItemData as $data2){
                                                    if($insertBudget->id==$data2->insert_budget_id&&3==$data2->quarter_id&&$insertBudget->item_category_id==$data2->category_id){
                                                        if($data2->status_id==33){
                                                            $color = "color: green;";
                                                        }
                                                    }
                                                }
                                                foreach ($InsertProcuredData as $insertProcured){
                                                    if($insertBudget->user_id==$insertProcured->user_id&&$insertBudget->item_category_id==$insertProcured->item_category_id&&$insertBudget->year_budget==$insertProcured->year_budget){
                                                        if($insertProcured->third_quarter>0){
                                                            echo "pointer-events: none;";
                                                            $color = "color: #000000;";
                                                        }
                                                    }
                                                }
                                                echo $color;
                                                ?>" href="javascript: void(0)" wire:click="createPurchaseRequestItem({{$purchaseRequestId}},3)">₱{{ number_format($insertBudget->third_quarter, 2, '.', ',') ?? '0' }}</a>
                                                <?php
                                                    if ($insertBudget->third_quarter!=null) {
                                                        $third_quarter_total+=$insertBudget->third_quarter;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a style="<?php
                                                $color = "color: red;";
                                                foreach($OfficeItemData as $data2){
                                                    if($insertBudget->id==$data2->insert_budget_id&&4==$data2->quarter_id&&$insertBudget->item_category_id==$data2->category_id){
                                                        if($data2->status_id==33){
                                                            $color = "color: green;";
                                                        }
                                                    }
                                                }
                                                foreach ($InsertProcuredData as $insertProcured){
                                                    if($insertBudget->user_id==$insertProcured->user_id&&$insertBudget->item_category_id==$insertProcured->item_category_id&&$insertBudget->year_budget==$insertProcured->year_budget){
                                                        if($insertProcured->fourth_quarter>0){
                                                            echo "pointer-events: none;";
                                                            $color = "color: #000000;";
                                                        }
                                                    }
                                                }
                                                echo $color;
                                                ?>" href="javascript: void(0)" wire:click="createPurchaseRequestItem({{$purchaseRequestId}},4)">₱{{ number_format($insertBudget->fourth_quarter, 2, '.', ',') ?? '0' }}</a>
                                                <?php
                                                    if ($insertBudget->fourth_quarter!=null) {
                                                        $fourth_quarter_total+=$insertBudget->fourth_quarter;
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
