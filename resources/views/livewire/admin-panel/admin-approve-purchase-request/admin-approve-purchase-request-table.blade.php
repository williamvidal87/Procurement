<div>
    <div class="container-fluid" style="font-size: 12px;">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Approve Purchase Request</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>PR No.</th>
                                <th>PR Date.</th>
                                <th>Office</th>
                                <th>Item Category</th>
                                <th>Quarter</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($PurchaseRequestData as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->getPrNumber->pr_number ?? 'None' }}</td>
                                <td>{{ $data->purchase_request_date ?? 'None' }}</td>
                                <td>{{ $data->getUser->getOffice->office }}</td>
                                <td>{{ $data->getInsertProcured->getItemCategory->item_category }}</td>
                                <td>{{ $data->getQuarter->quarter }}</td>
                                <td>{{ $data->getStatus->status_name }}</td>
                                <td>
                                    @if(
                                    $data->status_id==1||
                                    $data->status_id==2||
                                    $data->status_id==3||
                                    $data->status_id==4||
                                    $data->status_id==5||
                                    $data->status_id==6||
                                    $data->status_id==7||
                                    $data->status_id==8||
                                    $data->status_id==9||
                                    $data->status_id==10||
                                    $data->status_id==11||
                                    $data->status_id==12||
                                    $data->status_id==13||
                                    $data->status_id==17||
                                    $data->status_id==18
                                    )
                                    <button style="width: 5.3rem"  class="py-0 btn btn-sm btn-warning" wire:click="updateStatus({{$data->id}},{{$data->request_category_id}},{{$data->status_id}})"><i class="fas fa-edit"></i> Update</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    
    <!-- UPDATE STATUS FORM -->
    <div wire.ignore.self class="modal fade" id="updatestatusModal" role="dialog" aria-labelledby="updatestatusModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <livewire:admin-panel.admin-approve-purchase-request.update-status-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!-- REMARK -->
    <div wire.ignore.self class="modal fade" id="remarkModal" role="dialog" aria-labelledby="remarkModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <livewire:admin-panel.admin-approve-purchase-request.remark-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.admin-approve-purchase-request-table-scripts'); 
@endsection