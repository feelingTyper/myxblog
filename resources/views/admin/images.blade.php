@extends('admin.layouts.app')
@section('title','图片')
@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <h6><i class="fa fa-file-image-o fa-fw"></i>图片({{ $image_count }})</h6>
            </div>
            <div class="card-body">
                <form class="form-inline justify-content-center" action="{{ route('upload.image') }}"
                      datatype="image"
                      enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="image" class="form-control-label mr-3">
                            <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                        </label>
                        <input id="image" class="form-control-file" accept="image/*" type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        上传
                    </button>
                </form>
            </div>
        </div>
        <div class="row" id="images" data-masonry='{ "itemSelector": ".col", "columnWidth":".col" }'>
            @forelse($images as $image)
                <div class="col col-md-3 col-sm-4 col-6 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ getImageViewUrl($image->url,null,250) }}">
                        <div class="card-body">
                            <p class="card-text">{{ $image->name }}</p>
                            <small class="text-secondary">
                                {{ formatBytes($image->size) }}
                                <i class="fa fa-clock-o fa-fw"></i>
                                {{ $image->created_at->format('Y-m-d') }}
                            </small>
                        </div>
                        <div class="card-footer">
                            <div class="widget-meta">
                                <button id="clipboard-btn" class="btn btn-clipboard btn-default"
                                        type="button"
                                        data-clipboard-text="{{ $image->url }}"
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Copied">
                                    <i class="fa fa-copy fa-fw"></i>
                                </button>
                                <a class="btn btn-primary"
                                   href="{{ $image->url }}"
                                   target="_blank">
                                    <i class="fa fa-eye fa-fw"></i>
                                </a>
                                <button class="btn btn-danger swal-dialog-target"
                                        data-dialog-msg="确定删除{{ $image->name }}？"
                                        data-url="{{ route('delete.file').'?key='.$image->key.'&type=image' }}"
                                        data-key="{{ $image->key }}">
                                    <i class="fa fa-trash-o fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h4 class="text-secondary mt-3">没有图片</h4>
            @endforelse
        </div>
        @if($images->lastPage() > 1)
            <div class="row">
                <div class="col-md-12">
                    {{ $images->links() }}
                </div>
            </div>
        @endif
    </div>

@endsection
@section('script')
    <script src="//cdn.bootcss.com/clipboard.js/1.5.12/clipboard.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="//cdn.bootcss.com/masonry/4.2.0/masonry.pkgd.min.js"></script>
    <script>
        new Clipboard('.btn-clipboard');
        $('.btn-clipboard').tooltip({
            trigger: 'click',
        });
        $('#images').imagesLoaded().progress(function () {
            $('#images').masonry();
        });
    </script>
@endsection