<tr>
        <td>{{ $entry->id }}</td>
        <td>{{ $entry->field }}</td>
        <td>{{ $entry->value }}</td>
        <td>{{ $entry->admin_id }}</td>
        <td>{{ $entry->created_at->toFormattedDateString() }}</td>
        <td>
                @if(Auth::check())
                        <a class="btn btn-wd btn-danger" href="/whitelist/{{ $entry->id }}/delete">Delete Whitelist</a>
                @endif
        </td>
</tr>