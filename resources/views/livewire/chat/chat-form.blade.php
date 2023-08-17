<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Message</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeChatModal"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div id="containerID">
            <div wire:poll id="cotainerID2">
                @foreach($ChatMessageData as $chatMessageData)
                
                @if($chatMessageData->from_id!=Auth::user()->id)
                    {{-- This is for Left --}}
                    <div style="width:98%">
                        <span><strong>{{  $chatMessageData->getfromName->name}}</strong></span>
                        <br>
                        <div class="row">
                            <div class="col-1">
                            <img class="img-profile rounded-circle" src="/storage/{{ $chatMessageData->getfromName->profile_photo_path ?? 'profile-photos/undraw_profile.svg' }}" style="height: 3rem; width: 3rem;">
                            </div>
                            <div class="card shadow mb-8 col-8">
                                <div class="card-body">
                                        <p>{{ $chatMessageData->message }}</p>
                                </div>
                                <span style="text-align: left">{{ $chatMessageData->created_at->format('d M Y g:i a') }}</span>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- This is for Right --}}
                    <div style="width:98%">
                        <span style="float: right"><strong>{{  $chatMessageData->getfromName->name}}</strong></span>
                        <br>
                        <div class="row" >
                            <div class="col-3">
                            </div>
                            <div class="card shadow mb-8 col-8 bg-primary text-white">
                                <div class="card-body">
                                        <p>{{ $chatMessageData->message }}</p>
                                </div>
                                <span style="text-align: right">{{ $chatMessageData->created_at->format('d M Y g:i a') }}</span>
                            </div>
                            <div class="col-1">
                            <img class="img-profile rounded-circle" src="/storage/{{ Auth::user()->profile_photo_path ?? 'profile-photos/undraw_profile.svg' }}" style="height: 3rem; width: 3rem;float: right">
                            </div>
                        </div>
                    </div>
                @endif
                
                @endforeach
            </div>
        </div>
        
    </div>
    <div class="modal-footer justify-content-center">
        <input type="text" class="form-control col-10" id="message" wire:model="message" placeholder="Message...">
        <button  class="btn btn-info col-1" wire:click="SendMessage"><i class="fas fa-paper-plane"></i> Send</button>
    </div>
</div>
