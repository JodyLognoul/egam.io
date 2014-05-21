<!-- Modal -->
<div class="modal-modify-user modal-ind modal fade" id="modal-event-cancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel this event?</p>
            </div>
            <div class="modal-footer">
                <p class="text-warning pull-left"><i class="glyphicon glyphicon-warning-sign"></i> All the members of the events will be notify!</p>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
                <a href="{{ URL::route('event.cancel', array('eid' => $event->id )) }}" class="btn btn-success btn-sm">Yes</a>
            </div>
        </div>
    </div>
</div><!-- /.modal -->