@extends('layouts.client')
@section('content')

    <div class="container-fluid" style="margin-top: 56px">
        <div class="container">
            <img src="http://vovinc.com/wp-content/uploads/2017/01/under-construction.jpg" height="500px" width="1200px">
        </div>
        <h1 style="text-align: center">This website is under construction.</h1>
        <h2 style="text-align: center">Please contact administrator if you need more information : <br> 
            <a href="mailto:thomasleclercq90010@gmail.com">thomasleclercq90010@gmail.com</a>
        </h2>

        <div class="col-xs-4 col-xs-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="text-align: center">Prendre rendez-vous</h3>
                </div>
                <form action="/quotes" method="POST">
                    <div class="panel-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name" class="sr-only">Nom</label>
                            <input type="text" name="name" class="form-control" required="" autofocus="" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="surname" class="sr-only">Prénom</label>
                            <input type="text" name="surname" class="form-control" placeholder="Prénom">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="sr-only">Numéro de téléphone</label>
                            <input type="phone" name="phone" class="form-control" placeholder="Numéro de téléphone">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Adresse email</label>
                            <input type="email" name="email" class="form-control" placeholder="Adresse email">
                        </div>
                        <div class="form-group">
                          <label for="product">Quel service vous intéresse ?</label>
                          <select class="form-control" name="product">
                            <option value="">Je ne sais pas encore</option>
                            @foreach($categories as $category)
                                <optgroup label="{{ $category->name }}"></optgroup>
                                @foreach($category->products as $product)
                                <option value="{{ $product->name }}">{{ $product->name }}</option>
                                @endforeach
                            @endforeach

                          </select>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Plus d'information</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
