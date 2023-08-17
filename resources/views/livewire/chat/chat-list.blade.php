<div>
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
                <livewire:user-panel.badge.chat-message-badge />
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
            </h6>
            
            <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" autocomplete="off">
            <ul id="myUL" style="list-style-type: none;">
                @foreach($UserData as $userData)
                    <li style="float: right;width:20rem;<?php
                    $notseen=false;
                    foreach ($messages_status as $message_status) {
                        if ($userData->id==$message_status->from_id) {
                            if($message_status->status_id==30||$message_status->status_id==null&&$userData->id!=Auth::user()->id) {
                                $notseen=true;
                            }
                        }
                    }
                    if ($notseen==true) {
                        echo "background-color: #ececef";
                    }
                ?>"
                    class="listing-item" data-listing-price="<?php
                            $this->temptime='';
                            foreach ($last_message as $lastmessage) {
                                if (($userData->id==$lastmessage->from_id&&$userData->id==$lastmessage->to_id)||(Auth::user()->id==$lastmessage->from_id&&$userData->id==$lastmessage->to_id)||(Auth::user()->id==$lastmessage->to_id&&$userData->id==$lastmessage->from_id)) {
                                    $this->temptime=$lastmessage->created_at;
                                }
                            }
                                if ($this->temptime!='') {
                                echo $this->temptime->format('Y');
                                echo $this->temptime->format('m');
                                echo $this->temptime->format('d');
                                echo $this->temptime->format('H');
                                echo $this->temptime->format('i');
                                echo $this->temptime->format('s');
                                }
                            ?>">
                        <a class="dropdown-item d-flex align-items-center" href="javascript: void(0)" wire:click="openChatForm({{$userData->id}})">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="/storage/{{ $userData->profile_photo_path ?? 'profile-photos/undraw_profile.svg' }}"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">
                                    <?php
                                    $this->tempmessage='';
                                    foreach ($last_message as $lastmessage) {
                                        if (($userData->id==$lastmessage->from_id&&$userData->id==$lastmessage->to_id)||(Auth::user()->id==$lastmessage->from_id&&$userData->id==$lastmessage->to_id)||(Auth::user()->id==$lastmessage->to_id&&$userData->id==$lastmessage->from_id)) {
                                            $this->tempmessage=$lastmessage->message;
                                        }
                                    }
                                        echo $this->tempmessage;
                                    ?>
                                </div>
                                <div class="small text-gray-500">{{ $userData->name }} 
                                    <?php
                                    $this->temptime='';
                                    foreach ($last_message as $lastmessage) {
                                        if (($userData->id==$lastmessage->from_id&&$userData->id==$lastmessage->to_id)||(Auth::user()->id==$lastmessage->from_id&&$userData->id==$lastmessage->to_id)||(Auth::user()->id==$lastmessage->to_id&&$userData->id==$lastmessage->from_id)) {
                                            $this->temptime=$lastmessage->created_at;
                                        }
                                    }
                                    if ($this->temptime!='') {
                                        echo $this->temptime->format('d M Y g:i a');
                                        // echo $this->temptime->format('Y');
                                        // echo $this->temptime->format('m');
                                        // echo $this->temptime->format('H');
                                        // echo $this->temptime->format('i');
                                        // echo $this->temptime->format('s');
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </li>
    
    <!-- CREATE EDIT MODAL -->
    <div wire.ignore.self class="modal fade" id="chatModal" role="dialog" aria-labelledby="chatModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <livewire:chat.chat-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

@section('custom_script')
    @include('layouts.scripts.chat-table-scripts'); 
@endsection