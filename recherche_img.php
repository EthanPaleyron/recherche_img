<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>jQuery.getJSON demo</title>
  <style>
    img {
      height: 100px;
      float: left;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>

  <div id="images"></div>

  <script>
    //"189692971@N05"
    //trouver toutes les photos d'un user en cliquant sur une de ses photos
    //id:"189692971@N05",
    (function () {
      let flickerAPI = "https://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
      $.getJSON(flickerAPI, {
        tags: "mont blanc",
        <?= isset($_GET["author"]) ? "id:'" . $_GET["author"] . "'," : ""; ?>
        tagmode: "any",//Indiquez si les éléments doivent comporter TOUS les tags (tagmode=all) ou N’IMPORTE QUEL tag (tagmode=any). Par défaut, les éléments doivent comporter TOUS les tags.
        format: "json"
      })
        .done(function (data) {
          $.each(data.items, function (i, item) {
            $(`<a href="./recherche_img/recherche_img.php?author=${item.author_id}" id="img${i}"><img src="${item.media.m}" alt="${item.title}"></a>`).appendTo("#images");
            if (i === 10) {
              return false;
            }
          });
        });
    })();

  </script>

</body>

</html>