<section id="cta" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 align-self-center">
                <h2>A digital marketing blog</h2>
                <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis.
                    Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus
                    rhoncus rutrum. Integer et ornare mauris.</p>
            </div> @auth()
                <div class="col-lg-4 col-md-12">
                    <div class="newsletter-widget text-center align-self-center">
                        <h3>Subscribe Today!</h3>
                        <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                        <form class="form-inline" method="post" action="{{route('subsc')}}">
                            @csrf
                            <input hidden type="text" name="email" placeholder="Add your email here.."
                                   @if(\Illuminate\Support\Facades\Auth::user() )value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                   @endif
                                   class="form-control"/>
                            <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                            @if(session('success'))
                                <div class=" mt-2 alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                        </form> @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif</div>

                </div> @endauth<!-- end newsletter -->
        </div>
    </div>
    </div>
</section>
