@extends('articles.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear nuevo art&iacute;culo</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-dark" href="{{ route('articles.index') }}"> Atr&aacute;s</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your input code<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('articles.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripci&oacute;n:</strong>
                <input type="text" name="description" class="form-control" placeholder="Desc">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Costo:</strong>
                <input type="number" name="cost" class="form-control" placeholder="Costo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stock:</strong>
                <input type="number" name="stock" class="form-control" placeholder="Stock">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-success">Crear</button>
        </div>
    </div>
   
</form>
@endsection