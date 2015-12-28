<?php
namespace Simplia\GhostingClient;

/**
 * Class Soap
 * @package Simplia\GhostingClient
 * @url http://api.controlpanel.cz/docs/
 * @method bool EmailDomainAdd(string $domain, $username)
 * @method array EmailGetDomainsList()
 * @method array EmailCreate(string $domain, string $mailbox, string $password, int $capacity)
 * @method bool EmailRemove(string $domain, string $mailbox)
 * @method array EmailGetList(string $domain)
 * @method bool EmailChangePassword(string $domain, string $mailbox, string $password)
 * @method EmailChangeCapacity(string $domain, string $mailbox, int $capacity)
 * @method EmailCreateRedirect(string $domain, string $mailbox, string $destinationEmailAddress, bool $isCopy)
 * @method EmailRemoveRedirect(string $domain, string $mailbox, string $destinationEmailAddress)
 * @method EmailGetRedirectsList(string $domain, string $mailbox)
 * @method EmailSetCatchallMailbox(string $domain, string $destinationEmailAddress)
 * @method EmailGetCatchallMailbox(string $domain)
 * @method EmailCreateSubdomain(string $domain, string $subDomain)
 * @method EmailRemoveSubdomain(string $domain, string $subDomain)
 */
class Soap extends \SoapClient {

}
