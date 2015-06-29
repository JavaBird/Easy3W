<?php
	$file_dir = Yii::getPathOfAlias('application.assets').'/upload/';
	if (! file_exists ( $file_dir . $fileName )) {    
	    echo "文件找不到";    
	    exit ();    

    }else{

    	header('Accept-Ranges: bytes');
		header('Accept-Length: ' . filesize($file_dir.$fileName));
		
		header('Content-Transfer-Encoding: binary');
		header('Content-type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . $fileOldName);
		header('Content-Type: application/octet-stream; name=' . $fileOldName);

    	//打开文件    
	    $file = fopen ( $file_dir . $fileName, "r" );    
	     
	    echo fread ( $file, filesize ( $file_dir . $fileName ) );    
	    fclose ( $file );    
	    exit ();    

    }  

























?>