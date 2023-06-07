<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;

interface CustomerInterface extends UuidEntityInterface
{
    public function setId(string $id);

    /**
     * @return Collection<int, CustomerCountyInterface>
     */
    public function getCustomerCounties(): Collection;

    /**
     * @param Collection<int, CustomerCountyInterface> $customerCounties
     */
    public function setCustomerCounties(Collection $customerCounties): void;

    public function getName(): string;

    public function setName(string $name);

    public function getSubdomain(): string;

    public function setSubdomain(string $subdomain);

    /**
     * @return OrgaStatusInCustomerInterface[]
     */
    public function getOrgaStatuses();

    /**
     * @param Collection<int, OrgaStatusInCustomerInterface> $orgaStatuses
     */
    public function setOrgaStatuses(Collection $orgaStatuses);

    public function getOrgas(): Collection;

    /**
     * @return string[]
     */
    public function getEmailsOfUsersOfOrgas(): array;

    /**
     * @param Collection<int, OrgaInterface> $orgas
     */
    public function setOrgas(Collection $orgas);

    /**
     * @return Collection<int, UserRoleInCustomerInterface>
     */
    public function getUserRoles(): Collection;

    public function addOrga(OrgaInterface $orga): bool;

    public function removeOrga(OrgaInterface $orga);

    /**
     * @return string
     */
    public function __toString();

    public function getImprint(): string;

    public function setImprint(string $imprint);

    public function getDataProtection(): string;

    public function setDataProtection(string $dataProtection);

    /**
     * Set terms of use.
     */
    public function getTermsOfUse(): string;

    /**
     * Get terms of use.
     */
    public function setTermsOfUse(string $termsOfUse): void;

    public function getXplanning(): string;

    public function setXplanning(string $xplanning);

    /**
     * @return ProcedureInterface|null
     */
    public function getDefaultProcedureBlueprint();

    /**
     * @param ProcedureInterface|null $defaultProcedureBlueprint
     */
    public function setDefaultProcedureBlueprint($defaultProcedureBlueprint): void;

    public function setMapAttribution(string $mapAttribution): void;

    public function getMapAttribution(): string;

    public function setBaseLayerUrl(string $baseLayerUrl): void;

    public function getBaseLayerUrl(): string;

    public function getBaseLayerLayers(): string;

    public function setBaseLayerLayers(string $baseLayerLayers): void;

    public function getBranding(): ?BrandingInterface;

    public function setBranding(?BrandingInterface $branding): void;

    public function getAccessibilityExplanation(): string;

    public function setAccessibilityExplanation(string $accessibilityExplanation): void;

    /**
     * @return Collection<int, VideoInterface>
     */
    public function getSignLanguageOverviewVideos(): Collection;

    public function addSignLanguageOverviewVideo(VideoInterface $signLanguageOverviewVideo): self;

    public function removeSignLanguageOverviewVideo(VideoInterface $signLanguageOverviewVideo): self;

    public function setSignLanguageOverviewDescription(string $signLanguageOverviewDescription): self;

    public function getSignLanguageOverviewDescription(): string;

    public function getOverviewDescriptionInSimpleLanguage(): string;

    public function setOverviewDescriptionInSimpleLanguage(string $overviewDescriptionInSimpleLanguage): self;

}
