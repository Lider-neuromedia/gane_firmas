@extends('layouts.master')
@section('title','Verificación de usuarios gane - Firmas de correo')

@section('content')
<section class="container-login">
    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col">
                <div class="row bg-white card-custom align-items-center">
                    <div class="col-sm-6 pt-6 pb-6 pl-4 pr-4">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <h5 class="text-blue font-weight-bolder">Descarga tu firma de correo corporativa</h5>
                                <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    
                                    <div class="form-group">
                                        <label class="text-gray-light font-size13 ">Número de documento</label>
                                        <input type="number" class="form-control input-login @error('cedula') is-invalid @enderror"  name="cedula" required>
                                    </div>
                                    @if ($errors->has('cedula'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cedula') }}</strong>
                                        </span>
                                    @endif
                                    @if ($errors->has('active'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('active') }}</strong>
                                        </span>
                                    @endif
                                    <div class="form-group text-center d-block">
                                        <button type="submit" class="btn btn-blue-rounded btn-block font-size18 ">{{ __('Ingresar') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-6 bg-blue pt-4 pb-4 pl-4 pr-4 border-radius-r-10">
                        <div class="col-sm-12 pt-6 pb-6 pl-4 pr-4">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="text-center">
                                        <img class="pt-3 pb-3 img-fluid" src="{{ asset('./img/gane_big2.png') }}" alt="">
                                        <img class="pt-3 pb-3 img-fluid" src="{{ asset('./img/supoergiros_big.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
