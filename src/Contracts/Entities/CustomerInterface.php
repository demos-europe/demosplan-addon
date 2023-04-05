<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface CustomerInterface
{
    public function getId(): ?string;

    public function setId(string $id): void;

    /**
     * @return Collection<int, CustomerCounty>
     */
    public function getCustomerCounties(): Collection;

    /**
     * @param Collection<int, CustomerCounty> $customerCounties
     */
    public function setCustomerCounties(Collection $customerCounties): void;

    public function getName(): string;

    public function setName(string $name);

    public function getSubdomain(): string;

    public function setSubdomain(string $subdomain);

    /**
     * @return OrgaStatusInCustomer[]
     */
    public function getOrgaStatuses();

    /**
     * @param Collection<int, OrgaStatusInCustomer> $orgaStatuses
     */
    public function setOrgaStatuses(Collection $orgaStatuses);

    public function getOrgas(): Collection;

    /**
     * @return string[]
     */
    public function getEmailsOfUsersOfOrgas(): array;

    /**
     * @param Collection<int, Orga> $orgas
     */
    public function setOrgas(Collection $orgas): void;

    /**
     * @return Collection<int, UserRoleInCustomer>
     */
    public function getUserRoles(): Collection;

    public function addOrga(Orga $orga): bool;

    public function removeOrga(Orga $orga);

    public function __toString(): string;

    public function getImprint(): string;

    public function setImprint(string $imprint);

    public function getDataProtection(): string;

    public function setDataProtection(string $dataProtection);

    public function getTermsOfUse(): string;

    public function setTermsOfUse(string $termsOfUse): void;

    public function getXplanning(): string;

    public function setXplanning(string $xplanning);

    public function getDefaultProcedureBlueprint(): ?Procedure;

    public function setDefaultProcedureBlueprint(?Procedure $defaultProcedureBlueprint): void;

    public function setMapAttribution(string $mapAttribution): void;

    public function getMapAttribution(): string;

    public function setBaseLayerUrl(string $baseLayerUrl): void;

    public function getBaseLayerUrl(): string;

    public function getBaseLayerLayers(): string;

    public function setBaseLayerLayers(string $baseLayerLayers): void;

    public function getBranding(): ?Branding;

    public function setBranding(?Branding $branding): void;

    public function getAccessibilityExplanation(): string;

    public function setAccessibilityExplanation(string $accessibilityExplanation): void;

    /**
     * @return Collection<int, Video>
     */
    public function getSignLanguageOverviewVideos(): Collection;

    public function addSignLanguageOverviewVideo(Video $signLanguageOverviewVideo): self;

    public function removeSignLanguageOverviewVideo(Video $signLanguageOverviewVideo): self;

    public function setSignLanguageOverviewDescription(string $signLanguageOverviewDescription): self;

    public function getSignLanguageOverviewDescription(): string;

    public function getOverviewDescriptionInSimpleLanguage(): string;

    public function setOverviewDescriptionInSimpleLanguage(string $overviewDescriptionInSimpleLanguage): self;
}
