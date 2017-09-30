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
                <tr><th><login v-on:logged="initEcho" v-on:logout="logoutUser" :userCurrent="userCurrent"></login></th></tr>
                <tr><th><listusersonline :users="usersOnline"></listusersonline></th></tr>
                <tr><th><createmessage v-on:sendmessageevent="updateMessages"></createmessage></th></tr>
                <tr><th><listmessages :messages="messages"></listmessages></th></tr>
            </table>

        </div>


    </body>

    <script src="{{ asset('/js/app.js') }}"></script>
</html>
