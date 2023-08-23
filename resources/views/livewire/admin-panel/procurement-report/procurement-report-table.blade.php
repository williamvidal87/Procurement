<div>
    <div class="container-fluid" style="font-size: 12px;">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Procurement Report</h1>
        
        
        
        
        
        
        
        
        
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Budget/Procured/Savings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-home5-tab" data-toggle="pill" href="#custom-tabs-four-home5" role="tab" aria-controls="custom-tabs-four-home5" aria-selected="false">Budget Percentage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-home2-tab" data-toggle="pill" href="#custom-tabs-four-home2" role="tab" aria-controls="custom-tabs-four-home2" aria-selected="false">Completely Delivered Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-home3-tab" data-toggle="pill" href="#custom-tabs-four-home3" role="tab" aria-controls="custom-tabs-four-home3" aria-selected="false">Request Percentage Per Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-home4-tab" data-toggle="pill" href="#custom-tabs-four-home4" role="tab" aria-controls="custom-tabs-four-home4" aria-selected="false">Procurement Percentage</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    
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
                                                    <th>2nd Quarter</th>
                                                    <th>3rd Quarter</th>
                                                    <th>4th Quarter</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($ItemCategory as $data)
                                                    <tr>
                                                        <td>{{ $data->item_category }}</td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertBudgetData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $first_quarter+=$insertBudgetData->first_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($first_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $first_quarter_total+=$first_quarter;
                                                                $first_quarter=0;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertBudgetData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $second_quarter+=$insertBudgetData->second_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($second_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $second_quarter_total+=$second_quarter;
                                                                $second_quarter=0;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertBudgetData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $third_quarter+=$insertBudgetData->third_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($third_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $third_quarter_total+=$third_quarter;
                                                                $third_quarter=0;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertBudgetData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $fourth_quarter+=$insertBudgetData->fourth_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($fourth_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $fourth_quarter_total+=$fourth_quarter;
                                                                $fourth_quarter=0;
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
                                                @foreach($ItemCategory as $data)
                                                    <tr>
                                                        <td>{{ $data->item_category }}</td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertProcuredData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $first_quarter+=$insertBudgetData->first_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($first_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $procured_first_quarter_total+=$first_quarter;
                                                                $first_quarter=0;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertProcuredData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $second_quarter+=$insertBudgetData->second_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($second_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $procured_second_quarter_total+=$second_quarter;
                                                                $second_quarter=0;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertProcuredData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $third_quarter+=$insertBudgetData->third_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($third_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $procured_third_quarter_total+=$third_quarter;
                                                                $third_quarter=0;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertProcuredData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $fourth_quarter+=$insertBudgetData->fourth_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($fourth_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $procured_fourth_quarter_total+=$fourth_quarter;
                                                                $fourth_quarter=0;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot style="border: 2px solid;">
                                                <tr>
                                                    <th>Total</th>
                                                    <th>₱{{ number_format($procured_first_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                                    <th>₱{{ number_format($procured_second_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                                    <th>₱{{ number_format($procured_third_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                                    <th>₱{{ number_format($procured_fourth_quarter_total, 2, '.', ',') ?? '0' }}</th>
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
                                                @foreach($ItemCategory as $data)
                                                    <tr>
                                                        <td>{{ $data->item_category }}</td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertBudgetData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $first_quarter+=$insertBudgetData->first_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            @foreach($InsertProcuredData as $insertProcuredData)
                                                                @if($insertProcuredData->item_category_id==$data->id)
                                                                    <?php
                                                                        $first_quarter-=$insertProcuredData->first_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($first_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $savings_first_quarter_total+=$first_quarter;
                                                                $first_quarter=0;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertBudgetData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $second_quarter+=$insertBudgetData->second_quarter;
                                                                    ?>
                                                                @endif
                                                                @foreach($InsertProcuredData as $insertProcuredData)
                                                                    @if($insertProcuredData->item_category_id==$data->id)
                                                                        <?php
                                                                            $second_quarter-=$insertProcuredData->second_quarter;
                                                                        ?>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                            {{ number_format($second_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $savings_second_quarter_total+=$second_quarter;
                                                                $second_quarter=0;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertBudgetData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $third_quarter+=$insertBudgetData->third_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            @foreach($InsertProcuredData as $insertProcuredData)
                                                                @if($insertProcuredData->item_category_id==$data->id)
                                                                    <?php
                                                                        $third_quarter-=$insertProcuredData->third_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($third_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $savings_third_quarter_total+=$third_quarter;
                                                                $third_quarter=0;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            ₱
                                                            @foreach($InsertBudgetData as $insertBudgetData)
                                                                @if($insertBudgetData->item_category_id==$data->id)
                                                                    <?php
                                                                        $fourth_quarter+=$insertBudgetData->fourth_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            @foreach($InsertProcuredData as $insertProcuredData)
                                                                @if($insertProcuredData->item_category_id==$data->id)
                                                                    <?php
                                                                        $fourth_quarter-=$insertProcuredData->fourth_quarter;
                                                                    ?>
                                                                @endif
                                                            @endforeach
                                                            {{ number_format($fourth_quarter, 2, '.', ',') ?? '0' }}
                                                            <?php
                                                                $savings_fourth_quarter_total+=$fourth_quarter;
                                                                $fourth_quarter=0;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot style="border: 2px solid;">
                                                <tr>
                                                    <th>Total</th>
                                                    <th>₱{{ number_format($savings_first_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                                    <th>₱{{ number_format($savings_second_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                                    <th>₱{{ number_format($savings_third_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                                    <th>₱{{ number_format($savings_fourth_quarter_total, 2, '.', ',') ?? '0' }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-home5" role="tabpanel" aria-labelledby="custom-tabs-four-home5-tab">
                    
                    
                    
                    
                    <!-- Content Column -->
                    <div class="col-lg-12 mb-4">

                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                @foreach($UserData as $data)
                                    <?php
                                        $office_budget=0;
                                        foreach ($InsertBudgetData as $insertBudgetData) {
                                            if ($data->id==$insertBudgetData->user_id) {
                                                $office_budget+=$insertBudgetData->first_quarter+$insertBudgetData->second_quarter+$insertBudgetData->third_quarter+$insertBudgetData->third_quarterfourth_quarter;
                                            }
                                        }
                                    ?>
                                    <h4 class="small font-weight-bold">{{ $data->getOffice->office }} <span
                                            class="float-right">{{ round($office_budget/$this->Guihulngan_Budget*100,2) }}%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $office_budget/$this->Guihulngan_Budget*100 }}%"
                                            aria-valuenow="{{ $office_budget/$this->Guihulngan_Budget*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    
                    
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-home2" role="tabpanel" aria-labelledby="custom-tabs-four-home2-tab">
                    
                    
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Office</th>
                                                <th>Number of Request</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($UserData as $data)
                                                <tr>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->getOffice->office }}</td>
                                                    <td>
                                                        @foreach($PurchaseRequestData as $purchaseRequestData)
                                                            @if($data->id==$purchaseRequestData->user_id)
                                                                @if($purchaseRequestData->status_id==16||$purchaseRequestData->status_id==25)
                                                                    <?php
                                                                        $number_of_request++;
                                                                    ?>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        {{ $number_of_request ?? '0' }}
                                                        <?php
                                                            $number_of_request=0;
                                                        ?>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-home3" role="tabpanel" aria-labelledby="custom-tabs-four-home3-tab">
                    
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Office Supplies<span class="float-right">
                                <?php
                                    $count=0;
                                ?>
                                @foreach($OfficeSuppliesData as $officeSuppliesData)
                                    @if($officeSuppliesData->first_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->second_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->third_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->fourth_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                @endforeach
                                {{ $count }}%
                            </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $count }}%" aria-valuenow="{{ $count }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Office Equipment<span class="float-right">
                                <?php
                                    $count=0;
                                ?>
                                @foreach($OfficeEquipmentData as $officeSuppliesData)
                                    @if($officeSuppliesData->first_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->second_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->third_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->fourth_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                @endforeach
                                {{ $count }}%
                            </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $count }}%" aria-valuenow="{{ $count }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Infrastructure<span class="float-right">
                                <?php
                                    $count=0;
                                ?>
                                @foreach($InfrastructureData as $officeSuppliesData)
                                    @if($officeSuppliesData->first_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->second_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->third_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->fourth_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                @endforeach
                                {{ $count }}%
                            </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: {{ $count }}%" aria-valuenow="{{ $count }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Repairs & Maintenance<span class="float-right">
                                <?php
                                    $count=0;
                                ?>
                                @foreach($RepairsMaintenanceData as $officeSuppliesData)
                                    @if($officeSuppliesData->first_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->second_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->third_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->fourth_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                @endforeach
                                {{ $count }}%
                            </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: {{ $count }}%" aria-valuenow="{{ $count }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Furniture & Fixture<span class="float-right">
                                <?php
                                    $count=0;
                                ?>
                                @foreach($FurnitureFixtureData as $officeSuppliesData)
                                    @if($officeSuppliesData->first_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->second_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->third_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->fourth_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                @endforeach
                                {{ $count }}%
                            </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $count }}%" aria-valuenow="{{ $count }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Others<span class="float-right">
                                <?php
                                    $count=0;
                                ?>
                                @foreach($OthersData as $officeSuppliesData)
                                    @if($officeSuppliesData->first_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->second_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->third_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                    @if($officeSuppliesData->fourth_quarter!=0)
                                    <?php
                                        $count++;
                                    ?>
                                    @endif
                                @endforeach
                                {{ $count }}%
                            </span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: {{ $count }}%" aria-valuenow="{{ $count }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-home4" role="tabpanel" aria-labelledby="custom-tabs-four-home4-tab">
                    
                    
                    
                    <!-- Pie Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> Procured
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Remaining
                                    </span>
                                </div>
                            </div>
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
    @include('layouts.scripts.procurement-report-table-scripts'); 
@endsection