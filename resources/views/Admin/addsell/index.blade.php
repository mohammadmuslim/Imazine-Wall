@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')

@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
       // Add a new repeating section
        $('.addFight').click(function(){
            var lastRepeatingGroup = $('.repeatingSection').last();
            lastRepeatingGroup.clone().insertAfter(lastRepeatingGroup);
            return false;
        });
        // Delete a repeating section
        $('.deleteFight').click(function(){
            $(this).parent('div').remove();
            return false;
        });
    });
</script>
@endpush