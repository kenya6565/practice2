@extends('layouts.app')
<style type="text/css">
    .text-image {
        position: relative;
        width: 500px;
        min-height: 90vh;
       
    }
    
    .text-image img {
        width: 100%;
        min-height: 90vh;
    }
    
    .text {
        position: absolute;
        top: 30%;
        color: #ffffff;
        font-family: 'Kosugi Maru', sans-serif;
    } 
    
    .btn-shine {
        color: #FFF;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        line-height: 45px;
        width: 200px;
        text-decoration: none;
        text-transform: uppercase;
        border: 1px solid transparent;
        outline: 1px solid;
        outline-color: rgba(255, 255, 255, 0.5);
        outline-offset: 0px;
        text-shadow: none;
        transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
        position: absolute;
        top: 10%;
        left: 43%;
        font-family: 'Kosugi Maru', sans-serif;
        text-align: center;
    }
    
    .btn-shine:hover {
        border-color: #FFF;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
        outline-color: transparent;
        outline-offset: 12px;
        text-shadow: 2px 2px 3px #000;
    
    }
    
    @media (min-width: 992px) {
        .text {
                font-size: 4.0rem;
        }
      
    }
    @media (max-width: 991.98px) {
        .text {
            font-size: 4.0rem;
        }
       
    }
    @media (max-width: 767.98px) {
        .text {
            font-size: 2.0rem;
        }
       
    }
    @media (max-width: 575.98px) {
        .text {
            font-size: 1.0rem;
        }
    
       
    }
</style>
@section('content')
    <div class="container-fluid top_view">
      　<div class="row" style="padding:0px">
            <div class="col-lg-12 col-12 no-gutters text-image text-center text-sm-center" style="padding:0px">
                <img class="img-fluid" src="{{ asset('images/'.$random) }}">
              　<div class="text">
              		<p>{{ __('messages.wanderlust') }}</p>
              		{{ __('messages.explanation') }}
          		</div>
              　<a href="{{ route('login') }}" class="btn-shine d-flex justify-content-center d-md-table mx-auto text-white">{{ __('messages.start') }}</a>
            </div>
      　</div>
    </div>
@endsection