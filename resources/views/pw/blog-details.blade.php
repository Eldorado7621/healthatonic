@include('pw/layouts.header')
@include('pw/layouts.menu')
    
    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('images/img_2.jpg');">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <span class="post-category text-white bg-success mb-3">Nature</span>
              <h1 class="mb-4"><a href="#">{{$pregHealthTip->subject}}.</a></h1>
              <div class="post-meta align-items-center text-center">
                <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By Carrol Atkinson</span>
                <span>&nbsp;-&nbsp;  {{date("d-M-Y",strtotime($pregHealthTip->created_at))}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="post-content-body">
              <div class="row mb-5 mt-5">
               <div class="col-md-6 mb-4">
                <img src="images/img_3.jpg" alt="Image placeholder" class="img-fluid rounded">
              </div>
            </div>
            <p>{{$pregHealthTip->body}}</p></div>

            
            <div class="pt-5">
              <p>Categories:  <a href="#">Food</a>, <a href="#">Travel</a>  Tags: <a href="#">#manila</a>, <a href="#">#asia</a></p>
            </div>

           <div class="comment-form-wrap pt-5">
			 <span id="result"></span>
                <h3 class="mb-5">Leave a comment</h3>
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
            <div class="pt-5">
			 
              <h3 class="mb-5"><span id="comment_no" value="">{{count($comments)}}</span> Comments</h3>
			  <input type="hidden" id="ccco" value="{{count($comments)}}"/>
              <ul class="comment-list">
				 <li class="comment">
                  <div class="vcard" id="alpha">
               
				</div>
                   <div class="comment-body">
				    <div id="name">
					</div>
                    <div class="meta"></div>
                    <div id="comment">
				    </div>
					
                  </div>
                </li>
			   @foreach($comments as $comment)
                <li class="comment">
                  <div class="vcard">
                    <h5 style="background-color:lightblue;padding:10px;margin-right:10px;text-align:center;">{{strtoupper(substr($comment->user->name,0,1))}}</h5>
                  </div>
                   <div class="comment-body">
                    <h3>{{$comment->user->name}}</h3>
                    <div class="meta">{{date("d-M-Y",strtotime($comment->created_at))}}</div>
                    <p> {{$comment->coment}}</p>
					<form  class="" method="post" >
					   <input type="hidden" name="id" value="{{$comment->id}}"/>
					   <textarea name="reply" placeholder="type your reply" class="form-control" id=""></textarea>
					   @csrf
					   <input type="submit" name="save" id="saverep" value="Save"/>
					</form>
                  </div>
                </li>
			    @endforeach
				
              </ul>
              <!-- END comment-list -->
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box search-form-wrap">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <!-- END sidebar-box -->
            <div class="sidebar-box">
              <div class="bio text-center">
                <img src="images/person_2.jpg" alt="Image Placeholder" class="img-fluid mb-5">
                <div class="bio-body">
                  <h2>Craig David</h2>
                  <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                  <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                  <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <!-- END sidebar-box -->  
            <div class="sidebar-box">
              <h3 class="heading">Popular Posts</h3>
              <div class="post-entry-sidebar">
                <ul>
                  <li>
                    <a href="">
                      <img src="images/img_1.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                        <div class="post-meta">
                          <span class="mr-2">March 15, 2018 </span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <img src="images/img_2.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                        <div class="post-meta">
                          <span class="mr-2">March 15, 2018 </span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <img src="images/img_3.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                        <div class="post-meta">
                          <span class="mr-2">March 15, 2018 </span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                <li><a href="#">Food <span>(12)</span></a></li>
                <li><a href="#">Travel <span>(22)</span></a></li>
                <li><a href="#">Lifestyle <span>(37)</span></a></li>
                <li><a href="#">Business <span>(42)</span></a></li>
                <li><a href="#">Adventure <span>(14)</span></a></li>
              </ul>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Tags</h3>
              <ul class="tags">
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
              </ul>
            </div>
          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
            <ul class="list-unstyled float-left mr-5">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Subscribes</a></li>
            </ul>
            <ul class="list-unstyled float-left">
              <li><a href="#">Travel</a></li>
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Nature</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            

            <div>
              <h3 class="footer-heading mb-4">Connect With Us</h3>
              <p>
                <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                <a href="#"><span class="icon-twitter p-2"></span></a>
                <a href="#"><span class="icon-instagram p-2"></span></a>
                <a href="#"><span class="icon-rss p-2"></span></a>
                <a href="#"><span class="icon-envelope p-2"></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
          </div>
        </div>
      </div>
    </div>
    
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
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
                  
				   var c_coment=parseInt(document.getElementById("ccco").value)+1;
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    $('#alpha').html(' <h5 style="background-color:lightblue;padding:20px;">'+data.alpha+'</h5>');
                    $('#name').html(' <h4>'+data.name+'<span>'+data.date+'</span></h4>');
                    $('#comment').html(' <p>'+data.comment+'</p>');
                    $('#comment_no').html(' <span>'+c_coment+'</span>');
                   
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

