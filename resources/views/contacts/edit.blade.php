@extends('contacts.layout')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">Atr&aacute;s</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar contacto</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar contacto</h2>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('contacts.update',$contact->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" value="{{ $contact->name }}" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $contact->email }}" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Direcci&oacute;n:</strong>
                    <input type="text" name="address" value="{{ $contact->address }}" class="form-control" placeholder="Direcci&oacute;n">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tel&eacute;fono:</strong>
                    <input type="text" name="phone_number" value="{{ $contact->phone_number }}" class="form-control" placeholder="Tel&eacute;fono">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Foto de contacto:</strong>
                <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input" id="photo">
                    <label class="custom-file-label text-muted" for="chooseFile">Elegir imagen</label>
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
   
    </form>
@endsection