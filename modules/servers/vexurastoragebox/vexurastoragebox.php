<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Storagebox\Module;
use Vexura\Whmcs\Storagebox\Registrar;
use Vexura\Whmcs\Storagebox\Automation;

/** Storagebox: WHMCS MetaData callback. */
function vexurastoragebox_MetaData(): array
{
    return ['DisplayName' => 'Vexura · Storagebox', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** Storagebox: WHMCS ConfigOptions callback. */
function vexurastoragebox_ConfigOptions(): array
{
    return Module::config('storagebox');
}

/** Storagebox: WHMCS TestConnection callback. */
function vexurastoragebox_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** Storagebox: WHMCS ClientArea callback. */
function vexurastoragebox_ClientArea(array $params): array
{
    return Module::clientArea('storagebox', $params);
}

/** Storagebox: WHMCS AdminCustomButtonArray callback. */
function vexurastoragebox_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** Storagebox: WHMCS CreateAccount callback. */
function vexurastoragebox_CreateAccount(array $params): string
{
    return Module::run('storagebox', 'create', $params);
}

/** Storagebox: WHMCS RefreshStatus callback. */
function vexurastoragebox_RefreshStatus(array $params): string
{
    return Module::run('storagebox', 'create', $params);
}

/** Storagebox: WHMCS SyncPaidInvoices callback. */
function vexurastoragebox_SyncPaidInvoices(array $params): string
{
    return Module::run('storagebox', 'sync', $params);
}

/** Storagebox: WHMCS TerminateAccount callback. */
function vexurastoragebox_TerminateAccount(array $params): string
{
    return Module::run('storagebox', 'terminate', $params);
}

/** Storagebox: WHMCS SuspendAccount callback. */
function vexurastoragebox_SuspendAccount(array $params): string
{
    return Module::run('storagebox', 'suspend', $params);
}

/** Storagebox: WHMCS UnsuspendAccount callback. */
function vexurastoragebox_UnsuspendAccount(array $params): string
{
    return Module::run('storagebox', 'unsuspend', $params);
}
