<x-app-layout>
<div class="container">
    <h1 class="text-grey">Dodaj svoju fotografiju</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
        <div class="form-group">
            {{Form::label('title','Naslov fotografije:')}}
            {{Form::text('title','',['class' => 'form-control', 'placeholder'=>'Naslov...'])}}
        </div>
        <div class="form-group">
            {{Form::label('location','Igrica/Mjesto:')}}
            {{Form::text('location','',['class' => 'form-control', 'placeholder'=>'F1 2021'])}}
        </div>
       
        
        <div class="form-group">
            {{Form::label('body','Opis fotografije:')}}
            {{Form::textarea('body','',['class' => 'form-control', 'placeholder'=>'Opis...'])}}
        </div>
        <div class="form-group">
            {{Form::label('cover_image','Slika:')}}
            {{Form::file('cover_image')}}
        </div>
    

        {{Form::submit('Potvrdi',['class' =>'btn btn-primary text-white mt-5'])}}
    {!! Form::close() !!}
</div>

</x-app-layout>