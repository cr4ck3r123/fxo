<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Upload
 *
 * @author fernando.oliveira
 */


class Upload {

    private $name; //name do input que o usuário colocará a imagem
    private $pasta; //nome da pasta que receberá a imagem
    private $nome_substituto; //nome que irá sobrescrever o nome da imagem atual
    private $permite; //Tipo de imagem permitida, ex:png,jpg,gif,pjpeg,jpeg

    public function uploadImagem($name_imagem, $pasta_destino, $nome_principal, $tipo_imagem) {
        if (!empty($_FILES[$name_imagem]['tmp_name'])) {
            //aqui vai entrar o comando
            $this->name = $_FILES[$name_imagem];
            $this->pasta = $pasta_destino;
            $nome = $this->name['name'];
            $extencao = end(explode(".", $this->name['name']));
            $this->nome_substituto = $nome_principal;
            $upload_arquivo = $this->pasta . $this->nome_substituto . "." . $extencao;
            foreach ($tipo_permitido as $key => $tipo) {
                $this->permite[] = $tipo;
            }
            if (!empty($nome) and in_array($this->name['type'], $this->permite)) {
                if (move_uploaded_file($this->name['tmp_name'], $upload_arquivo)) {
                    echo "imagem enviada";
                } else {
                    echo "erro ao enviar a imagem";
                }
            } else {
                //faça algo caso não seja a extensão permitida
                echo "formato de imagem não aceito pelo sistema.";
            }
        }
    }

}
