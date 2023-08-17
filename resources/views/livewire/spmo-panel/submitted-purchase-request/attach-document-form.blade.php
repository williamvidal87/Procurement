<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Attach Document</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeAttachDocumentForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        {{-- <div class="form-group">
            <label for="purpose">Purpose</label>
            <textarea class="form-control" id="purpose" wire:model="purpose" style="height: 1in"></textarea>
            @error('purpose') <span style="color: red">{{ $message }}</span> @enderror
        </div> --}}
        <div class="form-group">
            @foreach ($this->documents as $document)
            @endforeach
            @foreach ($this->documents as $document)
            @endforeach
                @foreach ($this->documents as $document)
                    <ul>
                        <li>
                            <i class="fas fa-file-pdf" style='font-size:20px;color:red'><a style="color: black">{{ basename($document) }}</a></i>
                        </li>
                    </ul>
                @endforeach
            <div class="mb-3">
                <label for="documents" class="form-label">PDF Type</label>
                <input type="file" id="documents" class="form-control" wire:model="documents" multiple accept="application/pdf">
                <div wire:loading wire:target="documents">Uploading...</div>
                @error('documents') <span style="color: red">{{ $message }}</span> @enderror
            </div>
        </div>
    
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closeAttachDocumentForm">Close</button>
        <button class="btn btn-primary" wire:click="store">Submit</button>
    </div>
</div>
