<tr>
        <td>{{ $record->id }}</td>
        <td>{{ $record->user_added }}</td>
        <td>{{ $record->gamertag }}</td>
        <td>{{ $record->xuid }}</td>
        <td>{{ $record->ip }}:{{ $record->port }}</td>
        <td>{{ $record->created_at->toFormattedDateString() }}</td>
        <td>
        	<a class="btn btn-wd" href="{{ request()->path() }}?filter=user_added&value={{ $record->user_added }}">More records by {{ $record->user_added }}</a>
                @if(Auth::check())
                        <a class="btn btn-wd btn-danger" href="/records/{{ $record->id }}/delete">Delete Entry</a>
                @endif
        </td>
</tr>