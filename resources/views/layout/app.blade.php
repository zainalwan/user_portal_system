<!--
     |--------------------------------------------------------------------------
     | LICENSE
     |--------------------------------------------------------------------------
     | Code that written below is belong to Zain Alwan Wima Irfani. You may
     | not use, share, modify, and study without the author's permission
     | (zainalwan4@gmail.com).
-->

<html>
    <head>
	<title>User Portal System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Zain Alwan Wima Irfani">
	<meta name="description" content="Portal system to authenticate users.">
	<link rel="stylesheet" href="/assets/css/app.css">
    </head>

    <body>
        <header>
            <div class="logo">
                <div></div>
                <div></div>
            </div>
            <h1>User Portal System</h1>
        </header>
        
        <main>
            <h2>{{ $title }}</h2>
            @yield('content')
        </main>

        <footer>
            <span>Copyright 2020 Zain Alwan Wima Irfani</span>
            <span>UI/UX concept was designed by <a target="_blank" href="https://www.freepik.com/free-vector/log-landing-page-digital-design_5458477.htm">Freepik</a></span>
        </footer>

	<script src="/assets/js/script.js"></script>
    </body>
</html>
