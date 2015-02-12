<h1>Users</h1>
@if($users)
<ul>
@foreach($users as $user)
<li>{{ $user->real_name }} - {{ $user->email }}</li>
@endforeach
</ul>
@else
Looks like we haven't added any users, yet!
@endif


{{ HTML::link('user2/create', 'Create a User', array('class' =>
'btn')) }}

<li>{{ $user->real_name }} - {{ $user->email }} - {{
HTML::link('user2/delete/'.$user->id, 'Delete') }}</li>