<DOCTYPE HTML>
    <html lang="ja">

    <head>
        <title>@yield('title')</title>
        <style>
            body {
                font-size: 16pt;
                color: #999;
                margin: 5px;
            }

            h1 {
                font-size: 30pt;
                text-align: right;
                color: #f6f6f6;
                margin: -20px 0px -30px 0px;
                letter-spacing: -4pt;
            }
        </style>
    </head>

    <body>
        <h1 style="color: green;">これは：layouts.componentParentのページに記載している情報</h1>
        <p style="color: red;">{{$message_title}}</p>
        <p style="color: blue;">{{$message}}</p>
        <div style="margin: 50px">
            <h2>ここには「layouts.each」ページの内容を「@each」で繰り返し表示している</h2>
            <ul>
                @each('layouts.each', $data, 'item')
            </ul>
        </div>
    </body>

    </html>