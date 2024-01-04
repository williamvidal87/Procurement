<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Budget Utilization</h1>
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
                                
                                @foreach ($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h6 class="m-0 font-weight-bold text-primary" style="text-align: center">Total Amount of Procured Items({{$this->changeYear ?? "none"}})</h6>
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
                                    @foreach ($insertProcureds as $index => $insertProcured)
                                        <tr>
                                            <td>
                                                @foreach($ItemCategoryData as $data)
                                                    @if($insertProcureds[$index]['item_category_id']==$data->id)
                                                        {{ $data->item_category }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <input class="form-control form-control-sm" type="text"  wire:model="insertProcureds.{{$index}}.first_quarter" size="10" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                                @error('insertProcureds'.'.'.$index.'.'.'first_quarter') <span style="color: red">Required</span> @enderror
                                                <?php
                                                    if ($this->insertProcureds[$index]['first_quarter']!=null) {
                                                        $first_quarter_total+=$this->insertProcureds[$index]['first_quarter'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <input class="form-control form-control-sm" type="text" wire:model="insertProcureds.{{$index}}.second_quarter" size="10" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                                @error('insertProcureds'.'.'.$index.'.'.'second_quarter') <span style="color: red">Required</span> @enderror
                                                <?php
                                                    if ($this->insertProcureds[$index]['second_quarter']!=null) {
                                                        $second_quarter_total+=$this->insertProcureds[$index]['second_quarter'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <input class="form-control form-control-sm" type="text" wire:model="insertProcureds.{{$index}}.third_quarter" size="10" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                                @error('insertProcureds'.'.'.$index.'.'.'third_quarter') <span style="color: red">Required</span> @enderror
                                                <?php
                                                    if ($this->insertProcureds[$index]['third_quarter']!=null) {
                                                        $third_quarter_total+=$this->insertProcureds[$index]['third_quarter'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <input class="form-control form-control-sm" type="text" wire:model="insertProcureds.{{$index}}.fourth_quarter" size="10" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                                @error('insertProcureds'.'.'.$index.'.'.'fourth_quarter') <span style="color: red">Required</span> @enderror
                                                <?php
                                                    if ($this->insertProcureds[$index]['fourth_quarter']!=null) {
                                                        $fourth_quarter_total+=$this->insertProcureds[$index]['fourth_quarter'];
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
        @if(!empty($this->UserID))
            <button class="btn btn-primary" wire:click="store">Save changes</button>
        @else
            <button class="btn btn-primary" wire:click="store">Submit</button>
        @endif
    </div>
</div>
