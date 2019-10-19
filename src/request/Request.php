<?php

namespace Viking\Request;

class Request {

    private $parametrosDaRequisicao;



    public function __construct($arrParametrosRequisicao = [])
    {
        $this->receberParametrosDaRequisicao($arrParametrosRequisicao);
    }

    public function receberParametrosDaRequisicao(array $arrParametrosRequisicao)
    {
        $this->parametrosDaRequisicao = $arrParametrosRequisicao;
    }

    /**
     * Função que verifica se foi enviado um determinado parametro ($propriedade) na requisicao
     *
     * @param string $propriedade
     * @return boolean
     */
    public function has(string $parametro)
    {
        return in_array($parametro, array_keys($this->parametrosDaRequisicao));
    }

    public function get(string $parametro)
    {
        if ($this->has($parametro)) {
            return $this->parametrosDaRequisicao[$parametro];
        } else {
            throw new \Exception("O parâmetro $parametro não existe.");
        }
    }
}