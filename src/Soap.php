<?php
namespace Simplia\GhostingClient;

/**
 * Class Soap
 * @package Simplia\GhostingClient
 * @url http://api.controlpanel.cz/docs/
 * @method bool EmailDomainAdd(string $domain, $username = '')
 * @method array EmailGetDomainsList()
 * @method array EmailCreate(string $domain, string $mailbox, string $password, int $capacity)
 * @method bool EmailRemove(string $domain, string $mailbox)
 * @method array EmailGetList(string $domain)
 * @method bool EmailChangePassword(string $domain, string $mailbox, string $password)
 * @method bool EmailChangeCapacity(string $domain, string $mailbox, int $capacity)
 * @method bool EmailCreateRedirect(string $domain, string $mailbox, string $destinationEmailAddress, bool $isCopy)
 * @method bool EmailRemoveRedirect(string $domain, string $mailbox, string $destinationEmailAddress)
 * @method array EmailGetRedirectsList(string $domain, string $mailbox)
 * @method bool EmailSetCatchallMailbox(string $domain, string $destinationEmailAddress)
 * @method string EmailGetCatchallMailbox(string $domain)
 * @method bool EmailCreateSubdomain(string $domain, string $subDomain)
 * @method bool EmailRemoveSubdomain(string $domain, string $subDomain)
 */
class Soap extends \SoapClient {

}
