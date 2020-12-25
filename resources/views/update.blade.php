@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Input
                    </div>
                    @foreach($cruds as $crud)
                    <div class="card-body">
                        <form action="/crudup/{{ $crud->id }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="col-9">
                                <label>Nama :</label>
                                <input class="form-control mb-4" type="text" name="nama" value="{{ $crud->nama }}">
                                <label>Foto :</label>
                                <input class="form-control-file" type="file" name="foto" value="{{ $crud->foto }}">
                            </div>

                            <div class="col-9">
                                <button class="btn btn-success mt-4" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
