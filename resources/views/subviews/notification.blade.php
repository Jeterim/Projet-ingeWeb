<li>
    <a href="#" id="{{$notification->id}}">
        <span class="notif-time">{{$notification->created_at}}</span>
        <span class="notif-title">Action</span>
        <span class="notif-content">{{$notification->data}}</span>
        <span class="deletenotif glyphicon glyphicon-trash" data-id="{{$notification->id}}" aria-hidden="true"></span>
    </a>
</li>