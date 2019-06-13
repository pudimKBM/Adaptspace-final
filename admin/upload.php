
<?php
session_start();
  
  
// Conex�o com o banco de dados
$conn = @mysql_connect("localhost", "root", "root") or die ("Problemas na conex�o.");
$db = @mysql_select_db("dbadapt", $conn) or die ("Problemas na conex�o");
 
// Se o usu�rio clicou no bot�o cadastrar efetua as a��es
if (isset($_POST['cadastrar'])) {
	
	// Recupera os dados dos campos
	$id = $_SESSION['id'];
	$foto = $_FILES["foto"];
	
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		// Largura m�xima em pixels
		$largura = 5000;
		// Altura m�xima em pixels
		$altura = 5000;
		// Tamanho m�ximo do arquivo em bytes
		$tamanho = 2000000;
 
		$error = array();
 
    	// Verifica se o arquivo � uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso n�o � uma imagem.";
   	 	} 
	
		// Pega as dimens�es da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem � maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem n�o deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem � maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem n�o deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem � maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no m�ximo ".$tamanho." bytes";
		}
 
		// Se n�o houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extens�o da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome �nico para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficar� a imagem
        	$caminho_imagem = "img/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$sql = mysql_query("INSERT INTO ads VALUES ('', '".$nome_imagem."',  , '".$id."')");
		
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "Voc� foi cadastrado com sucesso.";
			}
		}else {
		    echo "<h1>erro</h1>";
		}
	
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
	}
}
?>