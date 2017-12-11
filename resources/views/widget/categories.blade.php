<div class="card mb-3">
    <div class="card-header"><i class="fa fa-folder fa-fw"></i>分类</div>
    <div class="card-body">
        <div class="list-group hot-posts">
            @forelse($categories as $category)
                @if(str_contains(urldecode(request()->getPathInfo()),'category/'.$category->name))
                    <li title="{{ $category->name }}" href="{{ route('category.show',$category->name) }}"
                        class="list-group-item active">
                        {{ $category->name }}
                        <span class="badge badge-pill">{{ $category->posts_count }}</span>
                    </li>
                @else
                    <a title="{{ $category->name }}" href="{{ route('category.show',$category->name) }}"
                       class="list-group-item list-group-item-action">
                        {{ $category->name }}
                        <span class="badge badge-pill">{{ $category->posts_count }}</span>
                    </a>
                @endif
            @empty
                <p class="meta-item center-block">No categories.</p>
            @endforelse
        </div>
    </div>
</div>