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
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($PurchaseRequestData as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->purchase_request_number ?? 'None' }}</td>
                                <td>{{ $data->purchase_request_date ?? 'None' }}</td>
                                <td>{{ $data->getUser->getOffice->office }}</td>
                                <td>{{ $data->getInsertProcured->getItemCategory->item_category }}</td>
                                <td>{{ $data->getQuarter->quarter }}</td>
                                <td>{{ $data->getStatus->status_name }}</td>
                                <td>{{ $data->remark ?? 'None' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.user-approve-purchase-request-table-scripts'); 
@endsection