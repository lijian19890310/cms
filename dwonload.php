<?php   


$file=$_GET['file'];
if ($file) {   

    if (!file_exists($file)) { //检查文件是否存在   

        echo "can not find files!";   

        exit;   

    } else {   
	$filename=pathinfo($file,PATHINFO_BASENAME);
        // 输入文件标签   

        Header("Content-type: application/octet-stream"); //指定以下输出的字符将以下载文件形式保存在客户端   

        Header("Accept-Ranges: bytes");//指定下载的文件大小单位   

        Header("Accept-Length: " . filesize($file));//指定下载的文件大小   

        Header("Content-Disposition: attachment; filename=" . $filename); //指定下载的文件名.扩展名   

        $filess = fopen($file, "r"); // 打开文件   

        // 输出文件内容，除了下载文件编码之外该页面不能有任何其他输出   

        echo fread($filess, filesize($file));   

        fclose($filess);   

        exit; //防止读取下面的其他输出   

    }   

}   

  

  

  

?> 
