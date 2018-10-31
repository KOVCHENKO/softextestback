<?php

namespace App\Http\Controllers\MailChimp;


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
     * @var Mailchimp
     */
    private $mailChimp;

    /**
     * MemberController constructor.
     * @param EntityManagerInterface $entityManager
     * @param Mailchimp $mailchimp
     */
    public function __construct(EntityManagerInterface $entityManager, Mailchimp $mailchimp)
    {
        parent::__construct($entityManager);

        $this->mailChimp = $mailchimp;
    }

    /**
     * Create MailChimp list.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request, $listId): JsonResponse
    {
        // Instantiate entity
        $member = new MailChimpMember($request->all());
        $member->setListId($listId);

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