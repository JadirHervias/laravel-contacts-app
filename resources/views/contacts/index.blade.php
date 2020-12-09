@extends('contacts.layout')
 
@section('content')

    <div class="row py-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Buscar contactos</h2>
            </div>
            <div class="pull-right">
                {{ Form::open(['route' => 'contacts.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}

                <div class='form-group'>
                    {{ Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Codigo']) }}
                </div>

                <div class='form-group'>
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
                </div>

                <div class='form-group'>
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                </div>

                <div class='form-group'>
                    {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Direccion']) }}
                </div>

                <div class='form-group'>
                    {{ Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Tel.']) }}
                </div>

                <div class='form-group'>
                    <button type="submit" class="btn btn-success">
                        Buscar
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="row py-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de contactos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('contacts.create') }}"> Nuevo contacto</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Direcci&oacute;n</th>
            <th>Tel&eacute;fono</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <!-- <td>{{ ++$i }}</td> -->
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->address }}</td>
            <td>{{ $contact->phone_number }}</td>
            <td>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('contacts.show', $contact->id) }}">Ver</a>
    
                    <a class="btn btn-primary" href="{{ route('contacts.edit', $contact->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $contacts->links() !!}
      
@endsection