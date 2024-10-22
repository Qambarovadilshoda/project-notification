@extends('components.layouts.app')
@section('title', 'Barcha Foydalanuvchilar')

@section('content')

<style>
    .table-box {
        padding: 40px; /* Ichki bo'shliq */
        background: #ffffff; /* Orqa fon rangi */
        border-radius: 7px; /* Burchaklar yumshatilishi */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soyali effekt */
        margin-top: 80px; /* Yuqoridan va pastdan bo'shliq, o'rtada joylashish */
        max-width: 900px; /* Maksimal kenglikni oshirish */
        width: 100%; /* Jadvalning kengligini to'liq qilish */
    }

    .user-table {
        width: 100%; /* Jadval kengligi */
        border-collapse: collapse; /* Katta bo'shliqlarni yo'q qilish */
    }

    .user-table th, .user-table td {
        border: 1px solid #ddd; /* Jadval qirralariga chegara */
        padding: 12px; /* Ichki bo'shliq */
        text-align: left; /* Matnni chapga qaratish */
    }

    .user-table th {
        background-color: #f7f7f7; /* Sarlavhalar uchun yengil fon rangi */
        color: #333; /* Sarlavhalar uchun matn rangi */
        font-weight: bold; /* Sarlavhalar matnini qalin qilish */
    }

    .user-table tr:hover {
        background-color: rgba(240, 240, 240, 0.5); /* Hover qilinganda fon rangi o'zgaradi */
    }

    .user-link {
        display: inline-block; /* Inline-block effekt */
        padding: 6px 12px; /* Ichki bo'shliq */
        background-color: #007bff; /* Fon rangi */
        color: white; /* Matn rangi */
        border-radius: 5px; /* Burchaklar yumshatilishi */
        text-decoration: none; /* Chizgili matnni o'chirish */
        transition: background-color 0.3s; /* Hoverda o'tish animatsiyasi */
    }

    .user-link:hover {
        background-color: #0056b3; /* Hover qilinganda fon rangi o'zgaradi */
    }
    .table_res{
        max-height: 500px;
        overflow-y: auto;
    }

</style>

<div class="intro-section" id="home-section">
    <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center"> <!-- Markazga joylashtirish uchun -->
                <div class="col-lg-8"> <!-- Katta ekranlarda 8 ustunli -->
                    <div class="table-box">
                        <h2 class="text-center">Foydalanuvchilar Ro'yxati</h2> <!-- Ro'yxat sarlavhasi -->
                        <div class="table_res">
                            <table class="user-table">
                                <thead>
                                    <tr>
                                        <th>Ism</th>
                                        <th>Profilga o'tish</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td><a class="user-link" href="{{ route('users.profile', $user->userName) }}">Profil</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
