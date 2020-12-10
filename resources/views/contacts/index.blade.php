@extends('contacts.layout')

@section('content')

    <div class="row py-3 m-0">
        <div class="col-lg-12 m-0 p-0">
            <div class="pull-left">
                <h2>Buscar contactos</h2>
            </div>
            <div class="pull-right">
                {{ Form::open(['route' => 'contacts.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}

                <div class='form-group m-2'>
                    {{ Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Codigo']) }}
                </div>

                <div class='form-group m-2'>
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
                </div>

                <div class='form-group m-2'>
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                </div>

                <div class='form-group m-2'>
                    {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Direccion']) }}
                </div>

                <div class='form-group m-2'>
                    {{ Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Tel.']) }}
                </div>

                <div class='form-group m-2'>
                    <button type="submit" class="btn btn-primary">
                        Buscar
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="row py-3 m-0">
        <div class="col-lg-12 m-0 p-0">
            <div class="pull-left">
                <h2>Lista de contactos</h2>
            </div>
            <div class="pull-right p-2">
                <a class="btn btn-primary" href="{{ route('contacts.create') }}"> Nuevo contacto</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>C&oacute;digo</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Direcci&oacute;n</th>
                <th>Tel&eacute;fono</th>
                <th width="250px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr scope="row">
                <!-- <td>{{ ++$i }}</td> -->
                <td>{{ $contact->id }}</td>
                <!-- <td>https://hervias-contacts-app.s3.us-west-2.amazonaws.com/{{ $contact->photo_url }}</td> -->
                <td>https://hervias-contacts-app.s3.us-west-2.amazonaws.com</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->address }}</td>
                <td>{{ $contact->phone_number }}</td>
                <td>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
    
                        <a class="btn btn-dark" href="{{ route('contacts.show', $contact->id) }}">Ver</a>
        
                        <a class="btn btn-primary" href="{{ route('contacts.edit', $contact->id) }}">Editar</a>
    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $contacts->links() !!}
      
@endsection