<?php

namespace DemosEurope\DemosplanAddon\Contracts\Entities;


interface OrgaStatusInCustomerInterface extends UuidEntityInterface
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_ACCEPTED = 'accepted';

    public const STATUS_REJECTED = 'rejected';

    public function setId(string $id);

    public function getOrga(): OrgaInterface;

    public function setOrga(OrgaInterface $orga);

    public function getOrgaType(): OrgaTypeInterface;

    public function setOrgaType(OrgaTypeInterface $orgaType);

    public function getCustomer(): CustomerInterface;

    public function setCustomer(CustomerInterface $customer);

    public function getStatus(): string;

    public function setStatus(string $status);
}
