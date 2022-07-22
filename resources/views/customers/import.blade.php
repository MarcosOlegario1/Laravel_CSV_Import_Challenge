@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Importar Excel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form action="/customers/import" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group" style="text-align:center; margin-top: 10px;">
                            <input type="file" name="file" />
                        </div>

                        <div class="row" style="margin-top: 20px;justify-content: center;">
                            <button type="submit" class="btn btn-success" style="width: 60%">Importar</button>
                        </div>
                   </form>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
