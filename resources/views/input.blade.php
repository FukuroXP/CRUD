@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Input
                    </div>
                    <div class="card-body">
                        <form action="crudgo" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-9">
                                <label>Nama :</label>
                                <input class="form-control mb-4" type="text" name="nama">
                                <label>Foto :</label>
                                <input class="form-control-file" type="file" name="foto">
                            </div>

                            <div class="col-9">
                                <button class="btn btn-success mt-4" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
