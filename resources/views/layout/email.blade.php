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
	<meta name="description" content="Official email from User Portal System.">
	<style>
	 /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}main{display:block}h1{font-size:2em;margin:.67em 0}hr{box-sizing:content-box;height:0;overflow:visible}pre{font-family:monospace,monospace;font-size:1em}a{background-color:transparent}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}code,kbd,samp{font-family:monospace,monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-0.25em}sup{top:-0.5em}img{border-style:none}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;line-height:1.15;margin:0}button,input{overflow:visible}button,select{text-transform:none}button,[type=button],[type=reset],[type=submit]{-webkit-appearance:button}button::-moz-focus-inner,[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner{border-style:none;padding:0}button:-moz-focusring,[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring{outline:1px dotted ButtonText}fieldset{padding:.35em .75em .625em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{vertical-align:baseline}textarea{overflow:auto}[type=checkbox],[type=radio]{box-sizing:border-box;padding:0}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}details{display:block}summary{display:list-item}template{display:none}[hidden]{display:none}/*!
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/html{font-size:16px}@font-face{font-family:Montserrat;src:url("http://127.0.0.1:8000/assets/fonts/montserrat/Montserrat-Bold.otf");font-weight:700;font-style:normal}@font-face{font-family:Roboto;src:url("http://127.0.0.1:8000/assets/fonts/roboto/Roboto-Regular.ttf");font-weight:normal;font-style:normal}@font-face{font-family:Roboto;src:url("http://127.0.0.1:8000/assets/fonts/roboto/Roboto-Medium.ttf");font-weight:500;font-style:normal}header{display:flex;align-items:center;justify-content:center;margin-top:3em}@media only screen and (min-width: 1024px){header{justify-content:flex-start}body.email header{justify-content:center}}header .logo div{width:35px;height:35px;border-radius:50%;display:inline-block}header .logo div:nth-of-type(1){background-color:#505cdb}header .logo div:nth-of-type(2){background-color:#9cabf79e;margin-left:-20px}header h1{font-family:Montserrat;font-weight:700;color:#505cdb;font-size:1.3rem;margin-left:.5em;text-transform:uppercase}@media only screen and (min-width: 1024px){header .logo{margin-left:5em}body.email header .logo{margin-left:initial}header .logo div:nth-of-type(1){background-color:#fff}body.email header .logo div:nth-of-type(1){background-color:#505cdb}header h1{color:#fff}body.email header h1{color:#505cdb}}main{width:calc((10 / 12) * 100%);margin:0 auto;font-family:Roboto;color:#3a3a3f;text-align:center;min-height:65vh}@media only screen and (min-width: 1024px){main{width:calc((4 / 12) * 100%);margin-left:calc((1 / 12) * 100%);text-align:left}body.email main{margin:0 auto;text-align:center}}main h2{font-family:Montserrat;font-weight:700;color:#3a3a3f;font-size:1.5rem;margin:2em auto;line-height:1.5em}@media only screen and (min-width: 1024px){main h2{margin:3em 0 1.5em;font-size:2.5rem;width:90%}body.email main h2{margin-top:2em;width:initial}}main h3{font-size:1.4em;line-height:1.5;margin:0}@media only screen and (min-width: 1024px){main h3{font-size:1.6em}}main p{line-height:1.5;margin-bottom:1.5em}main .notif{font-weight:500}main form ul{list-style:none;padding:0}main form ul .error{color:#d01b35;font-size:.85em;margin-top:.7em}main form ul .forgot-password-link{margin-top:1em}main form ul .forgot-password-link a{color:#747477}main form ul li:nth-of-type(1) label{margin-top:0}main form ul li label{display:block;margin:2em auto 1em}main form ul li input[type=text],main form ul li input[type=password]{color:#747477;border:none;border-bottom:1px solid #3a3a3f;width:80%;text-align:center;padding:.3em 0}@media only screen and (min-width: 1024px){main form ul li input[type=text],main form ul li input[type=password]{width:70%;text-align:left}}main .show-icon{display:none}main .show-icon,main .hide-icon{position:relative;cursor:pointer}main .show-icon svg,main .hide-icon svg{background-color:#fff;position:absolute;width:20px;fill:#747477;right:12%;transform:translate(0, -26px)}@media only screen and (min-width: 1024px){main .show-icon svg,main .hide-icon svg{right:31.5%}}.button{display:inline-block;line-height:1;border:none;border-radius:3em;padding:.6em 3em;min-width:16em;box-sizing:border-box;cursor:pointer;transition:.3s cubic-bezier(0.83, 0, 0.17, 1);text-decoration:none}.button.primary{background-color:#505cdb;border:1px solid #505cdb;color:#fff}.button.primary:hover{background-color:#414dc6;border-color:#414dc6}.button.secondary{background-color:#fff;border:1px solid #505cdb;color:#505cdb}.button.secondary:hover{background-color:#414dc6;border-color:#414dc6;color:#fff}@media only screen and (min-width: 1024px){.button{min-width:initial}}.button-group{margin-top:3em}form .button-group span,body.email .button-group span{display:block}form .button-group span:nth-of-type(1),body.email .button-group span:nth-of-type(1){margin-bottom:1em}.button-group.home span{display:block}.button-group.home span:nth-of-type(1),.button-group.home span:nth-of-type(2){display:inline-block;margin:3em 1em 7em}.button-group.home span:nth-of-type(1) a,.button-group.home span:nth-of-type(1) input[type=submit],.button-group.home span:nth-of-type(2) a,.button-group.home span:nth-of-type(2) input[type=submit]{color:#747477;text-decoration:underline;background-color:transparent;border:none;cursor:pointer}@media only screen and (min-width: 1024px){form .button-group,body.email .button-group{margin-top:3em}form .button-group span,body.email .button-group span{display:inline-block}form .button-group span:nth-of-type(1),body.email .button-group span:nth-of-type(1){margin-bottom:intial;margin-right:.5em}.button-group.home span:nth-of-type(1){margin-left:0}.button-group.home span:nth-of-type(2){margin-left:1em}.button-group.home span:nth-of-type(1),.button-group.home span:nth-of-type(2){margin-top:5em;margin-bottom:5em}}.register-direction,.login-direction{margin:3em auto 0}.register-direction span,.login-direction span{display:block}.register-direction span:nth-of-type(1),.login-direction span:nth-of-type(1){margin-bottom:.5em}.register-direction span a,.login-direction span a{color:inherit}footer{margin-top:5em;font-family:Roboto;text-align:center;color:#a5a5a7;padding-bottom:2em}footer span{display:block;font-size:.85rem}footer span:nth-of-type(1){margin-bottom:.5em}footer span a{color:inherit}/*# sourceMappingURL=email.css.map */
	</style>
    </head>

    <body class="email">
        <header>
            <div class="logo">
                <div></div>
                <div></div>
            </div>
            <h1>User Portal System</h1>
        </header>
        
        <main>
            <h2>{{ $subject }}</h2>
            @yield('content')
        </main>

        <footer>
            <span>Copyright 2020 Zain Alwan Wima Irfani</span>
            <span>UI/UX concept was designed by <a target="_blank" href="https://www.freepik.com/free-vector/log-landing-page-digital-design_5458477.htm">Freepik</a></span>
        </footer>
    </body>
</html>
