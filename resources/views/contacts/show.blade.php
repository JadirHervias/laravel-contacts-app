@extends('contacts.layout')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">Atr&aacute;s</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contacto</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Informaci&oacute;n de contacto</h2>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="card" style="width: 18rem;">
                @if ($contact->photo_url == "not found")
                    <img src="https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png" class="card-img-top" alt="{{ $contact->email }}">
                @else
                    <img src="https://hervias-contacts-app.s3.us-east-1.amazonaws.com/{{ $contact->photo_url }}" class="card-img-top" alt="{{ $contact->email }}">
                @endif
                <div class="card-body">
                    <p class="card-text">
                        <strong>Nombre: </strong>{{ $contact->name }}
                    </p>
                    <p class="card-text">
                        <strong>Nombre: </strong>{{ $contact->last_name }}
                    </p>
                    <p class="card-text">
                        <strong>Email: </strong>{{ $contact->email }}
                    </p>
                    <p class="card-text">
                        <strong>Direcci&oacute;n: </strong>{{ $contact->address }}
                    </p>
                    <p class="card-text">
                        <strong>Tel&eacute;fono: </strong>{{ $contact->phone_number }}
                    </p>
                    <p class="card-text">
                        <strong>Fecha de nacimiento: </strong>{{ $contact->birth_date }}
                    </p>
                </div>
            </>
        </div>
    </div>
@endsection