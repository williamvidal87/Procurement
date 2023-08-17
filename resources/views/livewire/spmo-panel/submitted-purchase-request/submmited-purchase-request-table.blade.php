<div>
    <div class="container-fluid" style="font-size: 12px;">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Submmited Purchase Request</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Item Category</th>
                                <th>Quater</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($SubmmitedPurchaseRequestData as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->getInsertProcured->getItemCategory->item_category }}</td>
                                    <td>{{ $data->getQuarter->quarter }}</td>
                                    <td>{{ $data->getStatus->status_name }}</td>
                                    <td>{{ $data->remark ?? '' }}</td>
                                    <td>
                                        @if($data->status_id==26)
                                            {{-- <button  class="py-0 btn btn-sm btn-info" wire:click="editSubmmitedPurchaseRequest({{$data->insert_procured_id}},{{ $data->quarter_id }})"><i class="fas fa-edit"></i>Edit</button> --}}
                                            <button  class="py-0 btn btn-sm btn-secondary" wire:click="AttachDocument({{$data->id}})"><i class="fas fa-paperclip"></i>Attach</button>
                                        @endif
                                        @if($data->status_id==28||$data->status_id==29)
                                            <button  class="py-0 btn btn-sm btn-warning" wire:click="Print({{$data->id}})"><i class="fas fa-print"></i> Print</button>
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
    <div wire.ignore.self class="modal fade" id="submmitedpurchaserequestModal" role="dialog" aria-labelledby="submmitedpurchaserequestModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <livewire:spmo-panel.submitted-purchase-request.submmited-purchase-request-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!-- ATTACH DOCUMENT -->
    <div wire.ignore.self class="modal fade" id="attachDocumentModal" role="dialog" aria-labelledby="attachDocumentModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <livewire:spmo-panel.submitted-purchase-request.attach-document-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.submmitedpurchaserequest-table-scripts'); 
@endsection