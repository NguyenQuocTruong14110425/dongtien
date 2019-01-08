<script src="{{URL::asset('public/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{URL::asset('public/js/app.admin.js')}}"></script>
<script src="{{URL::asset('public/js/datatable.js')}}"></script>
<script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>

<script  type="text/javascript">
    if($('#contents').length > 0)
    {
        CKEDITOR.replace( 'contents', {
            filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
    }
</script>
