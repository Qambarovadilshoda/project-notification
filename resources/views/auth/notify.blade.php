@extends('components.layouts.app')
@section('title', 'Bildirishnomalar')

@section('content')

<style>
    .table-box {
        padding: 40px; /* Ichki bo'shliq */
        background: #fff; /* Orqa fon rangi */
        border-radius: 7px; /* Burchaklar yumshatilishi */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soyali effekt */
        margin: 40px auto; /* Yuqoridan va pastdan bo'shliq, o'rtada joylashish */
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
        max-height: 550px;
        overflow-y: auto;
    }
</style>

<div class="intro-section" id="home-section">
    <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center"> <!-- Markazga joylashtirish uchun -->
                <div class="col-lg-8"> <!-- Katta ekranlarda 8 ustunli -->
                    <div class="table-box">
                        <div class="table_res">
                            <h2 class="text-center">Yangi Bildirishnomalar</h2> <br><!-- Ro'yxat sarlavhasi -->
                            @if($unReadNotify)

                            <form style="margin-left: 37%" action="{{route('notify.readAll')}}">
                            <button type="submit" class="btn btn-primary">Hammasini O'qish</button><br><br>
                            </form>
                            <table class="user-table">
                            <thead>
                                <tr>
                                    <th>Bildirishnoma</th>
                                    <th>O'qilgan deb belgilash</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unReadNotify as $n)
                                <tr>
                                    <td>{{$n->data['notify']}}</td>

                                    <td>

                                        <form  style="display: inline" action="{{route('notify.read', $n->id)}}" method="POST">
                                            @csrf
                                           <button class="btn btn-primary" type="submit">Read</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <br>
                            @endif
                            @if($readNotify)
                            <h2 style="text-align: center">O'qilgan Bildirishnomalar</h2>
                            <table class="user-table">
                            <thead>
                                <tr>
                                    <th>Bildirishnoma</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($readNotify as $readN)
                                    <tr>
                                        <td>
                                            {{$readN->data['notify']}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


