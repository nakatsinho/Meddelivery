<a href="https://wa.me/258845132931/" class="float-whatsapp">
    <i class="fa fa-whatsapp my-float"></i>
</a>
@if (!Auth::guest())
<a href="{{url('chat')}}" class="float-chat">
    <i class="fa fa-edit my-float"></i>
</a>
@endif