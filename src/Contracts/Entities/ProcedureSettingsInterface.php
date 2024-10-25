<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;
use DateTime;

interface ProcedureSettingsInterface extends UuidEntityInterface, CoreEntityInterface
{
    /**
     * Max length of the {@see mapHint} field.
     *
     * @var int
     */
    public const MAP_HINT_MAX_LENGTH = 2000;
    /**
     * Min length of the {@see mapHint} field.
     *
     * @var int
     */
    public const MAP_HINT_MIN_LENGTH = 50;

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id);

    /**
     * @return string|null
     */
    public function getPId();

    /**
     * Set psMapExtent.
     *
     * @param string $mapExtent
     *
     * @return ProcedureSettingsInterface
     */
    public function setMapExtent($mapExtent);

    /**
     * Get psMapExtent.
     *
     * @return string
     */
    public function getMapExtent();

    /**
     * Set psStartScale.
     *
     * @param string $startScale
     *
     * @return ProcedureSettingsInterface
     */
    public function setStartScale($startScale);

    /**
     * Get psStartScale.
     *
     * @return string
     */
    public function getStartScale();

    /**
     * Set psAvailableScale.
     *
     * @param string $availableScale
     *
     * @return ProcedureSettingsInterface
     */
    public function setAvailableScale($availableScale);

    /**
     * Get psAvailableScale.
     *
     * @return string
     */
    public function getAvailableScale();

    /**
     * Set psBoundingBox.
     *
     * @param string $boundingBox
     *
     * @return ProcedureSettingsInterface
     */
    public function setBoundingBox($boundingBox);

    /**
     * Get psBoundingBox.
     *
     * @return string
     */
    public function getBoundingBox();

    /**
     * Set psInformationUrl.
     *
     * @param string $informationUrl
     *
     * @return ProcedureSettingsInterface
     */
    public function setInformationUrl($informationUrl);

    /**
     * Get psInformationUrl.
     *
     * @return string
     */
    public function getInformationUrl();

    /**
     * Set psDefaultLayer.
     *
     * @param string $defaultLayer
     *
     * @return ProcedureSettingsInterface
     */
    public function setDefaultLayer($defaultLayer);

    /**
     * Get psDefaultLayer.
     *
     * @return string
     */
    public function getDefaultLayer();

    /**
     * Set psTerritory.
     *
     * @param string $territory
     *
     * @return ProcedureSettingsInterface
     */
    public function setTerritory($territory);

    /**
     * Get psTerritory.
     *
     * @return string
     */
    public function getTerritory();

    /**
     * Set psCoordinate.
     *
     * @param string $coordinate
     *
     * @return ProcedureSettingsInterface
     */
    public function setCoordinate($coordinate);

    /**
     * Get psCoordinate.
     *
     * @return string
     */
    public function getCoordinate();

    /**
     * Set psPlanEnable.
     *
     * @param bool $planEnable
     *
     * @return ProcedureSettingsInterface
     */
    public function setPlanEnable($planEnable);

    /**
     * Get psPlanEnable.
     *
     * @return bool
     */
    public function getPlanEnable();

    /**
     * Set psPlanText.
     *
     * @param string $planText
     *
     * @return ProcedureSettingsInterface
     */
    public function setPlanText($planText);

    /**
     * Get psPlanText.
     *
     * @return string
     */
    public function getPlanText();

    /**
     * Set psPlanPdf.
     *
     * @param string $planPDF
     *
     * @return ProcedureSettingsInterface
     */
    public function setPlanPDF($planPDF);

    /**
     * Get psPlanPdf.
     *
     * @return string
     */
    public function getPlanPDF();

    /**
     * Set psPlanPara1Pdf.
     *
     * @param string $planPara1PDF
     *
     * @return ProcedureSettingsInterface
     */
    public function setPlanPara1PDF($planPara1PDF);

    /**
     * Get psPlanPara1Pdf.
     *
     * @return string
     */
    public function getPlanPara1PDF();

    /**
     * Set psPlanPara2Pdf.
     *
     * @param string $planPara2PDF
     *
     * @return ProcedureSettingsInterface
     */
    public function setPlanPara2PDF($planPara2PDF);

    /**
     * Get psPlanPara2Pdf.
     *
     * @return string
     */
    public function getPlanPara2PDF();

    /**
     * Set psPlanDrawText.
     *
     * @param string $planDrawText
     *
     * @return ProcedureSettingsInterface
     */
    public function setPlanDrawText($planDrawText);

    /**
     * Get psPlanDrawText.
     *
     * @return string
     */
    public function getPlanDrawText();

    /**
     * Set psPlanDrawPdf.
     *
     * @param string $planDrawPDF
     *
     * @return ProcedureSettingsInterface
     */
    public function setPlanDrawPDF($planDrawPDF);

    /**
     * Get psPlanDrawPdf.
     *
     * @return string
     */
    public function getPlanDrawPDF();

    /**
     * Set psEmailTitle.
     *
     * @param string $emailTitle
     *
     * @return ProcedureSettingsInterface
     */
    public function setEmailTitle($emailTitle);

    /**
     * Get psEmailTitle.
     *
     * @return string
     */
    public function getEmailTitle();

    /**
     * Set psEmailText.
     *
     * @param string $emailText
     *
     * @return ProcedureSettingsInterface
     */
    public function setEmailText($emailText);

    /**
     * Get psEmailText.
     *
     * @return string
     */
    public function getEmailText();
    /**
     * Set psEmailCc.
     *
     * @param string $emailCc
     *
     * @return ProcedureSettingsInterface
     */
    public function setEmailCc($emailCc);

    /**
     * Get psEmailCc.
     *
     * @return string
     */
    public function getEmailCc();

    /**
     * Set Links.
     *
     * @param string $links
     *
     * @return ProcedureInterface
     */
    public function setLinks($links);

    /**
     * Get Links.
     *
     * @return string
     */
    public function getLinks();

    /**
     * Set p.
     *
     * @param ProcedureInterface $procedure
     *
     * @return ProcedureSettingsInterface
     */
    public function setProcedure(ProcedureInterface $procedure = null);

    /**
     * Get p.
     *
     * @return ProcedureInterface
     */
    public function getProcedure();

    /**
     * @param string $pictogram
     *
     * @return $this
     */
    public function setPictogram($pictogram);

    public function getPictogram(): ?string;
    public function setPictogramCopyright(string $pictogramCopyright): ProcedureSettingsInterface;
    public function getPictogramCopyright(): string;
    public function setPictogramAltText(string $pictogramAltText): ProcedureSettingsInterface;
    public function getPictogramAltText(): string;

    /**
     * Returns the internal phase to which will be switch, when the time(dateOfSwitchPhase) has come.
     *
     * @return string
     */
    public function getDesignatedPhase();

    /**
     * @param string $designatedPhase
     *
     * @return $this
     */
    public function setDesignatedPhase($designatedPhase);

    /**
     * Returns the external phase to which will be switch, when the time(dateOfSwitchPublicPhase) has come.
     *
     * @return string
     */
    public function getDesignatedPublicPhase();

    /**
     * @param string $designatedPublicPhase
     *
     * @return mixed
     */
    public function setDesignatedPublicPhase($designatedPublicPhase);

    /**
     * Returns the date which is defined for switching the current phase of the procedure to the designated phase.
     * Null is a valid value in this case and indicates that no date is set.
     *
     * @return DateTime|null date, which is set | null if date not set or there are no related settings
     */
    public function getDesignatedSwitchDate(): ?DateTime;

    public function setDesignatedSwitchDate(?DateTime $designatedSwitchDate): self;

    /**
     * Returns the date which is defined for switching the current public phase of the procedure to the designated phase.
     * Null is a valid value in this case and indicates that no date is set.
     *
     * @return DateTime|null date, which is set | null if date not set or there are no related settings
     */
    public function getDesignatedPublicSwitchDate(): ?DateTime;

    public function setDesignatedPublicSwitchDate(?DateTime $designatedPublicSwitchDate): self;

    /**
     * Returns the End Date to which will be switch, when the time(dateOfSwitchPhase) has come.
     */
    public function getDesignatedEndDate(): ?DateTime;

    /**
     * @param DateTime $designatedEndDate
     *
     * @return $this
     */
    public function setDesignatedEndDate($designatedEndDate);

    /**
     * Returns the End Date to which will be switch, when the time(dateOfSwitchPhase) has come.
     */
    public function getDesignatedPublicEndDate(): ?DateTime;

    /**
     * @param mixed $designatedPublicEndDate
     *
     * @return $this
     */
    public function setDesignatedPublicEndDate($designatedPublicEndDate);

    /**
     * Get sendMailsToCounties.
     *
     * @return bool
     */
    public function getSendMailsToCounties();

    /**
     * Set sendMailsToCounties.
     *
     * @param bool $sendMailsToCounties
     */
    public function setSendMailsToCounties($sendMailsToCounties);

    public function getPlanningArea(): ?string;

    /**
     * @param string $planningArea
     *
     * @return ProcedureSettingsInterface
     */
    public function setPlanningArea($planningArea);

    /**
     * @return array
     */
    public function getScales();

    /**
     * @param array|string $scales
     */
    public function setScales($scales);

    /**
     * @return string
     */
    public function getLegalNotice();

    /**
     * @param string $legalNotice
     */
    public function setLegalNotice($legalNotice);

    /**
     * @return string
     */
    public function getCopyright();

    /**
     * @param string $copyright
     */
    public function setCopyright($copyright);

    public function getMapHint(): string;

    public function setMapHint(string $mapHint);

    /**
     * @return Collection<int,ProcedureInterface>
     */
    public function getAllowedSegmentAccessProcedures(): Collection;

    /**
     * @param Collection<int,ProcedureInterface> $allowedSegmentAccessProcedures
     */
    public function setAllowedSegmentAccessProcedures(Collection $allowedSegmentAccessProcedures): self;

    public function getDesignatedPhaseChangeUser(): ?UserInterface;

    public function getDesignatedPublicPhaseChangeUser(): ?UserInterface;

    public function setDesignatedPhaseChangeUser(?UserInterface $designatedPhaseChangeUser): self;

    public function setDesignatedPublicPhaseChangeUser(?UserInterface $designatedPublicPhaseChangeUser): self;
}
