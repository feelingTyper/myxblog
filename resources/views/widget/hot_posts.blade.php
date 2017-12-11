<div class="card mb-3">
    <div class="card-header"><i class="fa fa-fire fa-fw"></i>热门文章</div>
    <div class="card-body hot-posts">
        <ul class="list-group">
            @foreach($hotPosts as $post)
                <a class="list-group-item list-group-item-action" title="{{ $post->title }}" href="{{ route('post.show',$post->slug) }}">
                    <span class="badge badge-pill">{{ $post->view_count.'+'.$post->comments_count }}</span>
                    {{ str_limit($post->title,32) }}
                    <span class="clearfix"></span>
                </a>
            @endforeach
        </ul>
    </div>
</div>