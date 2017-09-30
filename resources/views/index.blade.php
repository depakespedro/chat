<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title>ChatOnline</title>

    </head>
    <body>
        <div id="app" class="container">

            <div class="row-md-8">

                <div class="col-md-4">
                    <listmessages :messages="messages"></listmessages>
                </div>
                    <div class="col-md-4">
                        <login v-on:logged="initEcho" v-on:logout="logoutUser"></login><br>
                        <createmessage v-on:sendmessageevent="updateMessages"></createmessage><br>
                        <listusersonline :users="usersOnline"></listusersonline><br>
                    </div>
            </div>

        </div>
    </body>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
