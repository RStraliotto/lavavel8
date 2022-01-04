@extends('layouts.app')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Contatos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('contato.create') }}"> Create New Post</a>
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
            <th>ID</th>
            <th>Name</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->nome }}</td>
            <td>{{ $value->contato_telefone }}</td>
            <td>{{ \Str::limit($value->email, 100) }}</td>
            <td>
                <form action="{{ route('contato.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('contato.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('contato.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection