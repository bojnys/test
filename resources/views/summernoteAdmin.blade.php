<script src="/summernote/lang/summernote-nl-NL.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $('#title').keyup(function(){
            $.ajax({
                url: '/generateSlug',
                type: "post",
                data: {'title':$('input[name=title]').val()},
                success: function(data){
                    $("#slug").val(data);
                }
            });
        });
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                ['edit',['undo','redo']],
                ['headline', ['style']],
                ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
                ['fontface', ['fontname']],
                ['textsize', ['fontsize']],
                ['fontclr', ['color']],
                ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link','picture','video','hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }
        });

        function sendFile(file, editor, welEditable) {
            var  data = new FormData();
            data.append("file", file);
            var url = '/saveimage';
            $.ajax({
                data: data,
                type: "POST",
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $('#summernote').summernote('editor.insertImage', url);
                }
            });
        }
    });
    var postForm = function() {
        var content = $('textarea[name="content"]').html($('#summernote').code());
    }
</script>