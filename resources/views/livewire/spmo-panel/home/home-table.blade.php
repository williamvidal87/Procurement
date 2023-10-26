<div>
    <div class="container-fluid" style="font-size: 12px;">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Home</h1>
        
        
        <div class="row">
    
            <!-- Table -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center">Total Approved Budget</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Item Category</th>
                                        <th>1st Quarter</th>
                                        <th></th>
                                        <th>2nd Quarter</th>
                                        <th></th>
                                        <th>3rd Quarter</th>
                                        <th></th>
                                        <th>4th Quarter</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($InsertBudgetData as $data)
                                        <tr>
                                            <td>{{ $data->getItemCategory->item_category }}</td>
                                            <td>
                                                ₱{{ number_format($data->first_quarter, 2, '.', ',') ?? '0' }}
                                                <?php
                                                        if ($data->first_quarter!=null) {
                                                            $first_quarter_total+=$data->first_quarter;
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                @if((date_format($data->created_at,"m")=='01'||date_format($data->created_at,"m")=='02'||date_format($data->created_at,"m")=='03')&&$data->first_quarter!=0)
                                                <code><u><a href="javascript: void(0)" wire:click="createPurchaseRequest({{$data->id}},1,{{ $data->first_quarter }})">Request</a></u></code>
                                                @endif
                                            </td>
                                            <td>
                                                ₱{{ number_format($data->second_quarter, 2, '.', ',') ?? '0' }}
                                                <?php
                                                        if ($data->second_quarter!=null) {
                                                            $second_quarter_total+=$data->second_quarter;
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                @if((date_format($data->created_at,"m")=='04'||date_format($data->created_at,"m")=='05'||date_format($data->created_at,"m")=='06')&&$data->second_quarter!=0)
                                                <code><u><a href="javascript: void(0)" wire:click="createPurchaseRequest({{$data->id}},2,{{ $data->second_quarter }})">Request</a></u></code>
                                                @endif
                                            </td>
                                            <td>
                                                ₱{{ number_format($data->third_quarter, 2, '.', ',') ?? '0' }}
                                                <?php
                                                        if ($data->third_quarter!=null) {
                                                            $third_quarter_total+=$data->third_quarter;
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    
                                                    $ExistData=0;
                                                    foreach ($InsertProcuredData as $insertProcuredData) {
                                                        if ($insertProcuredData->item_category_id==$data->item_category_id) {
                                                            foreach ($PurchaseRequestItemData as $purchaseRequestItemData) {
                                                                if ($insertProcuredData->id==$purchaseRequestItemData->insert_procured_id) {
                                                                    $ExistData=1;
                                                                }
                                                            }
                                                        }
                                                    }
                                                ?>
                                                @if((date_format($data->created_at,"m")=='07'||date_format($data->created_at,"m")=='08'||date_format($data->created_at,"m")=='09')&&$data->third_quarter!=0&&$ExistData!=1)
                                                    <code><u><a href="javascript: void(0)" wire:click="createPurchaseRequest({{$data->getItemCategory->id}},3,{{ $data->third_quarter }})">Request</a></u></code>
                                                @endif
                                            </td>
                                            <td>
                                                ₱{{ number_format($data->fourth_quarter, 2, '.', ',') ?? '0'  }}
                                                <?php
                                                        if ($data->fourth_quarter!=null) {
                                                            $fourth_quarter_total+=$data->fourth_quarter;
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    
                                                    $ExistData=0;
                                                    foreach ($InsertProcuredData as $insertProcuredData) {
                                                        if ($insertProcuredData->item_category_id==$data->item_category_id) {
                                                            foreach ($PurchaseRequestItemData as $purchaseRequestItemData) {
                                                                if ($insertProcuredData->id==$purchaseRequestItemData->insert_procured_id) {
                                                                    $ExistData=1;
                                                                }
                                                            }
                                                        }
                                                    }
                                                ?>
                                                @if((date_format($data->created_at,"m")=='10'||date_format($data->created_at,"m")=='11'||date_format($data->created_at,"m")=='12')&&$data->fourth_quarter!=0&&$ExistData!=1)
                                                    <code><u><a href="javascript: void(0)" wire:click="createPurchaseRequest({{$data->getItemCategory->id}},4,{{ $data->fourth_quarter }})">Request</a></u></code>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="border: 2px solid;">
                                    <tr>
                                        <th>Total</th>
                                        <th>₱{{ number_format($first_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th></th>
                                        <th>₱{{ number_format($second_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th></th>
                                        <th>₱{{ number_format($third_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th></th>
                                        <th>₱{{ number_format($fourth_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
        
        
        
        
        <div class="row">
    
            <!-- Table -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center">Total Amount of Procured Items</h6>
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
                                    @foreach($InsertProcuredData as $data)
                                        <tr>
                                            <td>{{ $data->getItemCategory->item_category }}</td>
                                            <td>
                                                ₱{{ number_format($data->first_quarter, 2, '.', ',') ?? '0' }}
                                                <?php
                                                        if ($data->first_quarter!=null) {
                                                            $procure_first_quarter_total+=$data->first_quarter;
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                ₱{{ number_format($data->second_quarter, 2, '.', ',') ?? '0' }}
                                                <?php
                                                        if ($data->second_quarter!=null) {
                                                            $procure_second_quarter_total+=$data->second_quarter;
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                ₱{{ number_format($data->third_quarter, 2, '.', ',') ?? '0' }}
                                                <?php
                                                        if ($data->third_quarter!=null) {
                                                            $procure_third_quarter_total+=$data->third_quarter;
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                ₱{{ number_format($data->fourth_quarter, 2, '.', ',') ?? '0' }}
                                                <?php
                                                        if ($data->fourth_quarter!=null) {
                                                            $procure_fourth_quarter_total+=$data->fourth_quarter;
                                                        }
                                                ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="border: 2px solid;">
                                    <tr>
                                        <th>Total</th>
                                        <th>₱{{ number_format($procure_first_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th>₱{{ number_format($procure_second_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th>₱{{ number_format($procure_third_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th>₱{{ number_format($procure_fourth_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
        
        
        
        
        
        <div class="row">
    
            <!-- Table -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center">Savings from Purchase Request</h6>
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
                                    @foreach($InsertBudgetData as $data)
                                        @foreach($InsertProcuredData as $subtract)
                                            @if($data->user_id==$subtract->user_id&&$data->item_category_id==$subtract->item_category_id)
                                            <tr>
                                                <td>{{ $data->getItemCategory->item_category }}</td>
                                                <td>
                                                    ₱{{ number_format($data->first_quarter-$subtract->first_quarter, 2, '.', ',') ?? '0' }}
                                                    <?php
                                                            if ($data->first_quarter!=null) {
                                                                $saving_first_quarter_total+=$data->first_quarter-$subtract->first_quarter;
                                                            }
                                                    ?>
                                                </td>
                                                <td>
                                                    ₱{{ number_format($data->second_quarter-$subtract->second_quarter, 2, '.', ',') ?? '0' }}
                                                    <?php
                                                            if ($data->second_quarter!=null) {
                                                                $saving_second_quarter_total+=$data->second_quarter-$subtract->second_quarter;
                                                            }
                                                    ?>
                                                </td>
                                                <td>
                                                    ₱{{ number_format($data->third_quarter-$subtract->third_quarter, 2, '.', ',') ?? '0' }}
                                                    <?php
                                                            if ($data->third_quarter!=null) {
                                                                $saving_third_quarter_total+=$data->third_quarter-$subtract->third_quarter;
                                                            }
                                                    ?>
                                                </td>
                                                <td>
                                                    ₱{{ number_format($data->fourth_quarter-$subtract->fourth_quarter, 2, '.', ',') ?? '0' }}
                                                    <?php
                                                            if ($data->fourth_quarter!=null) {
                                                                $saving_fourth_quarter_total+=$data->fourth_quarter-$subtract->fourth_quarter;
                                                            }
                                                    ?>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                                <tfoot style="border: 2px solid;">
                                    <tr>
                                        <th>Total</th>
                                        <th>₱{{ number_format($saving_first_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th>₱{{ number_format($saving_second_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th>₱{{ number_format($saving_third_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                        <th>₱{{ number_format($saving_fourth_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
        
        
    
    </div>
    
    
    <!-- CREATE EDIT MODAL -->
    <div wire.ignore.self class="modal fade" id="purchaserequestModal" role="dialog" aria-labelledby="purchaserequestModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <livewire:spmo-panel.home.purchase-request-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    
    
</div>
@section('custom_script')
    @include('layouts.scripts.home-table-scripts'); 
@endsection