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

    public const FILE_TYPE_ANSCHREIBEN = 'Anschreiben';
    public const FILE_TYPE_ANSCHREIBEN_BETEILIGUNGSVERFAHREN = 'Anschreiben Beteiligungsverfahren';
    public const FILE_TYPE_ANTRAGS_AUFTRAGSDOKUMENTE = 'Antrags- und Auftragsdokumente (Veranstaltung)';
    public const FILE_TYPE_ARBEITSKREISPAPIER = 'Arbeitskreispapier I und II';
    public const FILE_TYPE_ARBEITSKREISPAPIER_I = 'AKI-Papier';
    public const FILE_TYPE_ARBEITSKREISPAPIER_II = 'AKII-Papier';
    public const FILE_TYPE_AUBS_DRITTER_BLATT = 'AuBS 3er-Blatt';
    public const FILE_TYPE_AUFHEBUNGSBESCHLUSS = 'Aufhebungsbeschluss';
    public const FILE_TYPE_AUFSTELLUNGSBESCHLUSS = 'Aufstellungsbeschluss';
    public const FILE_TYPE_AUSLEGUNGSBESCHLUSS = 'Auslegungsbeschluss';
    public const FILE_TYPE_AUSWERTUNG = 'Auswertung';
    public const FILE_TYPE_BEGRUENDUNG = 'Begründung';
    public const FILE_TYPE_BEIBLATT_NACH_UBERNAHMEN = 'Beiblatt nachr. Übernahmen';
    public const FILE_TYPE_BESCHLUSS_ZUR_FNP_ANDERUNG = 'Beschluss zur FNP-Änderung';
    public const FILE_TYPE_BESCHLUSS_ZUR_LAPRO_ANDERUNG = 'Beschluss zur Lapro-Änderung';
    public const FILE_TYPE_DRUCKSACHE = 'Drucksache';
    public const FILE_TYPE_DURCHFUHRUNGSVERTRAG = 'Durchführungsvertrag';
    public const FILE_TYPE_ERGAENZENDE_UNTERLAGE = 'ergänzende Unterlage';
    public const FILE_TYPE_ERSCHLIESSUNGSVERTRAG = 'Erschließungsvertrag';
    public const FILE_TYPE_FESTSTELLUNG_PLANREIFE = 'Feststellung Planreife';
    public const FILE_TYPE_FESTSTELLUNGSBESCHLUSS = 'Feststellungsbeschluss';
    public const FILE_TYPE_FNP_AENDERUNG = 'FNP-Änderung';
    public const FILE_TYPE_FPN_DRITTER_BLATT = 'FNP 3er-Blatt';
    public const FILE_TYPE_FUNKTIONSPLAN = 'Funktionsplan';
    public const FILE_TYPE_GREMIENNIEDERSCHRIFT = 'Gremienniederschrift';
    public const FILE_TYPE_GROBABSTIMMUNGSPAPIER = 'Grobabstimmungspapier';
    public const FILE_TYPE_GUTACHTEN = 'Gutachten';
    public const FILE_TYPE_INFOBLATT = 'Infoblatt';
    public const FILE_TYPE_INTERNER_VERMERK = 'Interner Vermerk';
    public const FILE_TYPE_INTERNETTEXT = 'Internettext';
    public const FILE_TYPE_KOSTENUBERNAHMEVERTRAG_VERTRAG = 'Kostenübernahmevertrag, Vorvertrag';
    public const FILE_TYPE_LANDESPLANERISCHE_STELLUNGNAHME = 'Landesplanerische Stellungnahme';
    public const FILE_TYPE_LAPRO_AENDERUNG = 'LaPro-Änderung';
    public const FILE_TYPE_LAPRO_DRITTER_BLATT = 'LaPro 3er-Blatt';
    public const FILE_TYPE_MITTEILUNG = 'Mitteilung (politische Gremien)';
    public const FILE_TYPE_NIEDERSCHRIFT_GROBABSTIMMUNG_ARBEITSKREISE = 'Niederschrift (Grobabstimmung, Arbeitskreise)';
    public const FILE_TYPE_NIEDERSCHRIFT_SONSTIGE = 'Niederschrift (sonstige)';
    public const FILE_TYPE_NIEDERSCHRIFTEN = 'Niederschriften';
    public const FILE_TYPE_PLANZEICHNUNG = 'Planzeichnung';
    public const FILE_TYPE_PRAESENTATION = 'Präsentation';
    public const FILE_TYPE_SCHLUSSMITTEILUNG = 'Schlussmitteilung';
    public const FILE_TYPE_SCOPING_PAPIER = 'Scopingpapier';
    public const FILE_TYPE_SCOPING_PROTOKOLL = 'Scoping-Protokoll';
    public const FILE_TYPE_SITZUNGSUNTERLAGE = 'Sitzungsunterlage';
    public const FILE_TYPE_SONSTIGE_UNTERLAGE = 'sonstige Unterlage';
    public const FILE_TYPE_STADTEBAULICHER_VERTRAG = 'Städtebaulicher Vertrag';
    public const FILE_TYPE_STELLUNGNAHME = 'Stellungnahme';
    public const FILE_TYPE_UBERSICHTSKARTE = 'Übersichtskarte';
    public const FILE_TYPE_VERMERK_SONSTIGE = 'Vermerk (Sonstige)';
    public const FILE_TYPE_VEROEFFENTLICHUNG = 'Veröffentlichung';
    public const FILE_TYPE_VERORDNUNG = 'Verordnung';
    public const FILE_TYPE_VERTEILER = 'Verteiler';
    public const FILE_TYPE_VORHABEN_ERSCHLIESSUNGSPLAN = 'Vorhaben Erschliessungsplan';
    public const FILE_TYPE_XPLANARCHIV = 'XPlanarchiv';
    public const FILE_TYPE_ZUSAMMENFASSENDE_ERKLAERUNG = 'zusammenfassende Erklärung';
    public const FILE_TYPE_ZWISCHENMITTEILUNG = 'Zwischenmitteilung';
    public const STATEMENT_TYPE_FEHLANZEIGE = 'Fehlanzeige';
}
