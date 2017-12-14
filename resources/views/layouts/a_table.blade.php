<tr>
        <td>{{ $admin->id }}</td>
        <td>{{ $admin->username }}</td>
        <td>{{ $admin->created_at->toFormattedDateString() }}</td>
        <td>
                @if(Auth::check())
                        <a class="btn btn-wd btn-danger" href="/admins/{{ $admin->id }}/delete">Delete Admin</a>
                @endif
        </td>
</tr>