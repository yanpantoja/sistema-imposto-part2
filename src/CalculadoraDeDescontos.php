<?php

namespace Alura\DesignPattern;

use Alura\DesignPattern\Descontos\DescontoMaisDe500Reais;
use Alura\DesignPattern\Descontos\DescontoMaisde5Itens;
use Alura\DesignPattern\Descontos\SemDesconto;

class CalculadoraDeDescontos
{
    public function calculaDesconto(Orcamento $orcamento): float
    {
        $cadeiaDeDescontos = new DescontoMaisde5Itens(
            new DescontoMaisDe500Reais(
                new SemDesconto()
            )
        );

        $descontoCalculado = $cadeiaDeDescontos->calculaDesconto($orcamento);
        $logDesconto = new LogDesconto();
        $logDesconto->informar($descontoCalculado);
        
        return $descontoCalculado;
    }

}
