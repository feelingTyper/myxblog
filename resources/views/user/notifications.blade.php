@extends('layouts.app')
@section('title','博客')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-comments fa-fw"></i>
                        通知
                        @if($notifications->isNotEmpty())
                            <a class="btn btn-info" style="display: inline;margin-left: 20px"
                               href="{{ route('user.readNotification',"all") }}">
                                全部已读
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if($notifications->isEmpty())
                            <h4 class="text-secondary text-center">No Notifications</h4>
                        @else
                            <table class="table table-striped table-hover table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>用户</th>
                                    <th>Email</th>
                                    <th>类型</th>
                                    <th>内容</th>
                                    <th>IP</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notifications as $notification)
                                    @if($notification->data)
                                        <?php $notificationData = $notification->data?>
                                        <tr class="">
                                            <td>
                                                @if($notificationData['user_id'])
                                                    <a href="{{ route('user.show',$notificationData['username']) }}">{{ $notificationData['username'] }}</a>
                                                @else
                                                    {{ $notificationData['username'] }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $notificationData['email'] }}">{{ $notificationData['email'] }}</a>
                                            </td>
                                            <td>
                                                @if("App\\Notifications\\ReceivedComment" == $notification->type)
                                                    评论
                                                @elseif("App\\Notifications\\MentionedInComment" == $notification->type)
                                                    提到了你
                                                @elseif("App\\Notifications\\BaseNotification" == $notification->type)
                                                    基本提醒
                                                @endif
                                            </td>
                                            <td data-toggle="tooltip" data-placement="top">{!! $notificationData['html_content'] !!}</td>
                                            <td>{{ $notificationData['ip_id']?$notificationData['ip_id']:'NONE' }}</td>
                                            <td>
                                                <a class="btn btn-info"
                                                   href="{{ route('user.readNotification',$notification->id) }}">
                                                    已读
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
