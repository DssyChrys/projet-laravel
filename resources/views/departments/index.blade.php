@extends('master')

@section('content')
<style>
    .container-fluid{
        margin-top: 10px;
    }

</style>
<div class="container-fluid">
<div class="row align-items-center mb-3">
  <div class="col-md-12 d-flex justify-content-end">
    <a href="{{ route('departments.create') }}" class="btn btn-primary">Nouveau Département</a>
  </div>
</div>


  <div class="table-responsive">
    <table class="table table-striped table-bordered text-center">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Département</th>
          <th>Nombre Employer</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($departments as $department)
          <tr>
            <td>{{ $department->id }}</td>
            <td>{{ $department->nom}}</td>
            <td>{{ $department->employees_count }} employés</td>
            <td>
            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-warning">Modifier</a>
              <form action="{{ route('departments.destruction', $department->id) }}" method="POST" class="d-inline">
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
</div>
@endsection
