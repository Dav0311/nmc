<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <form action="{{ url('/honeypost') }}"  method="POST">
        @csrf
        @honeypot
        
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        
        <div class="mt-4">
            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
        </div>
        <div class="mt-4">
            <button id="spam" type="button">Spam</button>
        </div>
    </form>

    <script type="text/javascript">
        // Function to fill the form
        function spamBotFill() {
            $("input[name='email']").val("ochwodavid@gmail.com");
            $("input[name='password']").val("pass1234");
            $("input[name='my_name_UW169eXCn3pdb2Yh']").val("vy8cc9chjs");
        }

        // Attach event listener to the button
        $(document).ready(function() {
            $("#spam").on("click", spamBotFill);
        });
    </script>
</body>
</html>
