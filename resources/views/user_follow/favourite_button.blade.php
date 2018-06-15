
    @if (Auth::user()->is_favoring($micropost->id))
    
    
        {!! Form::open(['route' => ['user.unfavo', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavourite', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
    
        {!! Form::open(['route' => ['user.favo', $micropost->id]]) !!}
            {!! Form::submit('Favourite', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
