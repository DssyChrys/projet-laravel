@extends('master')

@section('title', "Création d'un Étudiant")

@section('content')
<style>
    h1{
        text-align: center;
    }
</style>
   <h1>Création d'un Employé</h1>
   <form action="{{ route('employees.store') }}" method="POST" class="needs-validation" novalidate>
       @csrf
       @if($errors->any())
           <div class="alert alert-danger">
               <ul>
                   @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
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
                       <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required value="{{ old('name') }}">
                   </div>

                   <div class="form-group">
                       <label for="email">Email</label>
                       <input type="email" name="email" id="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                   </div>

                   <div class="form-group">
                       <label for="position">Poste</label>
                       <input type="text" name="position" id="position" class="form-control" placeholder="Poste" required value="{{ old('position') }}">
                   </div>

                   <div class="form-group">
                       <button type="submit" class="btn btn-primary">Soumettre</button>
                   </div>
               </div>
           </div>
       </div>
   </form>
@endsection
