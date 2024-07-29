@extends('master')
@section('content')
<style>
    .container-fluid{
        margin-top: 10px;
    }

</style>
<div class="container-fluid">


  <div class="row align-items-center mb-3">
    <div class="col-md-6">
      <form action="{{ route('employees.search') }}" method="GET" class="form-inline">
        <input type="text" name="search" required class="form-control mr-sm-2" placeholder="Rechercher" />
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Rechercher</button>
      </form>
    </div>
    <div class="col-md-6 text-md-right">
      <a href="{{ route('employees.create') }}" class="btn btn-primary">Nouvel Employer</a>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-bordered text-center">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Département</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Poste</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($employees as $employee)
          <tr>
            <td>{{ $employee->id }}</td>
            <td>{{$employee->department->nom}}</td>
            <td>{{ $employee->nom }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->position }}</td>
            <td>
              <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Modifier</a>
              <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-center mt-3">
    {{ $employees->links() }}
  </div>
</div>
@endsection
