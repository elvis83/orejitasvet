<form action="{{ $route }}" method="POST">
    
    {{ csrf_field() }}

    @if(!isset($appointment))

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">people</i>
                <select id="mascota" name="mascota">
                    <option disabled="" selected="">-- Selecciona una mascota --</option>
                    @foreach($pets as $pet)
                        @if($pet->user_id==$user['id'])
                            <option value="{{ $pet->id }}">{{ $pet->mas_nombre }}</option>
                        @else
                            
                        @endif
                    @endforeach
                </select>
                <label>Selecciona una mascota</label>
            </div>
        </div>

        @if(Auth::user()->has_role(config('app.doctor_role')))
            <input type="hidden" name="doctor" value="{{ Auth::user()->id }}">
        @else

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">people</i>
                    <select id="speciality" name="speciality">
                        <option disabled="" selected="">-- Selecciona una especialidad --</option>
                        @foreach($specialities as $speciality)
                            <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                        @endforeach
                    </select>
                    <label>Selecciona la especialidad</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">people</i>
                    <select id="doctor" name="doctor">
                        <option disabled="" selected="">-- Primero selecciona una especialidad --</option>
                    </select>
                    <label>Selecciona un médico</label>
                </div>
            </div>

        @endif

    @else

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">hourglass_full</i>
                <select id="status" name="status">
                    <option value="Pendiente" @if($appointment->status == 'Pendiente') selected @endif>Pendiente</option>
                    <option value="Realizado" @if($appointment->status == 'Realizado') selected @endif>Realizado</option>
                    <option value="Cancelado" @if($appointment->status == 'Cancelado') selected @endif>Cancelado</option>
                </select>
                <label>Selecciona el estatus de la cita</label>
            </div>
        </div>

    @endif
    
    <div class="row">
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">today</i>
            <input id="datepicker" type="text" name="date" class="datepicker" placeholder="Selecciona una fecha" @if(isset($appointment)) data-value="{{ $appointment->date->format('Y-m-d') }}"@endif>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">access_time</i>
            <input id="timepicker" type="text" name="time" class="timepicker" placeholder="Selecciona un horario" @if(isset($appointment)) data-value="{{ $appointment->date->format('H:i') }}"@endif>
        </div>
    </div>

    <input type="hidden" name="user_id" value="{{ encrypt($user->id) }}">

    <div class="row">
        <button class="btn waves-effect waves-light" type="submit">AGENDAR<i class="material-icons right">send</i></button>
    </div>
</form>
