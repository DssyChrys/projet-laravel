@extends('master')

@section('title', "Modification d'un Étudiant")

@section('content')
    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $department->id }}">

        @if(session('departments.index'))
            <div class="alert alert-success">
                {{ session('departments.index') }}
            </div>
        @endif

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nouveau Nom de departement</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nom complet" required value="{{ $department->nom }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enregistrer modification</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
