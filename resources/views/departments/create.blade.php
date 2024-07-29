@extends('master')

@section('title', "Création d'un Departement")

@section('content')
<style>
    h1{
        text-align: center;
    }
</style>
   <h1>Création d'un Departement</h1>
   <form action="{{ route('departments.store') }}" method="POST" class="needs-validation" novalidate>
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
                <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Entrer nom du departement" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </div>
            </div>
   </form>
@endsection
