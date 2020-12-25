@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="col-12 mb-4 bg-dark text-light p-2" style="border-radius: 10px;">
                       <table class="table table-responsive table-dark table-hover" style="text-align: center;">
                           <thead>
                           <tr>
                               <td>Nama</td>
                               <td>foto</td>
                               <td>Action</td>
                           </tr>
                           </thead>
                           @foreach($cruds as $crud)
                           <tr>
                               <td>
                                   {{ $crud->nama }}
                               </td>
                               <td>
                                   <img style="max-width: 200px" src="{{ asset('foto/'.$crud->foto) }}">
                               </td>
                               <td>
                                   <div style="text-align: left;">
                                       <a href="/crud_update/{{ $crud->id }}" class="btn btn-outline-primary mb-2">Ubah</a>
                                       <form method="POST" action="{{ route('crud.destroy', [$crud->id]) }}">
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE') }}
                                           <button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-outline-danger">Hapus</button>
                                       </form>
                                   </div>
                               </td>
                           </tr>
                           @endforeach
                       </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
