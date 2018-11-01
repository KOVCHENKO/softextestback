<?php

namespace DoctrineProxies\__CG__\App\Database\Entities\MailChimp;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class MailChimpList extends \App\Database\Entities\MailChimp\MailChimpList implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'campaignDefaults', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'contact', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'emailTypeOption', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'listId', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'mailChimpId', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'name', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'notifyOnSubscribe', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'notifyOnUnsubscribe', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'permissionReminder', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'useArchiveBar', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'visibility'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'campaignDefaults', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'contact', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'emailTypeOption', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'listId', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'mailChimpId', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'name', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'notifyOnSubscribe', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'notifyOnUnsubscribe', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'permissionReminder', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'useArchiveBar', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpList' . "\0" . 'visibility'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (MailChimpList $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getMailChimpId(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMailChimpId', []);

        return parent::getMailChimpId();
    }

    /**
     * {@inheritDoc}
     */
    public function getValidationRules(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValidationRules', []);

        return parent::getValidationRules();
    }

    /**
     * {@inheritDoc}
     */
    public function setCampaignDefaults(array $campaignDefaults): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCampaignDefaults', [$campaignDefaults]);

        return parent::setCampaignDefaults($campaignDefaults);
    }

    /**
     * {@inheritDoc}
     */
    public function setContact(array $contact): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContact', [$contact]);

        return parent::setContact($contact);
    }

    /**
     * {@inheritDoc}
     */
    public function setEmailTypeOption(bool $emailTypeOption): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmailTypeOption', [$emailTypeOption]);

        return parent::setEmailTypeOption($emailTypeOption);
    }

    /**
     * {@inheritDoc}
     */
    public function setMailChimpId(string $mailChimpId): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMailChimpId', [$mailChimpId]);

        return parent::setMailChimpId($mailChimpId);
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $name): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setNotifyOnSubscribe(string $notifyOnSubscribe): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNotifyOnSubscribe', [$notifyOnSubscribe]);

        return parent::setNotifyOnSubscribe($notifyOnSubscribe);
    }

    /**
     * {@inheritDoc}
     */
    public function setNotifyOnUnsubscribe(string $notifyOnUnsubscribe): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNotifyOnUnsubscribe', [$notifyOnUnsubscribe]);

        return parent::setNotifyOnUnsubscribe($notifyOnUnsubscribe);
    }

    /**
     * {@inheritDoc}
     */
    public function setPermissionReminder(string $permissionReminder): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPermissionReminder', [$permissionReminder]);

        return parent::setPermissionReminder($permissionReminder);
    }

    /**
     * {@inheritDoc}
     */
    public function setUseArchiveBar(bool $useArchiveBar): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUseArchiveBar', [$useArchiveBar]);

        return parent::setUseArchiveBar($useArchiveBar);
    }

    /**
     * {@inheritDoc}
     */
    public function setVisibility(string $visibility): \App\Database\Entities\MailChimp\MailChimpList
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVisibility', [$visibility]);

        return parent::setVisibility($visibility);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', []);

        return parent::toArray();
    }

    /**
     * {@inheritDoc}
     */
    public function toMailChimpArray(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toMailChimpArray', []);

        return parent::toMailChimpArray();
    }

    /**
     * {@inheritDoc}
     */
    public function fill(array $data): \App\Database\Entities\Entity
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'fill', [$data]);

        return parent::fill($data);
    }

}