<ul>
	<li>{{ link_to_route('user.profile','General', null, array('class' => ($submenu=='general')?'btn btn-info':'btn btn-default')) }}</li>
	<li>{{ link_to_route('user.profile.parties','Parties', null, array('class' => ($submenu=='parties')?'btn btn-info':'btn btn-default')) }}</li>
	<li>{{ link_to_route('user.profile.notifications','Notifications', null, array('class' => ($submenu=='notifications')?'btn btn-info':'btn btn-default')) }}</li>
	<li>{{ link_to_route('user.profile.security','Security', null, array('class' => ($submenu=='security')?'btn btn-info':'btn btn-default')) }}</li>
</ul>
