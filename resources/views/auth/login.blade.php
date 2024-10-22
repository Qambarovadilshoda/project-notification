@extends('components.layouts.app')
@section('title', 'Kirish')
@section('content')

<div class="intro-section" id="home-section">

    <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row align-items-center">
              <div class="col-lg-6 mb-4">
                <h1  data-aos="fade-up" data-aos-delay="100">Xush Kelibsiz !</h1>
                <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Siz foydalanuvchilarning profilini ko'rishingiz va ularga obuna bo'lishingiz mumkin! Uning uchun ro'yxatdan o'tishingizni so'rab qolaman😊</p>

              </div>

              <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                <form action="{{route('handleLogin')}}" method="POST" class="form-box">
                    @csrf
                  <h3 class="h4 text-black mb-4">Kirish</h3>
                  <div class="form-group">
                    <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Elektron pochta">
                  </div>
                  @error('email')
                        <p style="color:red">{{'* ' . $message}}</p>
                  @enderror
                  <div class="form-group mb-4">
                    <input type="password" class="form-control" value="{{old('password')}}" name="password" placeholder="Parol">
                  </div>
                  @error('password')
                        <p style="color:red">{{'* ' . $message}}</p>
                  @enderror
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-pill" value="Kirish">
                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
