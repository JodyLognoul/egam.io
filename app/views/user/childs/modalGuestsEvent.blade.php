@foreach($event->guests() as $guest)
<!-- Modal -->
<div class="modal-show-user modal fade" id="myModal_{{$guest->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel">{{ $guest->name.' '.$guest->surname }}</h4>
            </div>
            <div class="modal-body">
                {{ HTML::image('images/user.png', $guest->image, array('class' => 'img-responsive img-thumbnail center-block')) }}
                <p><span class="glyphicon glyphicon-user"></span> {{ $guest->username }}</p>
                <p><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:{{ $guest->email }}">{{ $guest->email }}</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{ link_to_route('user.show','More infos',array('user' => $guest->id),array('class' => 'btn btn-primary')) }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach		