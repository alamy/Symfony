<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * A action é a classe em si, isso isola melhor as dependências e o domínio.
 * Portanto é preciso implementar o método __invoke nas herdeiras,
 * com os parâmetros da rota sendo também parêmetros do método.
 * Quanto ao retorno, __invoke deve retornar uma response, como toda action.
 *
 * Assim como as dependências de serviços podem ser declaradas no construtor.
 */
abstract class AbstractAction extends AbstractController
{
    /**
     * Retorna a lista de serviços dos quais esta action depende.
     *
     * Isto é extremamente importante para não cair no problema do servive locator.
     *
     * Desta forma, facilmente é possível também migrar para o ADR pattern.
     *
     * @return array
     */
    public static function getSubscribedServices()
    {
        return array_merge(parent::getSubscribedServices(), static::getExtraSubscribedServices());
    }

    /**
     * Retorna a lista de serviços adicionais dos quais esta action depende, da mesma notação que getSubscribedServices.
     * Ou seja, os serviços além daqueles que o Symfony traz por padrão em AbstractController::getSubscribedServices().
     *
     * Ex.: return [
     *     'meu_servico' => '?'.MeuServico::class,
     * ];
     *
     * Então, será possível usar $this->get('meu_servico').
     *
     * Este método só faz sentido ser usado caso não haja sobrecrita do getSubscribedServices.
     *
     * @return array
     */
    public static function getExtraSubscribedServices()
    {
        return [];
    }
}
