<?php 
/* 

$ImgPath = "../images/new/";
$ImgThmbPath= "../images/new/thumb/";

$ImagesProcessor = new ImagesProcessor;
$ImageProcessed=$ImagesProcessor->ProcessImage($_FILES['uploadfile']['name'], $ImgPath, $ImgThmbPath, 220, 120);

*/
class FileProcessor{

function ImagesProcessor($FileName, $ImgPath, $ImgThmbPath, $newwidthb, $newwidth){

if($FileName==''){echo 'Processed without Image <br />';}
	else{
	// This is the temporary file created by PHP
		$extnssion=$_FILES['uploadfile']['type'];
		
		$$FileName=str_replace(' ', '_', $FileName);
		$RenameImage=str_replace(' ', '_', $_POST['model']).date("ymd").str_replace(' ', '_', $FileName);
	
	if($extnssion=='image/jpeg' || $extnssion=='image/png' ){$error=1; }else{$error=0;}
		if(!$error==1){ return (0);
		return;
		}
		else{
				$uploadedfile=$_FILES['uploadfile']['tmp_name'];
					if($extnssion=='image/jpeg'){
						$src = imagecreatefromjpeg($uploadedfile);
					}
					elseif($extnssion=='image/png'){
						$src = imagecreatefrompng($uploadedfile);
					}
					elseif($extnssion=='image/gif'){
						$src = imagecreatefromgif($uploadedfile);
					}
			list($width,$height)=getimagesize($uploadedfile);
		//$newwidthb=$ImgSize;
			$newheightb=($height/$width)*$newwidthb;
			$tmpb=imagecreatetruecolor($newwidthb,$newheightb); 
		
		//$newwidth=$ImgThumbSize;
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight); 
		
		// this line actually does the image resizing, copying from the original
		// image into the $tmp image
		imagecopyresampled($tmpb,$src,0,0,0,0,$newwidthb,$newheightb,$width,$height);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		
		// now write the resized image to disk. I have assumed that you want the
		// resized, uploaded image file to reside in the ./images subdirectory.
			$filenameb = $ImgPath.$RenameImage;
			$filename = $ImgThmbPath.$RenameImage;
		
		imagejpeg($tmpb,$filenameb,100);
		imagejpeg($tmp,$filename,100);
		imagedestroy($src);
		imagedestroy($tmpb); 
		imagedestroy($tmp); 
		// NOTE: PHP will clean up the temp file it created when the request
		// has completed.
		}

	}

return $RenameImage;
}

















}
?>