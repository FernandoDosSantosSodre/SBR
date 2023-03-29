<?php
    #Este arquivo contem todas as classes referentes ao cliente no sistema
    # Classe referente aos atributos do cliente
    class cliente{
        # Declação das variáveis
        public $id;
        public $statusConta;
        public $nome;
        public $telefone;
        private $email;
        private $senha;
        public $dataRes;
        public $gostos;
        # Fim da declaração das variáveis


        # Função resposável por atribuir valores para o e-mail do cliente
        public function emailSetter($a){
            $this->email = $a;
        }
        # Fim da função

        # Função resposável por atribuir valores para a senha do cliente
        public function passwordSetter($a){
            $this->senha = $a;
        }
        # Fim da função

    }
    # Fim da Classe


    # Classe referente ao endereço do cliente
    class endereco{
        # Declação das variáveis
        public $id;
        public $logradouro;
        public $numero;
        public $cep;
        public $bairro;
        public $uf;
        public $pais;
        # Fim da declaração das variáveis

        # Função resposável por atribuir valores para o endereço do cliente
        public function enderecoSetter($id, $cep, $num, $logradouro, $bairro, $uf, $pais){
            $this->id= $id;
            $this->logradouro= $logradouro;
            $this->bairro= $bairro;
            $this->uf= $uf;
            $this->numero= $num;
            $this->cep= $cep;
            $this->pais= $pais;
        }
        # Fim da função
    }
    # Fim da Classe
?>