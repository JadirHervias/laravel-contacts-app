@extends('articles.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Art&iacute;culo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-dark" href="{{ route('articles.index') }}"> Atr&aacute;s</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripci&oacute;n:</strong>
                {{ $article->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Costo:</strong>
                {{ $article->cost }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stock:</strong>
                {{ $article->stock }}
            </div>
        </div>
    </div>
@endsection