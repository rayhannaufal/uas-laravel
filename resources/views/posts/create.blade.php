@extends('posts.layout.main')

@section('container')
    <h1>Create New Post</h1>
    <div class="col-md-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

         <div class="row">
            <div class="col-md-8">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="judul" class=" form-control" id="exampleFormControlInput1" placeholder="Create your title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                    <select class="form-select form-select-sm" name="kategori_id" aria-label=".form-select-sm example">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">File Image</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="Insert">
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Body</label>
                    <input id="isi" type="hidden" name="isi">
                    <trix-editor input="isi"></trix-editor>
                </div>
            </div>

            <div class="col-md-8 text-center my-3">
                <div class="float-start">
                    <a class="btn btn-success" href="{{ route('posts.index') }}"><i class="bi bi-back"></i> Back</a>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-primary">Submit <i class="bi bi-check-lg"></i></button>
                </div>
            </div>
        </div>

    </form>
@endsection
