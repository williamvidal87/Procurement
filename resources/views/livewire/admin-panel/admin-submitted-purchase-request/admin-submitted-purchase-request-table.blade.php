<div>
    <div class="container-fluid" style="font-size: 12px;">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Submitted Purchase Request</h1>
        

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
                            @foreach($AdminSubmittedPurchaseRequestData as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>
                                        @if($data->purchase_request_date!=null&&$data->pr_id!=null)
                                        {{ $date = date_create_from_format("Y-m-d", $data->purchase_request_date ?? '2023-08-01')->format("Y-m-").$data->getPrNumber->pr_number ?? 'None' }}
                                        @endif
                                    </td>
                                    <td>
                                    {{ $data->purchase_request_date ?? '' }}
                                    </td>
                                    <td>{{ $data->getUser->getOffice->office }}</td>
                                    <td>{{ $data->getInsertProcured->getItemCategory->item_category }}</td>
                                    <td>{{ $data->getQuarter->quarter }}</td>
                                    <td>{{ $data->getStatus->status_name }}</td>
                                    <td>
                                        @if($data->status_id==27)
                                        <button style="width: 5.5rem"  class="py-0 btn btn-sm btn-secondary" wire:click="editAdminSubmmitedPurchaseRequest({{$data->insert_procured_id}},{{ $data->quarter_id }})"><i class="fas fa-eye"></i> Review</button>
                                        @endif
                                        @if($data->status_id==29&&$data->request_category_id==2)
                                        <button style="width: 5.5rem"  class="py-0 btn btn-sm btn-warning" wire:click="updateSvpStatus({{$data->id}})"><i class="fas fa-edit"></i> Update</button>
                                        @endif
                                        @if($data->status_id==29&&$data->request_category_id==1)
                                        <button style="width: 5.5rem"  class="py-0 btn btn-sm btn-warning" wire:click="updateCpbStatus({{$data->id}})"><i class="fas fa-edit"></i> Update</button>
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
    
    <!-- CREATE EDIT MODAL -->
    <div wire.ignore.self class="modal fade" id="submitttedpurchaserequestModal" role="dialog" aria-labelledby="submitttedpurchaserequestModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <livewire:admin-panel.admin-submitted-purchase-request.admin-submitted-purchase-request-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!-- REMARK -->
    <div wire.ignore.self class="modal fade" id="remarkModal" role="dialog" aria-labelledby="remarkModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <livewire:admin-panel.admin-submitted-purchase-request.remark-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!-- FOR FINAL PRINTING -->
    <div wire.ignore.self class="modal fade" id="forfinalprintingModal" role="dialog" aria-labelledby="forfinalprintingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <livewire:admin-panel.admin-submitted-purchase-request.for-final-printing-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!-- UPDATE SVP STATUS FORM -->
    <div wire.ignore.self class="modal fade" id="updatesvpModal" role="dialog" aria-labelledby="updatesvpModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <livewire:admin-panel.admin-submitted-purchase-request.update-svp-status-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!-- UPDATE CPB STATUS FORM -->
    <div wire.ignore.self class="modal fade" id="updatecpbModal" role="dialog" aria-labelledby="updatecpbModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <livewire:admin-panel.admin-submitted-purchase-request.update-cpb-status-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.admin-submitted-purchase-request-table-scripts'); 
@endsection