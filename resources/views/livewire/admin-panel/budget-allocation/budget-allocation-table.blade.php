<div>
    <div class="container-fluid" style="font-size: 12px;">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Budget Allocation</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name of Office</th>
                                <th>Name of User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($BudgetUtilizationData as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->getOffice->office ?? 'none' }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <button  class="py-0 btn btn-sm btn-info" wire:click="editBudgetUtilization({{$data->id}})"><i class="fas fa-edit"></i> Allocate</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    
    <!-- CREATE EDIT MODAL -->
    <div wire.ignore.self class="modal fade" id="budgetutilizationModal" role="dialog" aria-labelledby="budgetutilizationModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <livewire:admin-panel.budget-allocation.budget-allocation-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    
    <!-- CREATE PURCHASE REQUEST ITEM-->
    <div wire.ignore.self class="modal fade" id="purchaserequestitemModal" role="dialog" aria-labelledby="purchaserequestitemModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <livewire:admin-panel.budget-allocation.purchase-request-item-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.budgetallocation-table-scripts'); 
@endsection