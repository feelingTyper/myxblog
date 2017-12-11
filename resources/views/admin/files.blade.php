@extends('admin.layouts.app')
@section('title','文件')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-file fa-fw"></i>文件
            </div>
            <div class="card-body">
                <div>
                    <form class="form-inline mb-3" action="{{ route('upload.file') }}"
                          enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="js">
                        <div class="form-group w-50">
                            <label class="form-control-label mr-3">
                                Js
                            </label>
                            <input class="form-control-file" type="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            上传
                        </button>
                    </form>

                    <form class="form-inline mb-3" action="{{ route('upload.file') }}"
                          enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="css">
                        <div class="form-group w-50">
                            <label class="form-control-label mr-3">
                                Css
                            </label>
                            <input class="form-control-file" type="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            上传
                        </button>
                    </form>
                    <form class="form-inline mb-3" action="{{ route('upload.file') }}"
                          enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="font">
                        <div class="form-group w-50">
                            <label class="form-control-label mr-3">
                                Font
                            </label>
                            <input class="form-control-file" type="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">上传</button>
                    </form>

                    <form class="form-inline" action="{{ route('upload.file') }}"
                          enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="form-group w-50">
                            <label class="form-control-label mr-3" for="file">
                                其他
                            </label>
                            <input class="form-control-file" type="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            上传
                        </button>
                    </form>
                </div>

                <div class="col-sm-10 col-sm-offset-1 mt-3">
                    <table class="table table-hover table-striped table-bordered table-responsive">
                        <tbody>
                        @forelse($files as $file)
                            <tr>
                                <td>{{ $file->type }}</td>
                                <td>{{ $file->name }}</td>
                                <td>
                                    <button id="clipboard-btn" class="btn btn-default"
                                            type="button"
                                            data-clipboard-text="{{ $file->url }}"
                                            data-toggle="tooltip"
                                            data-placement="left"
                                            title="Copied">
                                        <i class="fa fa-copy fa-fw"></i>
                                    </button>
                                    <a class="btn btn-info"
                                       href="{{ $file->url }}"
                                       data-method="delete">
                                        <i class="fa fa-cloud-download fa-fw"></i>
                                    </a>
                                    <button class="btn btn-danger swal-dialog-target"
                                            data-dialog-msg="确定删除{{ $file->key }}？"
                                            data-url="{{ route('delete.file').'?key='.$file->key."&type=".$file->type }}">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="//cdn.bootcss.com/clipboard.js/1.5.12/clipboard.min.js"></script>
    <script>
        new Clipboard('.btn');
        $('.btn').tooltip({
            trigger: 'click',
        });
    </script>
@endsection
