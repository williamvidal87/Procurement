<div>
    <div class="container-fluid" style="font-size: 12px;">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Completely Delevered</h1>
        

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
    @include('layouts.scripts.completely-delevered-table-scripts'); 
@endsection