@extends('master')

@section('title', "Modification d'un Étudiant")

@section('content')
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $employee->id }}">

        @if(session('employees.index'))
            <div class="alert alert-success">
                {{ session('employees.index') }}
            </div>
        @endif

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="department">Département</label>
                        <select name="department" id="department" class="form-control" required>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ $department->id == old('department') ? 'selected' : '' }}>
                                    {{ $department->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Nom Complet</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nom complet" required value="{{ $employee->nom }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required value="{{ $employee->email }}">
                    </div>

                    <div class="form-group">
                        <label for="position">Poste</label>
                        <input type="text" name="position" id="position" class="form-control" placeholder="Poste" required value="{{ $employee->position }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enregistrer modification</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
