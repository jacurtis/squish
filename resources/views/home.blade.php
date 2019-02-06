@extends('layouts.app')

@section('content')
<main class="main m-t-25">
    <div class="container m-t-10">
        <div class="sq-row">
            <aside id="sq-main-sidebar" class="sq-col-2">
                <ul class="sq-sidebar-nav">
                    <li class="sq-nav-item">
                        <a href="" class="sq-sidebar-nav-link active">
                            <i class="zi-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sq-nav-item">
                        <a href="" class="sq-sidebar-nav-link">
                            <i class="zi-link"></i>
                            Squished Links
                        </a>
                    </li>
                    <li class="sq-nav-item">
                        <a href="" class="sq-sidebar-nav-link">
                            <i class="zi-paste"></i>
                            Reports
                        </a>
                    </li>
                    <li class="sq-nav-item">
                        <a href="" class="sq-sidebar-nav-link">
                            <i class="zi-servers"></i>
                            Domains
                        </a>
                    </li>
                    <li class="sq-nav-item">
                        <a href="" class="sq-sidebar-nav-link">
                            <i class="zi-cog"></i>
                            Settings
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="sq-col-10">
                <div class="sq-card">
                    <div class="sq-card-header">Dashboard</div>
    
                    <div class="sq-card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
