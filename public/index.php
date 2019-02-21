<?php

use App\Kernel;
use Emprel\Ambiente\Bundle\Utils\Ambiente;
use Emprel\Ambiente\Bundle\Utils\Rede;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';

Ambiente::configurarVariaveisAmbiente(__DIR__.'/../.env');

if (Ambiente::isDebug()) {
    umask(0000);

    Debug::enable();
}

Rede::setTrustedProxies();

$kernel = new Kernel(Ambiente::getAmbiente(), Ambiente::isDebug());
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
