<?php

namespace App\model;

class PasswordModel
{
    public static function passwordOpen($conexao, $cod_turma)
    {
        $params = array('cod_turma' => $cod_turma);

        $query = 'SELECT * FROM senha Where cod_turma = :cod_turma and situacao = "DISPONIVEL" LIMIT 1';
        
        $con = \validConnection::isValidConnection($conexao, $query, $params);

        return $con;
    }

    public static function userPassword($conexao, $data)
    {

        $params = array('cod_aluno' => $data->cod_aluno );

        $query = 'SELECT * FROM senha Where cod_aluno = :cod_aluno';
        $con = \validConnection::isValidConnection($conexao, $query, $params);

        return $con;

    }
    
    public static function alterarPassword($conexao, $data)
    {
        $params = array(
            'cod_aluno' => $data->cod_aluno, 'situacao' => $data->situacao, 'cod_senha' => $data->cod_senha
        );

        $query ="UPDATE senha SET cod_aluno = :cod_aluno,situacao = :situacao WHERE cod_senha = :cod_senha";
        $con = \validConnection::isValidConnection($conexao, $query, $params);
        return $con;
    }

}