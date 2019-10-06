<?php
class ImageUploader extends API_Controller{

    public function __construct() {
        parent::__construct();
    }

    public function upload_image_post()
    {
        $data = $_POST['image'];
        $name = $_POST['name'];

        list($type, $data) = explode(';', $data);
        list($base, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $imageName = $name.'_'.time().'.png';
        file_put_contents('upload/images/'.$imageName, $data);
        echo $imageName;
    }
}
?>