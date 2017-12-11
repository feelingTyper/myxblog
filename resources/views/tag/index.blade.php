@extends('layouts.app')
@section('title','标签')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">博客</a></li>
                    <li class="breadcrumb-item active">标签</li>
                </ol>
                @include('widget.tags')
            </div>
        </div>
    </div>
@endsection
