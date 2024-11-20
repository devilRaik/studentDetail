<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="lib/jquery/jquery-3.7.1.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="/lib/jquery/jquery.bootstrap-growl.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Auto hide</h1>
    <button class="btn btn-primary" onclick="bootstrapAlert()">Click Here</button>
</div>
    <script>
        function bootstrapAlert(){
            $.bootstrapGrowl("This is success message!");
        }
    </script>
</body>
</html>