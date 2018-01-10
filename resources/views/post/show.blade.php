@extends('layouts.app')
@section('description',$post->description)
@section('keywords',$post->category->name)
@section('title',$post->title)
@section('css')
    <link rel="stylesheet" href={{asset('editor.md/css/editormd.preview.min.css')}}>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-12 phone-no-padding">
                <div class="post-detail">
                    <div class="center-block">
                        <div class="post-detail-title">{{ $post->title }}</div>
                        <div class="post-meta">
                            <span class="post-category">
                           <i class="fa fa-folder-o fa-fw"></i>
                           <a href="{{ route('category.show',$post->category->name) }}">
                           {{ $post->category->name }}
                           </a>
                           </span>
                            <span class="post-comments-count">
                           &nbsp;|&nbsp;
                           <i class="fa fa-comments-o fa-fw" aria-hidden="true"></i>
                           <span>{{ $post->comments_count }}</span>
                           </span>
                            <span>
                           &nbsp;|&nbsp;
                           <i class="fa fa-eye"></i>
                           <span>{{ $post->view_count }}</span>
                           </span>
                            @can('update',$post)
                                <span>
                                    &nbsp;|&nbsp;
                                    <a href="{{ route('post.edit',$post->id) }}">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </a>
                                </span>
                                <span>
                                    &nbsp;|&nbsp;
                                    <a class="swal-dialog-target"
                                       data-url="{{ route('post.destroy',$post->id) }}"
                                       data-dialog-msg="Delete {{ $post->title }} ?">
                                    <i class="fa fa-trash-o fa-fw"></i>
                                    </a>
                                </span>
                            @endcan
                        </div>
                    </div>
                    <div id="post-detail-content" class="post-detail-content">
                        <textarea style="display: none;">{{ $post->content }}</textarea>
                    </div>
                    <div style="margin-bottom: 20px">
                        <p><strong>-- END</strong></p>
                        @include('widget.pay')
                    </div>

                    <div class="post-info-panel">
                        <p class="info">
                            <label class="info-title">版权声明:</label><i class="fa fa-fw fa-creative-commons"></i>自由转载-非商用-非衍生-保持署名（<a
                                    href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh">创意共享3.0许可证</a>）
                        </p>
                        <p class="info">
                            <label class="info-title">创建日期:</label>{{ $post->created_at->format('Y年m月d日') }}
                        </p>
                        @if(isset($post->published_at) && $post->published_at)
                            <p class="info">
                                <label class="info-title">修改日期:</label>{{ $post->published_at->format('Y年m月d日') }}
                            </p>
                        @endif
                        <p class="info">
                            <label class="info-title">文章标签:</label>
                            @foreach($post->tags as $tag)
                                <a class="tag" href="{{ route('tag.show',$tag->name) }}">{{ $tag->name }}</a>
                            @endforeach
                        </p>
                    </div>
                </div>
                @if(isset($recommendedPosts))
                    @include('widget.recommended_posts',['recommendedPosts'=>$recommendedPosts])
                @endif
                @if(!(isset($preview) && $preview) && $post->isShownComment())
                    @include('widget.comment',[
                            'comment_key'=>$post->slug,
                            'comment_title'=>$post->title,
                            'comment_url'=>route('post.show',$post->slug),
                            'commentable'=>$post,
                            'comments'=>isset($comments) ? $comments:[],
                            'redirect'=>request()->fullUrl(),
                             'commentable_type'=>'App\Post'])
                @endif
            </div>
        </div>
    </div>
    <div id="sidebar">
      <h1><b>[ 文章目录 ]</b></h1>
      <div class="markdown-body editormd-preview-container" id="custom-toc-container"></div>
    </div>
    

@endsection
@section('script')
<script src={{asset('editor.md/lib/marked.min.js')}}></script>
<script src={{asset('editor.md/lib/prettify.min.js')}}></script>
<script src={{asset('editor.md/lib/raphael.min.js')}}></script>
<script src={{asset('editor.md/lib/underscore.min.js')}}></script>
<script src={{asset('editor.md/lib/sequence-diagram.min.js')}}></script>
<script src={{asset('editor.md/lib/flowchart.min.js')}}></script>
<script src={{asset('editor.md/lib/jquery.flowchart.min.js')}}></script>
<script src={{asset('editor.md/editormd.min.js')}}></script>

<script>
    testEditormdView = editormd.markdownToHTML('post-detail-content', {
        htmlDecode      : "style,script,iframe",
        // tocm            : true,
        tocContainer    : "#custom-toc-container",
        theme : "dark",
        codeFold : true,
        previewTheme : "dark",
        //gfm             : false,
        // tocDropdown     : true,
        // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
        emoji           : true,
        taskList        : true,
        tex             : true,  // 默认不解析
        flowChart       : true,  // 默认不解析
        sequenceDiagram : true  // 默认不解析
    });

    function showTableOfContent(ele, child) {
        var ele = $(ele), child = $(child);
        var offset = $('.container').offset().left;
        console.log('ofset', offset);
        if ($('.markdown-toc-list').html()) {
            ele.css({display: 'block'});
        }
    }

    showTableOfContent('#sidebar', '#custom-toc-container');

    $(document).scroll(function() {
        if ($(document).scrollTop() > 157) {
            $('#sidebar').css({position:'fixed', top: 0});
        } else {
            $('#sidebar').css({position:'absolute', top: '157px'});
        }
    });


</script>
@endsection