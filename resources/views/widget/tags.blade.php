<div class="card mb-3">
    <div class="card-header"><i class="fa fa-tags fa-fw"></i>标签</div>
    <ul class="card-body">
        <div class="tag-list">
            @forelse($tags as $tag)
                @if(str_contains(urldecode(request()->getPathInfo()),'tag/'.$tag->name))
                    <span class="tag tag-active" title="{{ $tag->name }}">
                        {{ $tag->name }}
                        <span class="badge badge-pill badge-active">{{ $tag->posts_count }}</span>
                    </span>
                @else
                    <a title="{{ $tag->name }}" href="{{ route('tag.show',$tag->name) }}" class="tag">
                        {{ $tag->name }}
                        <span class="badge badge-pill">{{ $tag->posts_count }}</span>
                    </a>
                @endif
            @empty <p class="meta-item center-block">No tags.</p>
            @endforelse
        </div>
    </ul>
</div>