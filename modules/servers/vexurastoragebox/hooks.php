<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Storagebox\Module;
use Vexura\Whmcs\Storagebox\Registrar;
use Vexura\Whmcs\Storagebox\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('storagebox', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('storagebox', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('storagebox'); });
