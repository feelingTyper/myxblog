@extends('admin.layouts.app')
@section('title','标签')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-tags fa-fw"></i>标签
                        <a class="meta-item" data-toggle="modal" data-target="#add-tag-modal">
                            <i class="fa fa-plus-square"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>名称</th>
                                <th>文章</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->posts_count }}</td>
                                    <td>
                                        <button type="submit"
                                                class="btn btn-danger swal-dialog-target"
                                                data-dialog-msg="确定删除{{ $tag->name }}？"
                                                data-url="{{ route('tag.destroy',$tag->id) }}"
                                                title="删除">
                                            <i class="fa fa-trash-o fa-fw"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.modals.add-tag-modal')
@endsection
