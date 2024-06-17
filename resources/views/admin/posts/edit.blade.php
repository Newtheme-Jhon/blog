@extends('adminlte::page')

@section('title', 'Admin Blog')

@section('content_header')
    <h1> Editar posts</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-info" role="alert">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.posts.update', $post)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">

                    @include('admin.posts.partials.form')

                <button type="submit" class="btn btn-primary">
                    Submit
                </button>

            </form>
        </div>
    </div>

@stop

@section('js')

<script src="{{asset('vendor/stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

{{-- WYSIWYG --}}
<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

    <script>

        $(document).ready( function() {
            $("#title").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );

        //Mostrar imagen del Post
        document.getElementById('postImage').addEventListener('change', mostrarImagen);

        function mostrarImagen(e){

            let  file = e.target.files[0];
            let reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('image').setAttribute('src', e.target.result)
            };

            reader.readAsDataURL(file);
        }

    </script>

@endsection