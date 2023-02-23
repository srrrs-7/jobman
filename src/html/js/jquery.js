$(function () {
  $("form").on("change", 'input[type="file"]', function (evt) {
    var files = evt.target.files;

    //何個目のinput type fileか？
    var select_id = $(this).attr("id");
    var id = select_id.slice(-1);

    //対応するプレビュー領域
    var prev_name = ".preview" + id;
    var $preview = $(prev_name);

    //既存のプレビューを削除
    $preview.empty();

    for (var i = 0, f; (f = files[i]); i++) {
      // Only process image files.
      if (!f.type.match("image.*")) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function (theFile) {
        return function (e) {
          //.prevewの領域の中にロードした画像を表示するimageタグを追加
          $preview.append(
            $("<img>").attr({
              src: e.target.result,
              width: "100px",
              class: "preview",
              title: theFile.name,
            })
          );
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }

    //1枚以上選択されていたら取り消しボタンを出す、0枚だったら出さない
    if (files.length > 0) {
      $("#delete_button" + id).removeClass("invisible_container");
    }
  });
});

function clearValue(id) {
  var id_num = id.slice(-1);
  $(".preview" + id_num).empty();
  $("#" + id).replaceWith(
    '<input type="file" id="' +
      id +
      '" accept="image/jpeg, image/gif, image/png" name="upfile[]" multiple="multiple" hidden>'
  );
  //$("#"+id).replaceWith($("#"+id).clone(true));
  //console.log( $("#"+id).attr('accept') );
  $("#delete_button" + id_num).addClass("invisible_container");
}

function addImage() {
  var remove_flg = 0;
  $(".upload_image_container").each(function () {
    var regex = /invisible_container/;
    if (regex.test($(this).attr("class")) && remove_flg == 0) {
      $(this).removeClass("invisible_container");
      remove_flg = 1;
    }
  });
}
