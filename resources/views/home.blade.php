@extends('layouts.client')
@section('content')
    <!-- Loader -->
        <div id="loader" class="loader hidden"></div>
    <!-- End Loader -->
    <div id="content" class="container">
        
        <div id="header">
            <div id="headerTitle" class="row">
                <h1>Stéphanie Casanova Leclercq</h1>
                <h2>Facilitatrice certifiée Access Consciousness</h2>
            </div>
            <div id="headerCta" class="container">
                @if(Session::has('success'))
                    <div class="col-xs-10 col-xs-offset-1">    
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    </div>
                @elseif(isset($categories))
                    <div class="col-xs-4 col-xs-offset-4">    
                        <button type="button" data-toggle="modal" data-target="#bookingModal" class="cta-button btn btn-block">Prendre rendez-vous</button>
                    </div>
                @endif
            </div>
        </div>

        <div id="story" class="section">
            <div id="story-heading" class="row">
                <h3>Access Consciousness</h3>
            </div>
            <div id="story-block" class="row story-container">
                <div id="story-content" class="col-sm-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="story-container">
                    <div id="mainImage"></div>
                </div>
            </div>
        </div>

        @if(count($products) > 0 && count($categories) > 0)
        <div id="products" class="container-fluid section">
            <div class="row">
                <h3>Services</h3>
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                @foreach($categories as $category)
                <div class="product-separator">
                    <h4>{{ $category->name }}</h4>
                    <hr>
                </div>

                <div class="row">
                    <!-- Product -->
                  @foreach($products as $product)
                     @if($product->category_id == $category->id)
                      <div class="col-sm-6">
                        <div class="thumbnail">
                          <div id="{{ $product->name }}" class="thumbnail-image"></div>
                          <div class="caption">
                            <h5 class="thumbnail-{{ $product->name }}" >{{ $product->name }}</h5>
                            <p>{{ $product->description }}</p>
                            <a href="#" class="cta-button-mini btn btn-block bookingCTA" role="button">Réserver</a>
                          </div>
                        </div>
                        <div class="price">
                            <p>{{ $product->price }}€</p>
                        </div>
                      </div>
                      @endif
                    @endforeach
                   </div>
                  @endforeach
            </div>
        </div>
        @endif

        <div id="contact" class="section">
            <div class="row">
                <h3>Contact</h3>
            </div>
            <div class="row">
                <div id="contact-content" class="col-sm-8 col-sm-offset-3">
                    <div class="col-sm-12">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div id="social-media" class="col-sm-8 col-sm-offset-4">
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="#" class="socialMediaButton"><span class="fa fa-facebook fa-2x"></span></a></li>
                            <li><a href="#" class="socialMediaButton"><span class="fa fa-twitter fa-2x"></span></a></li>
                            <li><a href="#" class="socialMediaButton"><span class="fa fa-instagram fa-2x"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div id="contactPicture" class="col-sm-3 col-sm-offset-1">
                    <div id="contactImage"></div>
                </div>
            </div>
        </div>

        <div id="getHere" class="section">
            <div class="row">
                <h3>S'y rendre</h3>
            </div>
            <div class="row">
                <div id="maps" class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    <ul class="nav">
                        <li>
                            <h4>Voiture</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                       </li>
                       <br> 
                       <li>
                            <h4>Autolib'</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                       </li>
                       <br> 
                       <li>
                            <h4>Bus</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                       </li> 
                       <br>
                       <li>
                            <h4>Train</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                       </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

@if(isset($categories))
<!-- Modal -->
<div id="bookingModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div id="bookingModalContent" class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Remplissez le formulaire pour prendre contact avec Stéphanie</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <form id="quote" action="/quotes" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name" class="sr-only">Nom</label>
                        <input type="text" name="name" class="form-control quoteInput" autofocus="" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                        <label for="surname" class="sr-only">Prénom</label>
                        <input type="text" name="surname" class="form-control quoteInput" placeholder="Prénom" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="sr-only">Numéro de téléphone</label>
                        <input type="phone" name="phone" class="form-control quoteInput" placeholder="Numéro de téléphone" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Adresse email</label>
                        <input type="email" name="email" class="form-control quoteInput" placeholder="Adresse email" required>
                    </div>
                    <div id="selectFormGroup" class="form-group">
                      <label for="product">Quel service vous intéresse ?</label>
                      <select id="bookingModalSelect" class="form-control quoteInput" name="product">
                        <option id="firstOption" value="">Je ne sais pas encore</option>
                        @foreach($categories as $category)
                            <optgroup label="{{ $category->name }}"></optgroup>
                            @foreach($category->products as $product)
                            <option value="{{ $product->name }}">{{ $product->name }}</option>
                            @endforeach
                        @endforeach

                      </select>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="col-xs-6 col-xs-offset-3">
            <button id="book" class="cta-button-mini btn-block" type="submit" form="quote">Prendre rendez-vous</button>
        </div>
      </div>
    </div>

  </div>
</div>
@endif

@stop

@section('scripts')
<script type="text/javascript">
    
    $(document).ready(function(){
        //Thumbnail Image handler
            var thumbnails = $('.thumbnail');
            thumbnails.each(function(){
                var imageName = $(this).find('h5').html();
                var image = $('#'+imageName);
                if(image.length > 0){
                    image.css({'background':'url(images/'+imageName+'.jpg) center'});
                }
            });
        // End Thumbnail image handler

        // Booking CTA Handler
            var bookingCTA = $('.bookingCTA');
            bookingCTA.each(function(){
                var productName = $(this).parent().find('h5').html();
                $(this).click(function(){
                    $('#firstOption').attr('value',productName);
                    $('#selectFormGroup').addClass('hidden');
                    $('#bookingModal').modal('toggle');
                    $('#bookingModal').modal('show');
                });
            });
        // END Booking CTA handler

        // Quote Handler with loader
            if(quoteReady()){
                $('#book').click(function(){
                    $('#bookingModalContent').hide();
                    $('#loader').attr('class','loader');
                });
            }
        // End quote handler
    });

    function quoteReady(){
        var quoteInputs = $('.quoteInput');
        quoteInputs.each(function(input){
            if($(this).attr('value') != '' && $(this).attr('value') !== null && $(this).attr('value') !== undefined) {
                return true;
            }
            return false;
        });
    }
</script>    
@stop
