<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Especialista</th>
            <th>Mascota</th>
			<th>Fecha</th>
			<th>Estado</th> {{-- Finalizado, Pagado, Pendiente, Cancelado --}}
            @if($update)
                <th>Acciones</th>
            @endif
		</tr>
	</thead>
	<tbody>
		<tr>
			@forelse($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->doctor()->name }}</td>
                    <td>{{ $appointment->pet['mas_nombre'] }}</td>
                    <td>{{ $appointment->date->format('d/m/Y H:i') }}</td>
                    <td>{{ $appointment->status }}</td>
                    @if($update)
                        <th><a href="{{ route('backoffice.client.appointments.edit', [$user, $appointment]) }}">Editar</a></th>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay citas registradas</td>
                </tr>
            @endforelse
		</tr>
	</tbody>
</table>