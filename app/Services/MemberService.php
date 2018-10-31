<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use Mailchimp\Mailchimp;

class MemberService
{

    /**
     * @var Mailchimp
     */
    private $mailChimp;

    /**
     * MemberService constructor.
     * @param EntityManagerInterface $entityManager
     * @param Mailchimp $mailchimp
     */
    public function __construct(EntityManagerInterface $entityManager, Mailchimp $mailchimp)
    {
        $this->mailChimp = $mailchimp;
    }

    public function create($member)
    {
        try {
            // Save member into db
            $this->saveEntity($member);
            // Save member into MailChimp
            $response = $this->mailChimp->post('lists/01cdd1621f/members', $member->toMailChimpArray());

            dd($response);
            // Set MailChimp id on the member and save member into db
            $this->saveEntity($member->setMailChimpId($response->get('id')));
        } catch (Exception $exception) {
            // Return error response if something goes wrong
            return $this->errorResponse(['message' => $exception->getMessage()]);
        }

        return $this->successfulResponse($member->toArray());
    }
}