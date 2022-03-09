<x-app-layout>
<!-- Page content-->
<div class="container mt-2">
    <a href="{{url('posts')}}" class="btn btn-primary text-white mb-3">Nazad </a>
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Objavljeno: {{date('d.m.Y.', strtotime($post->created_at))}}</div>
                    <div class="text-muted fst-italic mb-2 fs-bold">Autor: {{$post->user->name}}</div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="{{ url('/posts') }}">{{$post->location}}</a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="{{ url('/') }}">NOLIMIT RACING</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" style="width:100%;" src="/storage/cover_images/{{$post->cover_image}}" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-2">
                    <div class="fs-5 mb-4">
                        <b>Lokacija: </b><span>{{$post->location}}</span>
                    </div>
                   
                    <p class="fs-5 mb-4"><b>Više informacija: </b><br>{{$post->body}}</p>
                    
                </section>
                @if(!Auth::guest())
       @if(Auth::user()->id == $post->user_id || Gate::check('delete-posts'))
       
       
     <div class="d-flex flex-row justify-content-md-between mb-3 ">
        
        <div class="p-2 "><a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary text-white btn-lg">Uredi</a></div>
        
        <div class="p-2">{!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'DELETE', 'class'=>'float-right']) !!}
            {{Form::submit('Obriši', ['class' => 'btn btn-danger bg-red text-white btn-lg'])}}
         {!!Form::close()!!}</div>
        
        
      </div>
      
        @endif
      @endif
      
            </article>
         
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
           
            <!-- Categories widget-->
            
           
            <!-- Side widget-->
            
        </div>
    </div>
</div>


</x-app-layout>


