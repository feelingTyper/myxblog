<header class="main-header bg-placeholder" style="padding: 10px 0;">
    <div class="container-fluid">
        <nav class="navbar navbar-dark navbar-expand-lg" style="margin-bottom: 0">
            <a href="{{ route('admin.index') }}" id="blog-navbar-brand" class="navbar-brand">Admin</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse"
                    data-target="#blog-navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="blog-navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('post.create') }}">写作</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.images') }}">图片</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.files') }}">文件</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">资源<span class="caret"></span></a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('admin.posts') }}">文章</a>
                            <a class="dropdown-item" href="{{ route('admin.pages') }}">页面</a>
                            <a class="dropdown-item" href="{{ route('admin.categories') }}">分类</a>
                            <a class="dropdown-item" href="{{ route('admin.tags') }}">标签</a>
                            <a class="dropdown-item" href="{{ route('admin.users') }}">用户</a>
                            <a class="dropdown-item" href="{{ route('admin.comments') }}">评论</a>
                            <a class="dropdown-item" href="{{ route('admin.ips') }}">IP</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.settings') }}">设置</a></li>
                </ul>
                <ul class="nav navbar-nav ml-auto justify-content-end">
                    @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }}
                                <span class="caret"></span></a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{ url('/blog') }}">回到站点</a>
                                <a class="dropdown-item" href="{{ route('user.show',auth()->user()->name) }}">个人中心</a>
                                <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        退出登录
                                    </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">登录</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">注册</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>