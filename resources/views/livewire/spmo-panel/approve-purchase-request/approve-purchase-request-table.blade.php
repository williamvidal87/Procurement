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
                                    <td>
                                        @if($data->purchase_request_date!=null)
                                        {{ $date = date_create_from_format("Y-m-d", $data->purchase_request_date ?? '2023-08-01')->format("Y-m-").$data->getPrNumber->pr_number ?? 'None' }}
                                        @endif
                                    </td>
                                <td>{{ $data->purchase_request_date ?? 'None' }}</td>
                                <td>{{ $data->getUser->getOffice->office }}</td>
                                <td>{{ $data->getInsertProcured->getItemCategory->item_category }}</td>
                                <td>{{ $data->getQuarter->quarter }}</td>
                                <td>{{ $data->getStatus->status_name }}</td>
                                <td>
                                    @if(
                                        $data->status_id==14||
                                        $data->status_id==15||
                                        $data->status_id==16||
                                        $data->status_id==19||
                                        $data->status_id==20||
                                        $data->status_id==21||
                                        $data->status_id==22||
                                        $data->status_id==23||
                                        $data->status_id==24
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
                <livewire:spmo-panel.approve-purchase-request.update-status-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.approve-purchase-request-table-scripts'); 
@endsection