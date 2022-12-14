<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\GraphQL\Storefront\Customer\DataType;

use DateTimeInterface;
use OxidEsales\Eshop\Application\Model\User as EshopUserModel;
use OxidEsales\GraphQL\Base\DataType\DateTimeImmutableFactory;
use OxidEsales\GraphQL\Base\DataType\ShopModelAwareInterface;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;
use TheCodingMachine\GraphQLite\Types\ID;

/**
 * @Type()
 */
final class Customer implements ShopModelAwareInterface
{
    /** @var EshopUserModel */
    private $customer;

    public function __construct(EshopUserModel $customer)
    {
        $this->customer = $customer;
    }

    public function getEshopModel(): EshopUserModel
    {
        return $this->customer;
    }

    /**
     * @Field()
     */
    public function getId(): ID
    {
        return new ID($this->customer->getId());
    }

    /**
     * @Field()
     */
    public function getFirstName(): string
    {
        return (string)$this->customer->getRawFieldData('oxfname');
    }

    /**
     * @Field()
     */
    public function getLastName(): string
    {
        return (string)$this->customer->getRawFieldData('oxlname');
    }

    /**
     * @Field()
     */
    public function getEmail(): string
    {
        return (string)$this->customer->getRawFieldData('oxusername');
    }

    /**
     * @Field()
     */
    public function getCustomerNumber(): string
    {
        return (string)$this->customer->getRawFieldData('oxcustnr');
    }

    /**
     * @Field()
     */
    public function getBirthdate(): ?DateTimeInterface
    {
        return DateTimeImmutableFactory::fromString(
            (string)$this->customer->getRawFieldData('oxbirthdate')
        );
    }

    /**
     * @Field()
     */
    public function getPoints(): int
    {
        return (int)$this->customer->getRawFieldData('oxpoints');
    }

    /**
     * @Field()
     */
    public function getRegistered(): ?DateTimeInterface
    {
        return DateTimeImmutableFactory::fromString(
            (string)$this->customer->getRawFieldData('oxregister')
        );
    }

    /**
     * @Field()
     */
    public function getCreated(): ?DateTimeInterface
    {
        return DateTimeImmutableFactory::fromString(
            (string)$this->customer->getRawFieldData('oxcreate')
        );
    }

    /**
     * @Field()
     */
    public function getUpdated(): ?DateTimeInterface
    {
        return DateTimeImmutableFactory::fromString(
            (string)$this->customer->getRawFieldData('oxtimestamp')
        );
    }

    public static function getModelClass(): string
    {
        return EshopUserModel::class;
    }
}
