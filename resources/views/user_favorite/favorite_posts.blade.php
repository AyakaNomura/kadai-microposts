<ul class="media-list">
    @foreach($favorites as $favorite)
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($favorite->user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            {!! link_to_route('users.show', $favorite->user->name, ['id' => $favorite->user->id]) !!}<span class="text-muted"> posted at {{ $favorite->created_at }}</span>
            <p>{!! nl2br(e($favorite->content))  !!}</p>
        </div>
        <div>
            @if(Auth::user()->id == $favorite->user_id)
                {!! Form::open(['route' => ['microposts.destroy', $favorite->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                {!! Form::close() !!}
            @endif
            @include('user_favorite.favorite_button', ['micropost' => $favorite])
        </div>
    </li>
    @endforeach
</ul>
{!! $favorites->render() !!}