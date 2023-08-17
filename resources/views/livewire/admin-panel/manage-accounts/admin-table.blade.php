<div>
    <div class="container-fluid" style="font-size: 12px;">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Admin</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <button style="width: fit-content;margin-left: 1.2rem;margin-top: 1.2rem"  class="btn btn-primary" wire:click="createAdmin"><i class="fas fa-plus-circle"></i> Add Admin</button> 
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Last Seen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($AdminData as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->email_address }}</td>
                                    <td>{{ $data->phone_number }}</td>
                                    <td>
                                        @if(Cache::has('is_online' . $data->id))
                                            <span class="text-success">Online</span>
                                        @else
                                            <span class="text-secondary">Offline</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->last_seen != null)
                                            {{ \Carbon\Carbon::parse($data->last_seen)->diffForHumans() }}
                                        @else
                                            No data
                                        @endif
                                    </td>
                                    <td>
                                        <button  class="py-0 btn btn-sm btn-info" wire:click="editAdmin({{$data->id}})"><i class="fas fa-edit"></i>Edit</button> | 
                                        <button  class="py-0 btn btn-sm btn-danger" wire:click="deleteAdmin({{$data->id}})"><i class="fas fa-trash-alt"></i>Delete</button>
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
    <div wire.ignore.self class="modal fade" id="adminModal" role="dialog" aria-labelledby="adminModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <livewire:admin-panel.manage-accounts.admin-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.admin-table-scripts'); 
@endsection