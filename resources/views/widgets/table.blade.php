<table class="table {{ $class }}">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($fields as $field)
			<tr>
				<td>{{$field[]}}</td>
				<td>john@gmail.com</td>
				<td>London, UK</td>
			</tr>
		@endforeach

		<tr>
			<td>Andy</td>
			<td>andygmail.com</td>
			<td>Merseyside, UK</td>
		</tr>
		<tr>
			<td>Frank</td>
			<td>frank@gmail.com</td>
			<td>Southampton, UK</td>
		</tr>
	</tbody>
</table>