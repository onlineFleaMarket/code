<html>
<head>
<title>�ļ��ϴ�</title>
</head>
<body>
<? 
	//'����ǰ�����ں�ʱ��תΪ�ļ���
	function makefilename() {
		// ��ȡ��ǰϵͳʱ�䣬�����ļ���
		$curtime = getdate();
		$filename =$curtime['year'] . $curtime['mon'] . $curtime['mday'] . $curtime['hours'] . $curtime['minutes'] . $curtime['seconds'] . ".jpeg";

		Return $filename;
	}


	// ����ϴ��ļ���Ŀ¼
	$upload_dir = getcwd() . "\\images\\";
	// ���Ŀ¼�����ڣ��򴴽�
	if(!is_dir($upload_dir))
		mkdir($upload_dir);
	$newfilename = makefilename();
	$newfile = $upload_dir . $newfilename;
	if(file_exists($_FILES['file1']['tmp_name'])) {
		move_uploaded_file($_FILES['file1']['tmp_name'], $newfile);
	}
	else {
		echo("error");
	}
/*	echo("�ͻ����ļ�����" .	$_FILES['file1']['name'] . "<BR>");
	echo("�ļ����ͣ�" . $_FILES['file1']['type'] . "<BR>");	
	echo("�ļ���С��" . $_FILES['file1']['size'] . "<BR>");	
	echo("����������ʱ�ļ�����" . $_FILES['file1']['tmp_name'] . "<BR>");
//	echo(	$_FILES['file1']['error'] . "<BR>");
	echo("�ϴ����µ��ļ�����" . $newfile . "<BR>");
	//���ļ���Ϣ���������ֶ�*/
	echo("<SCRIPT>parent.document.form1.goodsimage.value='".$newfilename."'</SCRIPT>");
	echo("<font style='font-family: ����; font-size: 9pt'>ͼƬ�ϴ��ɹ� [ <a href=# onclick=history.go(-1)>�޸�ͼƬ</a> ]</font>");
?>
</body>
</html>
