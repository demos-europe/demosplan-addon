<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface ElementsInterface
{
    public const ELEMENTS_CATEGORY_MAP = 'map'; // like "Planzeichnung"
    public const ELEMENTS_CATEGORY_STATEMENT = 'statement'; // like "Gesamtstellungnahme" or "Fehlanzeige"
    public const ELEMENTS_CATEGORY_FILE = 'file'; // like "Ergänzende Unterlagen" or "Landschaftsplan-Änderung"
    public const ELEMENTS_CATEGORY_PARAGRAPH = 'paragraph'; // like "Begründung" or "Textliche Festsetzungen"
    public const ELEMENTS_CATEGORY_CATEGORY = 'category'; // created element by customer
    public const FILE_TYPE_ARBEITSKREISPAPIER = 'Arbeitskreispapier I und II';
    public const FILE_TYPE_ARBEITSKREISPAPIER_I = 'AKI-Papier';
    public const FILE_TYPE_ARBEITSKREISPAPIER_II = 'AKII-Papier';
    public const FILE_TYPE_BEGRUENDUNG = 'Begründung';
    public const FILE_TYPE_ERGAENZENDE_UNTERLAGE = 'ergänzende Unterlage';
    public const FILE_TYPE_FNP_AENDERUNG = 'FNP-Änderung';
    public const FILE_TYPE_GROBABSTIMMUNGSPAPIER = 'Grobabstimmungspapier';
    public const FILE_TYPE_GUTACHTEN = 'Gutachten';
    public const FILE_TYPE_LAPRO_AENDERUNG = 'LaPro-Änderung';
    public const FILE_TYPE_NIEDERSCHRIFT_GROBABSTIMMUNG_ARBEITSKREISE = 'Niederschrift (Grobabstimmung, Arbeitskreise)';
    public const FILE_TYPE_NIEDERSCHRIFT_SONSTIGE = 'Niederschrift (sonstige)';
    public const FILE_TYPE_PLANZEICHNUNG = 'Planzeichnung';
    public const FILE_TYPE_SCOPING_PAPIER = 'Scopingpapier';
    public const FILE_TYPE_SCOPING_PROTOKOLL = 'Scoping-Protokoll';
    public const FILE_TYPE_VERORDNUNG = 'Verordnung';
    public const FILE_TYPE_VERTEILER = 'Verteiler';
    public const STATEMENT_TYPE_FEHLANZEIGE = 'Fehlanzeige';
}
