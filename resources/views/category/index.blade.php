@extends('layouts.app')
@section('title','分类')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">博客</a></li>
                    <li class="breadcrumb-item active">分类</li>
                </ol>
                @include('widget.categories')
            </div>
        </div>
    </div>
@endsection
