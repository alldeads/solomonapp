<tr>
	<td style="color: red">{{ $user->sponsor->full_name ?? "No Sponsor" }}</td>
	<td style="color: #fee21e;">{{ $user->full_name }}</td>
	<td><em>{{ $user->username }}</em></td>
	<td>{{ $user->used_points + $user->available_points }}</td>
	<td style="color: red;">{{ $user->status }}</td>
	<td>{{ $user->created_at->format('F j, Y') }}</td>
</tr>