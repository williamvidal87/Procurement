<div>
    <div wire:poll>
        @if(count($ChatMessageData)!=0)
            <span class="badge badge-danger badge-counter">
                {{ count($ChatMessageData) }}
            </span>
        @endif
    </div>
</div>