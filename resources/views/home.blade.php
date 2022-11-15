@extends('layouts.app')

@section('content')
<div id="plist" class="people-list">
    {{-- <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Search...">
    </div> --}}
    
    <ul class="list-unstyled chat-list mt-2 mb-0">
        @foreach($users as $user)
        <li class="clearfix" role="button">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
            <div class="about">
                <a class="text-decoration-none" href="{{ route('messages', $user->id) }}">
                    <div class="name">{{ $user->name }}</div>
                    @if(Cache::has('is_online' . $user->id))
                    <div class="status"> <i class="fa fa-circle online"></i> Online </div>
                    @else
                    <div class="status"> <i class="fa fa-circle offine"></i>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</div>
                    @endif  
                </a>                                         
            </div>
        </li>
       
        @endforeach
    </ul>
</div>
@if($title == "messages")
<div class="chat">
    <div class="chat-header clearfix">
        <div class="row">
            <div class="col-lg-6">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                </a>
                {{-- @foreach ($messages as $message )
                    @foreach ($users as $user) --}}
                <div class="chat-about">
                    
                    {{-- @if($user->id == $message->to) --}}
                    <h6 class="m-b-0">{{ $rcv }}</h6>
                    {{-- @endif --}}
                    {{-- <small>Last seen: 2 hours ago</small> --}}
                    @if(Cache::has('is_online' . $user->id))
                    <small><i class="fa fa-circle online"></i> Online</small>  
                    @else
                    <small>Last seen: {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</small>
                    @endif  
                    
                </div>
                {{-- @endforeach
                @endforeach --}}
            </div>
           
            
            {{-- @endif --}}
            
            {{-- <div class="col-lg-6 hidden-sm text-right">
                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
            </div> --}}
        </div>
    </div>
    
    <div class="chat-history">
        <ul class="m-b-0">
            @foreach ($messages as $message )
            @foreach ($users as $user)
            <li class="clearfix">
              
                   {{-- <Messages></Messages> --}}
                 
                            @if($user->id == $message->to)
                                <div class="message-data text-right">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                    <span class="message-data-time">{{ $message->message }}</span>
                                </div>
                            @endif
                            
                            @if($user->id == $message->from)
                                 <div class="message other-message float-right"> 
                                     {{ $message->message }}
                                 </div>
                            @endif
               
              
            </li>
            @endforeach
            @endforeach 
        </ul>
    </div>
    <div class="chat-message clearfix">
        <div class="input-group mb-0">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-send"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter text here...">                                    
        </div>
    </div>
</div>
@endif

@endsection
