@extends('admin.layouts.app')
@section('css')
    <link href="//cdn.bootcss.com/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    {{-- <link href="//cdn.bootcss.com/simplemde/1.11.2/simplemde.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href={{asset('editor.md/css/editormd.min.css')}}>
@endsection
@section('content')
    <div class="container">
        <div id="upload-img-url" data-upload-img-url="{{ route('upload.image') }}" style="display: none"></div>
        <div class="row">
            <div class="col-md-12">
                <div id="data" class="card" data-id="{{ $post->id . '.by@' . request()->ip() }}">
                    <div class="card-header">
                        <i class="fa fa-pencil  fa-fw"></i>编辑文章
                    </div>
                    <div class="card-body edit-form">
                        <form role="form" class="form-horizontal" action="{{ route('post.update',$post->id) }}"
                              method="post">
                            @include('admin.post.form-content')
                            <input type="hidden" name="_method" value="put">
                            <button type="submit" id="subContent" class="btn btn-primary">
                                修改
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//cdn.bootcss.com/select2/4.0.3/js/select2.min.js"></script>
    <script src={{asset('editor.md/editormd.min.js')}}></script>
    <script>
        $("#post-tags").select2({
            tags: true
        });
        $(document).ready(function () {
            var testEditor = editormd("post-content-textarea", {
                width: "100%",
                height: 740,
                path : '/editor.md/lib/',
                theme : "dark",
                previewTheme : "dark",
                editorTheme : "pastel-on-dark",
                codeFold : true,
                markdown : $("#content").val(),
                //syncScrolling : false,
                saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
                searchReplace : true,
                watch: true,                // 关闭实时预览
                htmlDecode : "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启    
                toolbar: true,             //关闭工具栏
                //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
                emoji: true,
                taskList: true,
                tocm: true,         // Using [TOCM]
                tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart : true,             // 开启流程图支持，默认关闭
                sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
                //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
                //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
                //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
                //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
                //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
                imageUpload : true,
                imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL : $("#upload-img-url").data('upload-img-url'),
                onload : function() {
                    console.log('onload', this);
                    //this.fullscreen();
                    //this.unwatch();
                    //this.watch().fullscreen();

                    //this.setMarkdown("#PHP");
                    //this.width("100%");
                    //this.height(480);
                    //this.resize("100%", 640);
                }
            });
            $('#subContent').on('click', function() {
                $('#content').val(testEditor.getMarkdown());
                $('#html_content').val(testEditor.getPreviewedHTML());
                return true;
            });
        });
    </script>
@endsection