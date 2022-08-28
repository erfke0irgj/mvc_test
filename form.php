<!-- View section handles the data presentation of the data got from the Controller
Not concerned about how to handle the final presentation of the data but how to present it (aesthetically) 
Sends the presentation back to the Controller and then to the user
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<style>
    button {
        display: block;
    }

    .container {
        margin-left: 2em;
    }

</style>
</head>
<body>

<div class="container">
    <!-- 1 Sending the requested data to Controller::save() -->
    <form action="/save" method="post">        
    
        <label for="item1">Item 1: </label>
        <input name="item1" type="text" />
        <br><br>

        <label for="item2">Item 2: </label>
        <input name="item2" type="text" />
        <br><br>
        
        <button type="submit"><strong>Enviar</strong></button>
    </form>
</div>

</body>
</html>