<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Document</title>
  </head>

  <body>
    <p>Hello</p>
    <p>World</p>

    <p>develop</p>

    <button id="hide">hide</button>
    <button id="show">show</button>

    <script>
      const count = $("p").length;
      console.log(count);

      $("#hide").click(() => {
        $("p").hide();
      });

      $("#show").click(() => {
        $("p").show();
      });
    </script>

    <script src="./js/jquery.js"></script>
  </body>
</html>
