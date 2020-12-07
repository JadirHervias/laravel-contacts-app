@extends('articles.layout')
 
@section('content')

    <div class="row py-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Buscar art&iacute;culo</h2>
            </div>
            <div class="pull-right">
                {{ Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                <div class='form-group'>
                    {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Desc']) }}
                </div>

                <div class='form-group'>
                    {{ Form::text('cost', null, ['class' => 'form-control', 'placeholder' => 'Costo']) }}
                </div>

                <div class='form-group'>
                    {{ Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'Stock']) }}
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
                <h2>Todos los art&iacute;culos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Nuevo art&iacute;culo</a>
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
            <th>Descripci&oacute;n</th>
            <th>Costo</th>
            <th>Stock</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($articles as $article)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $article->description }}</td>
            <td>{{ $article->cost }}</td>
            <td>{{ $article->stock }}</td>
            <td>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Ver</a>
    
                    <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $articles->links() !!}
      
@endsection