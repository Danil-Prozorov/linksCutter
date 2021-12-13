<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/style.css">
    </header>
    <body>
        <section class="content">
            <h1 class="content__titel">Сокращение ссылок</h1>
            <aside class="content__form-wrapper" id="form-workplace">
                <p class="content__hidden-text" id="hidden-text"></p>
                <form action="{{route('link.store')}}" class="content__form" onsubmit="return createShortLink(this)" method="POST">
                    @csrf
                    <input type="text" required placeholder="URL" name="url" id="url">
                    <button type="submit" class="content__submit">Сократить</button>
                </form>
            </aside>
        </section>
    <script src="{{asset("JS/script.js")}}"></script>
    </body>
</html>
