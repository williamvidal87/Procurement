
@push('chat-table-scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
        window.livewire.on('openChatModal', () => {
            $('#chatModal').modal('show')
        });
        
        window.livewire.on('closeChatModal', () => {
            $('#chatModal').modal('hide')
        });
        
        
        var divsample = $(".listing-item");
        divsample.sort(function(a, b){ return $(b).data("listing-price")-$(a).data("listing-price")});
        
        $("#myUL").html(divsample);
        
        window.livewire.on('EmitTable', () => {
            var divsample = $(".listing-item");
            divsample.sort(function(a, b){ return $(b).data("listing-price")-$(a).data("listing-price")});
            
            $("#myUL").html(divsample);
        });
        
    })

</script>
@endpush