<form action="./image_upload_received" name="form1" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

    <div class="upload_image_container">
        <label class="image_select_icon" id="image0">
            <input type="file" id="select_file0" accept="image/jpeg, image/gif, image/png" name="upfile[]"
                multiple="multiple" hidden>
            <img src="./image/image_select.png">
            <p>画像を選択</p>
            <a href="javascript:void(0)" onclick="clearValue('select_file0')" class="invisible_container"
                id="delete_button0">取り消し</a>
        </label>
        <div class="upload_preview_container">
            <div class="preview0"></div>
        </div>
    </div>
    <div class="upload_image_container invisible_container">
        <label class="image_select_icon" id="image1">
            <input type="file" id="select_file1" accept="image/jpeg, image/gif, image/png" name="upfile[]"
                multiple="multiple" hidden>
            <img src="./image/image_select.png">
            <p>画像を選択</p>
            <a href="javascript:void(0)" onclick="clearValue('select_file1')" class="invisible_container"
                id="delete_button1">取り消し</a>
        </label>
        <div class="upload_preview_container">
            <div class="preview1"></div>
        </div>
    </div>
    <div class="upload_image_container invisible_container">
        <label class="image_select_icon" id="image2">
            <input type="file" id="select_file2" accept="image/jpeg, image/gif, image/png" name="upfile[]"
                multiple="multiple" hidden>
            <img src="./image/image_select.png">
            <p>画像を選択</p>
            <a href="javascript:void(0)" onclick="clearValue('select_file2')" class="invisible_container"
                id="delete_button2">取り消し</a>
        </label>
        <div class="upload_preview_container">
            <div class="preview2"></div>
        </div>
    </div>
    <div class="upload_image_container invisible_container">
        <label class="image_select_icon" id="image3">
            <input type="file" id="select_file3" accept="image/jpeg, image/gif, image/png" name="upfile[]"
                multiple="multiple" hidden>
            <img src="./image/image_select.png">
            <p>画像を選択</p>
            <a href="javascript:void(0)" onclick="clearValue('select_file3')" class="invisible_container"
                id="delete_button3">取り消し</a>
        </label>
        <div class="upload_preview_container">
            <div class="preview3"></div>
        </div>
    </div>

    <?php
    $ua = $_SERVER["HTTP_USER_AGENT"];
    if( preg_match( "/Android/", $ua) && preg_match( "/Mobile/", $ua) ){
        print "
            <label class=\"image_select_icon\">
                <a href=\"javascript:void(0)\" onclick=\"addImage()\"><img src=\"./image/plus_icon.png\">追加する</a>
            </label>
        ";
    }
    ?>

    <a href="javascript:void(0)" onclick="input_check()">アップロードする</a><br>
</form>