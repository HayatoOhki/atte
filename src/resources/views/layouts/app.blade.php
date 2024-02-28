<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Atte</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  @yield('css')
</head>

<body>
    <div class="flex-container">
        <header class="header">
            <div class="header__inner">
                <a class="header__logo" href="/">
                    <h1>Atte</h1>
                </a>
                <ul class="header__nav">
                    @if(Auth::check())
                        <li class="header__nav--item">
                            <a class="header__nav--link" href="/">ホーム</a>
                        </li>
                        <li class="header__nav--item">
                            <a class="header__nav--link" href="/attendance">日付一覧</a>
                        </li>
                        <li class="header__nav--item">
                            <form action="/logout" mrthod="POST">
                                @csrf
                                <input class="header__nav--button" type="submit" value="ログアウト">
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </header>
        
        <main>
            @yield('content')
        </main>
        
        <footer class="footer">
            <div class="footer__inner">
                  <div class="footer__logo">
                      <p>Atte,inc.</p>
                  </div>
            </div>
        </footer>
    </div>
</body>

</html>