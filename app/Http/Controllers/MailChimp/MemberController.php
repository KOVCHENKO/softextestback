<?php

namespace App\Http\Controllers\MailChimp;


use App\Database\Entities\MailChimp\MailChimpList;
use App\Database\Entities\MailChimp\MailChimpMember;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mailchimp\Mailchimp;

class MemberController extends Controller
{
    /**
     * @var \Mailchimp\Mailchimp
     */
    private $mailChimp;

    /**
     * MemberController constructor.
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     * @param \Mailchimp\Mailchimp $mailchimp
     */
    public function __construct(EntityManagerInterface $entityManager, Mailchimp $mailchimp)
    {
        parent::__construct($entityManager);

        $this->mailChimp = $mailchimp;
    }

    /**
     * Create MailChimp member.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request, $listId): JsonResponse
    {
        // Instantiate entity
        $member = new MailChimpMember($request->all());

        $list = $this->entityManager->getRepository(MailChimpList::class)->find($listId);
        $member->setMailChimpList($list);

        // Validate entity
        $validator = $this->getValidationFactory()->make($member->toMailChimpArray(), $member->getValidationRules());

        if ($validator->fails()) {
            // Return error response if validation failed
            return $this->errorResponse([
                'message' => 'Invalid data given',
                'errors' => $validator->errors()->toArray()
            ]);
        }

        try {

            // Save member into db
            $this->saveEntity($member);
            $mailChimpList = $member->getMailChimpList();

            // Save member into MailChimp
            $mailChimpResource = 'lists/'.$mailChimpList->getMailChimpId().'/members';
            $response = $this->mailChimp->post($mailChimpResource, $member->toMailChimpArray());

            // Set MailChimp id on the member and save member into db
            $this->saveEntity($member->setMailChimpId($response->get('id')));
        } catch (Exception $exception) {
            // Return error response if something goes wrong
            return $this->errorResponse(['message' => $exception->getMessage()]);
        }

        return $this->successfulResponse($member->toArray());
    }


    /**
     * Retrieve and return MailChimp member.
     *
     * @param string $memberId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $memberId): JsonResponse
    {
        $member = $this->entityManager->find(MailChimpMember::class, $memberId);

        if ($member === null) {
            return $this->errorResponse(
                ['message' => \sprintf('MailChimpList[%s] not found', $memberId)],
                404
            );
        }

        return $this->successfulResponse($member->toArray());
    }


    /**
     * Update MailChimp member.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $memberId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $memberId): JsonResponse
    {
        $member = $this->entityManager->getRepository(MailChimpMember::class)->find($memberId);

        if ($member === null) {
            return $this->errorResponse(
                ['message' => \sprintf('MailChimpMember[%s] not found', $member)],
                404
            );
        }

        // Update list properties
        $memberEntity = $member->fill($request->all());
        // Validate entity
        $validator = $this->getValidationFactory()->make($member->toMailChimpArray(), $member->getValidationRules());

        if ($validator->fails()) {
            // Return error response if validation failed
            return $this->errorResponse([
                'message' => 'Invalid data given',
                'errors' => $validator->errors()->toArray()
            ]);
        }

        try {
            // Update member into database
            $this->saveEntity($memberEntity);

            // Update member into MailChimp
            $emailHash = md5($member->getEmailAddress());
            $mailChimpResource = 'lists/'.$member->getMailChimpList()->getMailChimpId().'/members/'.$emailHash;

            $this->mailChimp->patch($mailChimpResource, $member->toMailChimpArray());
        } catch (Exception $exception) {
            return $this->errorResponse(['message' => $exception->getMessage()]);
        }

        return $this->successfulResponse($member->toArray());
    }


    /**
     * Delete MailChimp memeber
     *
     * @param string $memberId
     * @return JsonResponse
     */
    public function remove(string $memberId): JsonResponse
    {
        $member = $this->entityManager->getRepository(MailChimpMember::class)->find($memberId);

        if ($member === null) {
            return $this->errorResponse(
                ['message' => \sprintf('MailChimpMember[%s] not found', $member)],
                404
            );
        }

        try {
            // Remove member from database
            /** @var MailChimpMember $member */
            $this->removeEntity($member);
            // Remove member from MailChimp
            $emailHash = md5($member->getEmailAddress());
            $mailChimpResource = 'lists/'.$member->getMailChimpList()->getMailChimpId().'/members/'.$emailHash;
            $this->mailChimp->delete($mailChimpResource);
        } catch (Exception $exception) {
            return $this->errorResponse(['message' => $exception->getMessage()]);
        }

        return $this->successfulResponse([]);
    }



}
