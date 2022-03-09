<x-app-layout>
    <div class="container">
        <div class="d-md-flex flex-row justify-content-between py-3">
            <div class="p-2 mt-1"><h1 class="d-inline">Fotografije naših članova</h1></div>
            @if(!Auth::guest())
            <div class="p-3"><a href="{{ route('posts.create')}}"><button type="button " class="btn btn-primary text-white d-inline">Objavite fotografiju</button></a></div>
            @endif
            
          </div>
        
        

        @if(count($posts)>0)
            @foreach ($posts as $post)
            <div class="row main-row well bg-white rounded my-3 shadow">
                <div class="col-lg-3 col-md-12 col-sm-12 py-2">
                    <div class="blog-img">
                        <img style="width:100%; height:220px;" src="/storage/cover_images/{{$post->cover_image}}" alt="" class="img-fluid rounded ">
                    </div>
                    
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 py-3">
                    <div class="blog-title">
                        <h3 class=" fw-bold"><a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">{{$post->title}}</a></h3>
                    </div>
                    
                    <div class="location my-1">
                        <i class="bi bi-geo-alt"></i>
                        <span><b> Igirca/Mjesto:</b> {{$post->location}}</span>
                    </div>
                    
                    <div class="blog-date my-1">
                        <!--<i class="bi bi-person"></i><span><b> Autor:</b> {{$post->user->name}}</span> -->
                    </div>
                    

                        

                        <div class=" my-1">
                            <i class="bi bi-book"></i><span><b> Više informacija:</b></span>
                            <span class="tijelo">{{$post->body}}</span>
                        </div><hr>
                        <div class="blog-date my-1">
                            <i class="bi bi-calendar"></i><span><b> Objavljeno:</b> {{date('d.m.Y.', strtotime($post->created_at))}}</span>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('posts.show', $post->id) }}"> <button class="btn btn-outline-primary">Saznajte više</button></a>
    
                        </div>
                        

                    
                   
                    
                    
                   
                    
                    


                </div>
               

            </div>
                
            @endforeach
            {{$posts->links('pagination::bootstrap-4')}}

        @else
            <h4>Nema niti jedne objavljenje fotografije</h4>
        @endif
    </div>
    <script type="text/javascript">// <![CDATA[
        $(function(){
          $(".tijelo").each(function(i){
            len=$(this).text().length;
            if(len>120)
            {
              $(this).text($(this).text().substr(0,120)+'...');
            }
          });
        });
        // ]]></script>


    </x-app-layout>