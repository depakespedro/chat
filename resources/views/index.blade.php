<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app">
            <table cellspacing="0">
                <tr>
                    <th><listmessages :messages="messages"></listmessages></th>
                    <th><createmessage v-on:sendmessageevent="updateMessages"></createmessage></th>
                    <th><listusersonline :users="usersOnline"></listusersonline></th>
                    <th><login></login></th>
                </tr>
            </table>

        </div>


    </body>

    <script src="{{ asset('/js/app.js') }}"></script>
</html>