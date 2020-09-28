<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

   
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="pw/assets/css/fontawesome.css">
    <link rel="stylesheet" href="pw/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="pw/assets/css/owl.css">

 </head>
 <body>
@include('pw/includes.menu')
<div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Post Details</h4>
                <h2>Single blog post</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
	 <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
				
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="upload/{{$pregHealthTip->picture}}" height="300px" width="300px"alt="">
                    </div>
                    <div class="down-content">
                      <span>{{$pregHealthTip->subject}}</span>
                      <a href="post-details.html"></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">{{date("d-M-Y",strtotime($pregHealthTip->created_at))}}</a></li>
                        <li><a href="#">{{count($comments)}} Comments</a></li>
                      </ul>
                      <p>
					  {{$pregHealthTip->body}}
					  </p>
                    
                    </div>
                  </div>
				 
                </div>
						<div class="col-lg-12">
                  <div class="sidebar-item ">
                    <div class="sidebar-heading">
					  <span id="result"></span>
                      <h2>Your comment</h2>
                    </div>
                    <div class="">
                      <form  id="dynamic_form" method="post">
					   <input type="hidden" name="id" value="{{$pregHealthTip->id}}"/>
                        <div class="row">
                          <div class="col-lg-12">
                              <textarea name="message" rows="6" id="message" placeholder="Type your comment" style="width:600px;"required=""></textarea>
                            
                          </div>
                          <div class="col-lg-12">
                            @csrf</br>
                           <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" style="color:white;" />
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
				   
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>{{count($comments)}} Comments</h2>
                    </div>
                    <div class="content">
                      <ul>
					   <li>
                          <div class="author-thumb" id="alpha">
                            
                          </div>
                          <div class="right-content" >
						  <div id="name">
						  </div>
                            <div id="comment">
						  </div>
                            
                          </div>
                        </li></br>
						@foreach($comments as $comment)
                        <li>
                          <div class="author-thumb">
                            <h5 style="background-color:lightblue;padding:20px;">{{strtoupper(substr($comment->user->name,0,1))}}</h5>
                          </div>
                          <div class="right-content">
                            <h4>{{$comment->user->name}}<span>{{date("d-M-Y",strtotime($comment->created_at))}}</span></h4>
                            <p>{{$comment->coment}}</p>
							<form  class="reply" method="post" >
							<input type="hidden" name="id" value="{{$comment->id}}"/>
							<textarea name="reply" placeholder="type your reply" class="form-control" id=""></textarea>
							@csrf
							<input type="submit" name="save" id="saverep" value="Save"/>
							</form>
                          </div>
                        </li></br>
						@endforeach
						
                      </ul>
                    </div>
                  </div>
                </div>
		
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="post-details.html">
                          <h5>Vestibulum id turpis porttitor sapien facilisis scelerisque</h5>
                          <span>May 31, 2020</span>
                        </a></li>
                        <li><a href="post-details.html">
                          <h5>Suspendisse et metus nec libero ultrices varius eget in risus</h5>
                          <span>May 28, 2020</span>
                        </a></li>
                        <li><a href="post-details.html">
                          <h5>Swag hella echo park leggings, shaman cornhole ethical coloring</h5>
                          <span>May 14, 2020</span>
                        </a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">- Nature Lifestyle</a></li>
                        <li><a href="#">- Awesome Layouts</a></li>
                        <li><a href="#">- Creative Ideas</a></li>
                        <li><a href="#">- Responsive Templates</a></li>
                        <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                        <li><a href="#">- Creative &amp; Unique</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">PSD</a></li>
                        <li><a href="#">Responsive</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
 </body>
</html>

<script>
$(document).ready(function(){

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("submit-comment.save") }}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                   
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    $('#alpha').html(' <h5 style="background-color:lightblue;padding:20px;">'+data.alpha+'</h5>');
                    $('#name').html(' <h4>'+data.name+'<span>'+data.date+'</span></h4>');
                    $('#comment').html(' <p>'+data.comment+'</p>');
                   
                }
                $('#save').attr('disabled', false);
            }
        })
 });
 
var input = document.getElementByClassName("reply");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
// $('#reply').on('submit', function(event){
   event.preventDefault();
   $.ajax({
            url:'{{ route("submit-reply.save") }}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
			 beforeSend:function(){
                $('#saverep').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                   
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    $('#name').html(' <h4>'+data.name+'<span>'+data.date+'</span></h4>');
                    $('#comment').html(' <p>'+data.comment+'</p>');
                   
                }
				 $('#saverep').attr('disabled', false);
              
            }
        })
}
});
 

});
</script>



