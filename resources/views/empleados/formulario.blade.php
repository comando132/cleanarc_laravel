@extends('layouts.app')
@section('content')
<br class="clearfix" />
<h1>{{ (!empty($employee['employeeNumber'])) ? 'Editar empleado' : 'Agregar empleado' }}</h2>
<form id="frm_employee" method="POST" action="{{ (!empty($employee['employeeNumber'])) ? route('edit-empleado') : route('add-empleado') }}">
    @csrf
    @if(!empty($employee['employeeNumber'])) 
    <input type="hidden" name="employeeNumber" value="{{$employee['employeeNumber'] ?? ''}}">
    @endif
    <div class="form-row mt-3">
        <div class="form-group col-md-5">
            <label for="firstName">Nombre(s)</label>
            <input type="text" class="form-control {{ ($errors->has('firstName')) ? 'is-invalid' : '' }}" name="firstName" id="firstName"
            value="{{ old('firstName', $employee['firstName'] ?? '')}}" placeholder="Nombre(s)">
            <div class="invalid-feedback">{{ $errors->first('firstName') }}</div>
        </div>
        <div class="form-group col-md-5">
            <label for="lastName">Apellido(s)</label>
            <input type="text" class="form-control {{ ($errors->has('lastName')) ? 'is-invalid' : '' }}" name="lastName" id="lastName"
            value="{{ old('lastName', $employee['lastName'] ?? '')}}" placeholder="Apellido(s)">
            <div class="invalid-feedback">{{ $errors->first('lastName') }}</div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="email">Correo</label>
            <input type="email" class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" name="email" id="email"
            value="{{ old('email', $employee['email'] ?? '')}}" placeholder="correo@classicmodelcars.com">
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        </div>
        <div class="form-group col-md-5">
        <label for="extension">Extension</label>
            <input type="text" class="form-control {{ ($errors->has('extension')) ? 'is-invalid' : '' }}" name="extension" id="extension"
            value="{{ old('extension', $employee['extension'] ?? '')}}" placeholder="x0000" maxlength="10">
            <div class="invalid-feedback">{{ $errors->first('extension') }}</div>
        </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-5">
            <label for="jobTitle">Cargo</label>
            <input type="text" class="form-control {{ ($errors->has('jobTitle')) ? 'is-invalid' : '' }}" name="jobTitle" id="jobTitle"
            value="{{ old('jobTitle', $employee['jobTitle'] ?? '')}}" placeholder="Cargo">
            <div class="invalid-feedback">{{ $errors->first('jobTitle') }}</div>
        </div>
    <div class="form-group col-md-5">
            <label for="reportsTo">Jefe </label>
            <select name="reportsTo" id="reportsTo" class="form-control {{ ($errors->has('reportsTo')) ? 'is-invalid' : '' }}">
                <option value="">-- N/A --</option>
                @foreach ($chiefs as $jefe)
                    <option value="{{ $jefe['employeeNumber'] }}" {{ (old('reportsTo', $employee['reportsTo'] ?? '') == $jefe['employeeNumber']) ? 'selected' : '' }}> {{ "{$jefe['firstName']} {$jefe['lastName']} - {$jefe['jobTitle']}" }} </option>
                @endforeach
            </select>
            <div class="invalid-feedback">{{ $errors->first('reportsTo') }}</div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="officeCode">Oficina</label>
            <select name="officeCode" id="officeCode" class="form-control {{ ($errors->has('officeCode')) ? 'is-invalid' : '' }}">
                <option value="">-- Selecciona una opci&oacute;n --</option>
                @foreach ($offices as $office)
                    <option value="{{ $office['officeCode'] }}" {{ (old('officeCode', $employee['officeCode'] ?? '') == $office['officeCode']) ? 'selected' : ''}}>{{ "{$office['country']} - {$office['city']}" }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">{{ $errors->first('officeCode') }}</div>
        </div>
    </div>
    <button name="agregar" value="agregar" type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
