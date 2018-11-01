<?php

namespace Tests\App\Functional\Http\Controllers\MailChimp;


use App\Database\Entities\MailChimp\MailChimpList;
use App\Database\Entities\MailChimp\MailChimpMember;
use Tests\App\TestCases\MailChimp\ListTestCase;

class MemberControllerTest extends ListTestCase
{

    /**
     * Test application creates successfully member in the list and returns it back with id from MailChimp.
     *
     * @return void
     */
    public function testCreateMemberSuccessfully(): void
    {
        // Create new List instance for Member purposes
        $this->post('/mailchimp/lists', static::$listData);
        $newListContent = \json_decode($this->response->getContent(), true);

        // Send create
        $this->post('/mailchimp/members/'.$newListContent['list_id'], static::$memberData);

        $content = \json_decode($this->response->getContent(), true);

        $this->assertResponseOk();
        $this->seeJson(static::$memberData);
        self::assertArrayHasKey('mail_chimp_id', $content);
        self::assertNotNull($content['mail_chimp_id']);
    }


    /**
     * Test application returns empty successful response when removing existing member.
     *
     * @return void
     */
    public function testRemoveListSuccessfully(): void
    {
        // Create new List instance
        $this->post('/mailchimp/lists', static::$listData);
        $list = \json_decode($this->response->content(), true);

        // Create new List Member instance
        $this->post('/mailchimp/members/'.$list['list_id'], static::$memberData);
        $member = \json_decode($this->response->content(), true);

        $this->delete(\sprintf('/mailchimp/members/%s', $member['member_id']));

        $this->assertResponseOk();
        self::assertEmpty(\json_decode($this->response->content(), true));
    }


    /**
     * Test application returns error response when list member not found.
     *
     * @return void
     */
    public function testShowMemberNotFoundException(): void
    {
        $this->get('/mailchimp/members/invalid-member-id');


        $content = \json_decode($this->response->content(), true);

        $this->assertResponseStatus(404);
        self::assertArrayHasKey('message', $content);
        self::assertEquals(\sprintf('MailChimpMember[%s] not found', 'invalid-member-id'), $content['message']);
    }


    /**
     * Test application returns successful response with member data when requesting existing list.
     *
     * @return void
     */
    public function testShowMemberSuccessfully(): void
    {
        // Create new List instance
        $list = new MailChimpList(static::$listData);

        // Create new member instance
        $member = new MailChimpMember(static::$memberData);
        $member->setMailChimpList($list);

        // Persist member instance
        $this->entityManager->persist($member);
        $this->entityManager->flush();

        $this->get(\sprintf('/mailchimp/members/%s', $member->getId()));
        $content = \json_decode($this->response->content(), true);

        $this->assertResponseOk();

        foreach (static::$memberData as $key => $value) {
            self::assertArrayHasKey($key, $content);
            self::assertEquals($value, $content[$key]);
        }
    }


    /**
     * Member can be updated.
     *
     * @return void
     */
    public function testUpdateMemberSuccessfully(): void
    {
        // Create new List instance
        $this->post('/mailchimp/lists', static::$listData);
        $list = \json_decode($this->response->content(), true);

        // Create new Member instance
        $this->post('/mailchimp/members/'.$list['list_id'], static::$memberData);
        $member = \json_decode($this->response->content(), true);

        $this->put(\sprintf('/mailchimp/members/%s', $member['member_id']));
        $content = \json_decode($this->response->content(), true);

        $this->assertResponseOk();

        foreach (\array_keys(static::$memberData) as $key) {
            self::assertArrayHasKey($key, $content);
        }
    }




}
