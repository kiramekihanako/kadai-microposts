
    @if (Auth::user()->is_favo($micropost->id))
        {!! Form::open(['route' => ['user.unfavoru', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavoru', ['class' => "btn btn-danger btn-xs"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favoru', $micropost->id]]) !!}
            {!! Form::submit('favoru', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
    @endif