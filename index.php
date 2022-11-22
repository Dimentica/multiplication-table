<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$primesController	= new \MultiTables\Modules\Table\Primes\Controller\Primes();

$primesController->display();