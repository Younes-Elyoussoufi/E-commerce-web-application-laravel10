<footer>
    <div class="container">
       <div class="row">
          <div class="col-md-4">
              <div class="full">
                 <div class="logo_footer">
                   <a href="/"><img width="210" src="images/logo.png" alt="#" /></a>
                 </div>
                 <div class="information_f">
                   <p><strong>ADDRESS:</strong> 20534 casablana sidi marouf </p>
                   <p><strong>TELEPHONE:</strong> 060000000</p>
                   <p><strong>EMAIL:</strong> admin@gmail.com</p>
                 </div>
              </div>
          </div>
          <div class="col-md-8">
             <div class="row">
             <div class="col-md-7">
                <div class="row">
                   <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Menu</h3>
                   <ul>
                      <li><a href="/">Home</a></li>
                      {{-- <li><a href="{{route('about')}}">About</a></li> --}}
                      <li><a href="{{route('blog_list')}}">Blog</a></li>
                      <li><a href="{{route('contact')}}">Contact</a></li>
                   </ul>
                </div>
             </div>
             <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Account</h3>
                   <ul>
                      <li><a href="{{route('profile.show')}}">Profile</a></li>
                      <li><a href="{{route('login')}}">Login</a></li>
                      <li><a href="{{route('register')}}">Register</a></li>
                     
                   </ul>
                </div>
             </div>
                </div>
             </div>     
             <div class="col-md-5">
                <div class="widget_menu">
                   <h3>Newsletter</h3>
                   <div class="information_f">
                     <p>Subscribe by our newsletter and get update protidin.</p>
                   </div>
                   <div class="form_sub">
                      <form>
                         <fieldset>
                            <div class="field">
                               <input type="email" placeholder="Enter Your Mail" name="email" />
                               <input type="submit" value="Subscribe" />
                            </div>
                         </fieldset>
                      </form>
                   </div>
                </div>
             </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
 <!-- footer end -->
 <div class="cpy_">
    <p class="mx-auto">© 2023 Created By ELYOUSSOUFI YOUNES
    
    </p>
 </div>
 <!-- jQery -->