@extends('layouts.app')
@section('title','博客')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="card card-user" style="overflow: hidden">
                    <?php
                    if ($user->profile_image)
                        $style = "background: url($user->profile_image) no-repeat center center;background-size: cover";
                    else
                        $style = '';
                    ?>
                    <div class="card-user-header bg-placeholder" style="{{ $style }}">
                        <h3 class="card-user-username">{{ $user->name }}</h3>
                        <h5 class="card-user-desc">{{ $user->description or 'No description'}}</h5>
                    </div>
                    <div class="card-user-image" id="upload-avatar">
                        <img style="background-color: #607D8B" class="rounded-circle" src="{{ $user->avatar  }}" alt="User Avatar">
                    </div>
                    <div class="card-body mt-3">
                        @can('manager',$user)
                            @include('user.show_owner',$user)
                        @else
                            @include('user.show_visiter',$user)
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
