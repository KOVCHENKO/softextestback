<?php

namespace App\Services;

use App\Database\Entities\MailChimp\MailChimpList;
use App\Database\Entities\MailChimp\MailChimpMember;
use Doctrine\ORM\EntityManagerInterface;
use Mailchimp\Mailchimp;

class MemberService
{
    /**
     * @var \Mailchimp\Mailchimp
     */
    private $mailChimp;

    /**
     * MemberService constructor.
     * @param Mailchimp $mailchimp
     */
    public function __construct(Mailchimp $mailchimp)
    {
        $this->mailChimp = $mailchimp;
    }

    /**
     * Save member into MailChimp
     * @param MailChimpList $mailChimpList
     * @param MailChimpMember $member
     * @return \Illuminate\Support\Collection
     */
    public function saveInMailChimp(MailChimpList $mailChimpList, MailChimpMember $member)
    {
        $mailChimpResource = 'lists/' . $mailChimpList->getMailChimpId() . '/members';
        return $this->mailChimp->post($mailChimpResource, $member->toMailChimpArray());
    }

    /**
     * Update member into MailChimp
     * @param MailChimpMember $member
     */
    public function updateInMailChimp(MailChimpMember $member)
    {
        // Api entity is updated using email in lower case and md5
        $emailHash = md5($member->getEmailAddress());
        $mailChimpResource = 'lists/' . $member->getMailChimpList()->getMailChimpId() . '/members/' . $emailHash;

        $this->mailChimp->patch($mailChimpResource, $member->toMailChimpArray());
    }

    public function deleteInMailChimp(MailChimpMember $member)
    {
        $emailHash = md5($member->getEmailAddress());
        $mailChimpResource = 'lists/' . $member->getMailChimpList()->getMailChimpId() . '/members/' . $emailHash;
        $this->mailChimp->delete($mailChimpResource);
    }
}
