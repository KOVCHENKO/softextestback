<?php

namespace App\Database\Entities\MailChimp;

use Doctrine\ORM\Mapping as ORM;
use EoneoPay\Utils\Str;

/**
 * @ORM\Entity()
 */
class MailChimpMember extends MailChimpEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Database\Entities\MailChimp\MailChimpList", fetch="EAGER")
     * @ORM\JoinColumn(name="list_id", referencedColumnName="id")
     */
    private $mailChimpList;

    /**
     * @ORM\Id()
     * @ORM\Column(name="id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     *
     * @var string
     */
    private $memberId;

    /**
     * @ORM\Column(name="email_address", type="string")
     *
     * @var string
     */
    private $emailAddress;

    /**
     * @ORM\Column(name="list_id", type="string")
     *
     * @var string
     */
    private $listId;

    /**
     * @ORM\Column(name="mail_chimp_id", type="string")
     *
     * @var string
     */
    private $mailChimpId;

    /**
     * @ORM\Column(name="email_type", type="string")
     *
     * @var string
     */
    private $emailType;

    /**
     * @ORM\Column(name="status", type="string")
     *
     * @var string
     */
    private $status;

    /**
     * @return mixed
     */
    public function getMailChimpList()
    {
        return $this->mailChimpList;
    }

    /**
     * Get id.
     *
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->memberId;
    }

    /**
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * @return string
     */
    public function getMailChimpId(): string
    {
        return $this->mailChimpId;
    }


    /**
     * @param string $emailAddress
     */
    public function setEmailAddress(string $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @param string $emailType
     */
    public function setEmailType(string $emailType): void
    {
        $this->emailType = $emailType;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @param string $memberId
     */
    public function setMemberId(string $memberId): void
    {
        $this->memberId = $memberId;
    }

    /**
     * @param string $listId
     */
    public function setListId(string $listId): void
    {
        $this->listId = $listId;
    }

    /**
     * @param string $mailChimpId
     * @return MailChimpMember
     */
    public function setMailChimpId(string $mailChimpId): MailChimpMember
    {
        $this->mailChimpId = $mailChimpId;

        return $this;
    }

    /**
     * @param mixed $mailChimpList
     */
    public function setMailChimpList($mailChimpList): void
    {
        $this->mailChimpList = $mailChimpList;
    }

    /**
     * Get validation rules for mailchimp entity.
     *
     * @return array
     */
    public function getValidationRules(): array
    {
        return [
            'email_address' => 'required|string',
            'email_type' => 'string',
            'status' => 'required|string',
        ];
    }

    /**
     * Get array representation of entity.
     *
     * @return array
     */
    public function toArray(): array
    {
        $array = [];
        $str = new Str();

        foreach (\get_object_vars($this) as $property => $value) {
            $array[$str->snake($property)] = $value;
        }

        return $array;
    }
}
