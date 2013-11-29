@extends('layouts/master')

@section('content')
<h1>Party Index</h1>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Party Name</th>
				<th>City</th>
				<th>Date</th>
				<th>Places</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($parties as $party)
			<tr>
				<td><a class="" href="{{ URL::to('party', array('id' => $party->id )) }}">{{ $party->name }}</a></td>                    
				<td>{{ $party->address->city }}</td>
				<td>{{ $party->party_date }}</td>
				<td>{{ $party->current_place }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscipit neque ac sapien luctus ultricies. Aenean vulputate posuere mollis. Curabitur vulputate lobortis libero quis volutpat. In in risus blandit, congue augue vitae, porta dolor. Proin nisi sapien, aliquet ac arcu vel, aliquam porttitor tellus. Cras scelerisque porttitor mauris, ac accumsan urna fringilla eu. Maecenas ac erat a neque cursus suscipit. Praesent eleifend nibh ut dapibus elementum.</p>
<p>Phasellus euismod egestas imperdiet. Vestibulum mollis elementum ligula et varius. Praesent consequat mollis quam, nec malesuada diam pretium non. Morbi in orci augue. Praesent eros urna, mollis ac vestibulum nec, pretium a risus. Quisque et commodo lorem. Morbi pharetra cursus risus in vulputate. Fusce sed ultrices libero. Maecenas imperdiet euismod neque feugiat cursus. Integer facilisis nulla ornare rutrum sagittis. Nunc non tristique nulla. Pellentesque sollicitudin ultricies magna, et euismod ligula convallis at.</p>
<p>Sed auctor sapien eros, nec gravida lectus lacinia sit amet. Donec ultrices blandit sem. Nullam vel tellus in lectus aliquam tempor. Suspendisse potenti. Donec vel congue odio. Etiam sed facilisis nibh. Vivamus feugiat eros elit, id sodales turpis elementum sit amet. Aliquam vel erat feugiat, consectetur nisl vitae, facilisis diam. Nullam sit amet orci eget nisi auctor condimentum. Nam blandit ante mi, sit amet condimentum sem mollis vitae.</p>
<p>Fusce porta massa at sem commodo, sed bibendum nunc rhoncus. Donec erat ipsum, congue ut enim sit amet, mollis consequat felis. Ut placerat, ipsum vel ultrices elementum, eros elit scelerisque lacus, ut varius nisi purus a lectus. Vivamus gravida bibendum placerat. Nullam sapien eros, eleifend non dignissim sed, porttitor vel nulla. Suspendisse condimentum sollicitudin sem, eget euismod lectus dictum viverra. Nullam cursus ornare augue, sed tincidunt tellus feugiat eget. Nulla quis bibendum nisl, suscipit porttitor libero. Nunc sed mattis risus. Integer tincidunt adipiscing pretium. Ut augue leo, venenatis in magna eu, fringilla luctus massa.</p>
<p>Nunc sem magna, adipiscing vitae leo non, viverra tempor tortor. Quisque imperdiet metus in ligula iaculis, fringilla vestibulum quam porta. Nunc id ipsum porta, tristique elit id, dictum metus. Integer sit amet sapien et tellus convallis vulputate. Donec fermentum fringilla sapien sed lacinia. Integer rhoncus ligula erat, sit amet tristique massa varius nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus varius sodales sem. Quisque eget ligula ac tortor posuere pretium. Fusce sed nunc ipsum. Aliquam placerat sit amet magna sed fringilla. Vivamus sit amet facilisis quam, quis tristique enim. Aliquam posuere augue nulla, et vulputate est tempor eu.</p>
<br>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscipit neque ac sapien luctus ultricies. Aenean vulputate posuere mollis. Curabitur vulputate lobortis libero quis volutpat. In in risus blandit, congue augue vitae, porta dolor. Proin nisi sapien, aliquet ac arcu vel, aliquam porttitor tellus. Cras scelerisque porttitor mauris, ac accumsan urna fringilla eu. Maecenas ac erat a neque cursus suscipit. Praesent eleifend nibh ut dapibus elementum.</p>
<p>Phasellus euismod egestas imperdiet. Vestibulum mollis elementum ligula et varius. Praesent consequat mollis quam, nec malesuada diam pretium non. Morbi in orci augue. Praesent eros urna, mollis ac vestibulum nec, pretium a risus. Quisque et commodo lorem. Morbi pharetra cursus risus in vulputate. Fusce sed ultrices libero. Maecenas imperdiet euismod neque feugiat cursus. Integer facilisis nulla ornare rutrum sagittis. Nunc non tristique nulla. Pellentesque sollicitudin ultricies magna, et euismod ligula convallis at.</p>
<p>Sed auctor sapien eros, nec gravida lectus lacinia sit amet. Donec ultrices blandit sem. Nullam vel tellus in lectus aliquam tempor. Suspendisse potenti. Donec vel congue odio. Etiam sed facilisis nibh. Vivamus feugiat eros elit, id sodales turpis elementum sit amet. Aliquam vel erat feugiat, consectetur nisl vitae, facilisis diam. Nullam sit amet orci eget nisi auctor condimentum. Nam blandit ante mi, sit amet condimentum sem mollis vitae.</p>
<p>Fusce porta massa at sem commodo, sed bibendum nunc rhoncus. Donec erat ipsum, congue ut enim sit amet, mollis consequat felis. Ut placerat, ipsum vel ultrices elementum, eros elit scelerisque lacus, ut varius nisi purus a lectus. Vivamus gravida bibendum placerat. Nullam sapien eros, eleifend non dignissim sed, porttitor vel nulla. Suspendisse condimentum sollicitudin sem, eget euismod lectus dictum viverra. Nullam cursus ornare augue, sed tincidunt tellus feugiat eget. Nulla quis bibendum nisl, suscipit porttitor libero. Nunc sed mattis risus. Integer tincidunt adipiscing pretium. Ut augue leo, venenatis in magna eu, fringilla luctus massa.</p>
<p>Nunc sem magna, adipiscing vitae leo non, viverra tempor tortor. Quisque imperdiet metus in ligula iaculis, fringilla vestibulum quam porta. Nunc id ipsum porta, tristique elit id, dictum metus. Integer sit amet sapien et tellus convallis vulputate. Donec fermentum fringilla sapien sed lacinia. Integer rhoncus ligula erat, sit amet tristique massa varius nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus varius sodales sem. Quisque eget ligula ac tortor posuere pretium. Fusce sed nunc ipsum. Aliquam placerat sit amet magna sed fringilla. Vivamus sit amet facilisis quam, quis tristique enim. Aliquam posuere augue nulla, et vulputate est tempor eu.</p>
<br>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscipit neque ac sapien luctus ultricies. Aenean vulputate posuere mollis. Curabitur vulputate lobortis libero quis volutpat. In in risus blandit, congue augue vitae, porta dolor. Proin nisi sapien, aliquet ac arcu vel, aliquam porttitor tellus. Cras scelerisque porttitor mauris, ac accumsan urna fringilla eu. Maecenas ac erat a neque cursus suscipit. Praesent eleifend nibh ut dapibus elementum.</p>
<p>Phasellus euismod egestas imperdiet. Vestibulum mollis elementum ligula et varius. Praesent consequat mollis quam, nec malesuada diam pretium non. Morbi in orci augue. Praesent eros urna, mollis ac vestibulum nec, pretium a risus. Quisque et commodo lorem. Morbi pharetra cursus risus in vulputate. Fusce sed ultrices libero. Maecenas imperdiet euismod neque feugiat cursus. Integer facilisis nulla ornare rutrum sagittis. Nunc non tristique nulla. Pellentesque sollicitudin ultricies magna, et euismod ligula convallis at.</p>
<p>Sed auctor sapien eros, nec gravida lectus lacinia sit amet. Donec ultrices blandit sem. Nullam vel tellus in lectus aliquam tempor. Suspendisse potenti. Donec vel congue odio. Etiam sed facilisis nibh. Vivamus feugiat eros elit, id sodales turpis elementum sit amet. Aliquam vel erat feugiat, consectetur nisl vitae, facilisis diam. Nullam sit amet orci eget nisi auctor condimentum. Nam blandit ante mi, sit amet condimentum sem mollis vitae.</p>
<p>Fusce porta massa at sem commodo, sed bibendum nunc rhoncus. Donec erat ipsum, congue ut enim sit amet, mollis consequat felis. Ut placerat, ipsum vel ultrices elementum, eros elit scelerisque lacus, ut varius nisi purus a lectus. Vivamus gravida bibendum placerat. Nullam sapien eros, eleifend non dignissim sed, porttitor vel nulla. Suspendisse condimentum sollicitudin sem, eget euismod lectus dictum viverra. Nullam cursus ornare augue, sed tincidunt tellus feugiat eget. Nulla quis bibendum nisl, suscipit porttitor libero. Nunc sed mattis risus. Integer tincidunt adipiscing pretium. Ut augue leo, venenatis in magna eu, fringilla luctus massa.</p>
<p>Nunc sem magna, adipiscing vitae leo non, viverra tempor tortor. Quisque imperdiet metus in ligula iaculis, fringilla vestibulum quam porta. Nunc id ipsum porta, tristique elit id, dictum metus. Integer sit amet sapien et tellus convallis vulputate. Donec fermentum fringilla sapien sed lacinia. Integer rhoncus ligula erat, sit amet tristique massa varius nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus varius sodales sem. Quisque eget ligula ac tortor posuere pretium. Fusce sed nunc ipsum. Aliquam placerat sit amet magna sed fringilla. Vivamus sit amet facilisis quam, quis tristique enim. Aliquam posuere augue nulla, et vulputate est tempor eu.</p>

@stop

