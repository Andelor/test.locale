<?php
/** German (Deutsch)
 *
 * To improve a translation please visit https://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 */

$namespaceNames = [
	NS_MEDIA            => 'Medium',
	NS_SPECIAL          => 'Spezial',
	NS_TALK             => 'Diskussion',
	NS_USER             => 'Benutzer',
	NS_USER_TALK        => 'Benutzer_Diskussion',
	NS_PROJECT_TALK     => '$1_Diskussion',
	NS_FILE             => 'Datei',
	NS_FILE_TALK        => 'Datei_Diskussion',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'MediaWiki_Diskussion',
	NS_TEMPLATE         => 'Vorlage',
	NS_TEMPLATE_TALK    => 'Vorlage_Diskussion',
	NS_HELP             => 'Hilfe',
	NS_HELP_TALK        => 'Hilfe_Diskussion',
	NS_CATEGORY         => 'Kategorie',
	NS_CATEGORY_TALK    => 'Kategorie_Diskussion',
];

$namespaceAliases = [
	'Bild' => NS_FILE,
	'Bild_Diskussion' => NS_FILE_TALK,
];

$namespaceGenderAliases = [
	NS_USER => [ 'male' => 'Benutzer', 'female' => 'Benutzerin' ],
	NS_USER_TALK => [ 'male' => 'Benutzer_Diskussion', 'female' => 'Benutzerin_Diskussion' ],
];

$specialPageAliases = [
	'Activeusers'               => [ 'Aktive_Benutzer' ],
	'Allmessages'               => [ 'MediaWiki-Systemnachrichten', 'Systemnachrichten' ],
	'AllMyUploads'              => [ 'Alle_meine_Dateien' ],
	'Allpages'                  => [ 'Alle_Seiten' ],
	'ApiHelp'                   => [ 'API-Hilfe' ],
	'Ancientpages'              => [ 'Älteste_Seiten' ],
	'Badtitle'                  => [ 'Ungültiger_Seitenname' ],
	'Blankpage'                 => [ 'Leerseite', 'Leere_Seite' ],
	'Block'                     => [ 'Sperren' ],
	'Booksources'               => [ 'ISBN-Suche' ],
	'BrokenRedirects'           => [ 'Defekte_Weiterleitungen', 'Kaputte_Weiterleitungen' ],
	'Categories'                => [ 'Kategorien' ],
	'ChangeEmail'               => [ 'E-Mail-Adresse_ändern' ],
	'ChangePassword'            => [ 'Passwort_ändern', 'Passwort_zurücksetzen' ],
	'ComparePages'              => [ 'Seiten_vergleichen' ],
	'Confirmemail'              => [ 'E-Mail_bestätigen', 'E-Mail_bestaetigen' ],
	'Contributions'             => [ 'Beiträge' ],
	'CreateAccount'             => [ 'Benutzerkonto_anlegen' ],
	'Deadendpages'              => [ 'Sackgassenseiten' ],
	'DeletedContributions'      => [ 'Gelöschte_Beiträge' ],
	'Diff'                      => [ 'Diff', 'Differenz', 'Unterschied' ],
	'DoubleRedirects'           => [ 'Doppelte_Weiterleitungen' ],
	'EditWatchlist'             => [ 'Beobachtungsliste_bearbeiten' ],
	'Emailuser'                 => [ 'E-Mail_senden', 'Mailen', 'E-Mail' ],
	'ExpandTemplates'           => [ 'Vorlagen_expandieren' ],
	'Export'                    => [ 'Exportieren' ],
	'Fewestrevisions'           => [ 'Wenigstbearbeitete_Seiten' ],
	'FileDuplicateSearch'       => [ 'Dateiduplikatsuche', 'Datei-Duplikat-Suche' ],
	'Filepath'                  => [ 'Dateipfad' ],
	'Import'                    => [ 'Importieren' ],
	'Invalidateemail'           => [ 'E-Mail_nicht_bestätigen', 'E-Mail_nicht_bestaetigen' ],
	'JavaScriptTest'            => [ 'JavaScript-Test' ],
	'BlockList'                 => [ 'Liste_der_Sperren', 'Gesperrte_IP-Adressen', 'Gesperrte_IPs', 'Sperrliste' ],
	'LinkSearch'                => [ 'Weblinksuche', 'Weblink-Suche' ],
	'Listadmins'                => [ 'Administratoren' ],
	'Listbots'                  => [ 'Bots' ],
	'Listfiles'                 => [ 'Dateien', 'Dateiliste' ],
	'Listgrouprights'           => [ 'Gruppenrechte' ],
	'Listredirects'             => [ 'Weiterleitungen' ],
	'ListDuplicatedFiles'       => [ 'Dateiduplikate' ],
	'Listusers'                 => [ 'Benutzer', 'Benutzerliste' ],
	'Lockdb'                    => [ 'Datenbank_sperren' ],
	'Log'                       => [ 'Logbuch' ],
	'Lonelypages'               => [ 'Verwaiste_Seiten' ],
	'Longpages'                 => [ 'Längste_Seiten' ],
	'MediaStatistics'           => [ 'Medienstatistiken' ],
	'MergeHistory'              => [ 'Versionsgeschichten_vereinen' ],
	'MIMEsearch'                => [ 'MIME-Typ-Suche' ],
	'Mostcategories'            => [ 'Meistkategorisierte_Seiten' ],
	'Mostimages'                => [ 'Meistbenutzte_Dateien' ],
	'Mostinterwikis'            => [ 'Meiste_Interwikilinks' ],
	'Mostlinked'                => [ 'Meistverlinkte_Seiten' ],
	'Mostlinkedcategories'      => [ 'Meistbenutzte_Kategorien' ],
	'Mostlinkedtemplates'       => [ 'Meistbenutzte_Vorlagen' ],
	'Mostrevisions'             => [ 'Meistbearbeitete_Seiten' ],
	'Movepage'                  => [ 'Verschieben' ],
	'Mycontributions'           => [ 'Meine_Beiträge' ],
	'MyLanguage'                => [ 'Meine_Sprache' ],
	'Mypage'                    => [ 'Meine_Benutzerseite' ],
	'Mytalk'                    => [ 'Meine_Diskussionsseite' ],
	'Myuploads'                 => [ 'Meine_hochgeladenen_Dateien' ],
	'Newimages'                 => [ 'Neue_Dateien' ],
	'Newpages'                  => [ 'Neue_Seiten' ],
	'PagesWithProp'             => [ 'Seiten_mit_Eigenschaften' ],
	'PageLanguage'              => [ 'Seitensprache' ],
	'PasswordReset'             => [ 'Passwort_neu_vergeben' ],
	'PermanentLink'             => [ 'Permanenter_Link', 'Permalink' ],
	'Preferences'               => [ 'Einstellungen' ],
	'Prefixindex'               => [ 'Präfixindex' ],
	'Protectedpages'            => [ 'Geschützte_Seiten' ],
	'Protectedtitles'           => [ 'Geschützte_Titel', 'Gesperrte_Titel' ],
	'Randompage'                => [ 'Zufällige_Seite' ],
	'RandomInCategory'          => [ 'Zufällig_in_Kategorie' ],
	'Randomredirect'            => [ 'Zufällige_Weiterleitung' ],
	'Randomrootpage'            => [ 'Zufällige_Stammseite' ],
	'Recentchanges'             => [ 'Letzte_Änderungen' ],
	'Recentchangeslinked'       => [ 'Änderungen_an_verlinkten_Seiten' ],
	'Redirect'                  => [ 'Weiterleitung' ],
	'ResetTokens'               => [ 'Tokens_zurücksetzen' ],
	'Revisiondelete'            => [ 'Versionslöschung' ],
	'RunJobs'                   => [ 'Aufträge_ausführen' ],
	'Search'                    => [ 'Suche' ],
	'Shortpages'                => [ 'Kürzeste_Seiten' ],
	'Specialpages'              => [ 'Spezialseiten' ],
	'Statistics'                => [ 'Statistik' ],
	'Tags'                      => [ 'Markierungen' ],
	'TrackingCategories'        => [ 'Tracking-Kategorien' ],
	'Unblock'                   => [ 'Freigeben' ],
	'Uncategorizedcategories'   => [ 'Nicht_kategorisierte_Kategorien' ],
	'Uncategorizedimages'       => [ 'Nicht_kategorisierte_Dateien' ],
	'Uncategorizedpages'        => [ 'Nicht_kategorisierte_Seiten' ],
	'Uncategorizedtemplates'    => [ 'Nicht_kategorisierte_Vorlagen' ],
	'Undelete'                  => [ 'Wiederherstellen' ],
	'Unlockdb'                  => [ 'Datenbank_entsperren' ],
	'Unusedcategories'          => [ 'Unbenutzte_Kategorien' ],
	'Unusedimages'              => [ 'Unbenutzte_Dateien' ],
	'Unusedtemplates'           => [ 'Unbenutzte_Vorlagen' ],
	'Unwatchedpages'            => [ 'Ignorierte_Seiten', 'Unbeobachtete_Seiten' ],
	'Upload'                    => [ 'Hochladen' ],
	'UploadStash'               => [ 'Hochladespeicher' ],
	'Userlogin'                 => [ 'Anmelden' ],
	'Userlogout'                => [ 'Abmelden' ],
	'Userrights'                => [ 'Benutzerrechte' ],
	'Wantedcategories'          => [ 'Gewünschte_Kategorien' ],
	'Wantedfiles'               => [ 'Gewünschte_Dateien', 'Fehlende_Dateien' ],
	'Wantedpages'               => [ 'Gewünschte_Seiten' ],
	'Wantedtemplates'           => [ 'Gewünschte_Vorlagen', 'Fehlende_Vorlagen' ],
	'Watchlist'                 => [ 'Beobachtungsliste' ],
	'Whatlinkshere'             => [ 'Linkliste', 'Verweisliste' ],
	'Withoutinterwiki'          => [ 'Fehlende_Interwikis' ],
];

$magicWords = [
	'redirect'                  => [ '0', '#WEITERLEITUNG', '#REDIRECT' ],
	'notoc'                     => [ '0', '__KEIN_INHALTSVERZEICHNIS__', '__KEININHALTSVERZEICHNIS__', '__NOTOC__' ],
	'nogallery'                 => [ '0', '__KEINE_GALERIE__', '__KEINEGALERIE__', '__NOGALLERY__' ],
	'forcetoc'                  => [ '0', '__INHALTSVERZEICHNIS_ERZWINGEN__', '__FORCETOC__' ],
	'toc'                       => [ '0', '__INHALTSVERZEICHNIS__', '__TOC__' ],
	'noeditsection'             => [ '0', '__ABSCHNITTE_NICHT_BEARBEITEN__', '__NOEDITSECTION__' ],
	'currentmonth'              => [ '1', 'JETZIGER_MONAT', 'JETZIGER_MONAT_2', 'CURRENTMONTH', 'CURRENTMONTH2' ],
	'currentmonth1'             => [ '1', 'JETZIGER_MONAT_1', 'CURRENTMONTH1' ],
	'currentmonthname'          => [ '1', 'JETZIGER_MONATSNAME', 'CURRENTMONTHNAME' ],
	'currentmonthnamegen'       => [ '1', 'JETZIGER_MONATSNAME_GENITIV', 'JETZIGER_MONATSNAME_GEN', 'CURRENTMONTHNAMEGEN' ],
	'currentmonthabbrev'        => [ '1', 'JETZIGER_MONATSNAME_KURZ', 'CURRENTMONTHABBREV' ],
	'currentday'                => [ '1', 'JETZIGER_KALENDERTAG', 'JETZIGER_TAG', 'CURRENTDAY' ],
	'currentday2'               => [ '1', 'JETZIGER_KALENDERTAG_2', 'JETZIGER_TAG_2', 'CURRENTDAY2' ],
	'currentdayname'            => [ '1', 'JETZIGER_WOCHENTAG', 'CURRENTDAYNAME' ],
	'currentyear'               => [ '1', 'JETZIGES_JAHR', 'CURRENTYEAR' ],
	'currenttime'               => [ '1', 'JETZIGE_UHRZEIT', 'CURRENTTIME' ],
	'currenthour'               => [ '1', 'JETZIGE_STUNDE', 'CURRENTHOUR' ],
	'localmonth'                => [ '1', 'LOKALER_MONAT', 'LOKALER_MONAT_2', 'LOCALMONTH', 'LOCALMONTH2' ],
	'localmonth1'               => [ '1', 'LOKALER_MONAT_1', 'LOCALMONTH1' ],
	'localmonthname'            => [ '1', 'LOKALER_MONATSNAME', 'LOCALMONTHNAME' ],
	'localmonthnamegen'         => [ '1', 'LOKALER_MONATSNAME_GENITIV', 'LOKALER_MONATSNAME_GEN', 'LOCALMONTHNAMEGEN' ],
	'localmonthabbrev'          => [ '1', 'LOKALER_MONATSNAME_KURZ', 'LOCALMONTHABBREV' ],
	'localday'                  => [ '1', 'LOKALER_KALENDERTAG', 'LOKALER_TAG', 'LOCALDAY' ],
	'localday2'                 => [ '1', 'LOKALER_KALENDERTAG_2', 'LOKALER_TAG_2', 'LOCALDAY2' ],
	'localdayname'              => [ '1', 'LOKALER_WOCHENTAG', 'LOCALDAYNAME' ],
	'localyear'                 => [ '1', 'LOKALES_JAHR', 'LOCALYEAR' ],
	'localtime'                 => [ '1', 'LOKALE_UHRZEIT', 'LOCALTIME' ],
	'localhour'                 => [ '1', 'LOKALE_STUNDE', 'LOCALHOUR' ],
	'numberofpages'             => [ '1', 'SEITENANZAHL', 'NUMBEROFPAGES' ],
	'numberofarticles'          => [ '1', 'ARTIKELANZAHL', 'NUMBEROFARTICLES' ],
	'numberoffiles'             => [ '1', 'DATEIANZAHL', 'NUMBEROFFILES' ],
	'numberofusers'             => [ '1', 'BENUTZERANZAHL', 'NUMBEROFUSERS' ],
	'numberofactiveusers'       => [ '1', 'AKTIVE_BENUTZER', 'NUMBEROFACTIVEUSERS' ],
	'numberofedits'             => [ '1', 'BEARBEITUNGSANZAHL', 'NUMBEROFEDITS' ],
	'pagename'                  => [ '1', 'SEITENNAME', 'PAGENAME' ],
	'pagenamee'                 => [ '1', 'SEITENNAME_URL', 'PAGENAMEE' ],
	'namespace'                 => [ '1', 'NAMENSRAUM', 'NAMESPACE' ],
	'namespacee'                => [ '1', 'NAMENSRAUM_URL', 'NAMESPACEE' ],
	'namespacenumber'           => [ '1', 'NAMENSRAUMNUMMER', 'NAMESPACENUMBER' ],
	'talkspace'                 => [ '1', 'DISKUSSIONSNAMENSRAUM', 'DISK_NR', 'TALKSPACE' ],
	'talkspacee'                => [ '1', 'DISKUSSIONSNAMENSRAUM_URL', 'DISK_NR_URL', 'TALKSPACEE' ],
	'subjectspace'              => [ '1', 'HAUPTNAMENSRAUM', 'SUBJECTSPACE', 'ARTICLESPACE' ],
	'subjectspacee'             => [ '1', 'HAUPTNAMENSRAUM_URL', 'SUBJECTSPACEE', 'ARTICLESPACEE' ],
	'fullpagename'              => [ '1', 'VOLLER_SEITENNAME', 'FULLPAGENAME' ],
	'fullpagenamee'             => [ '1', 'VOLLER_SEITENNAME_URL', 'FULLPAGENAMEE' ],
	'subpagename'               => [ '1', 'UNTERSEITE', 'SUBPAGENAME' ],
	'subpagenamee'              => [ '1', 'UNTERSEITE_URL', 'SUBPAGENAMEE' ],
	'rootpagename'              => [ '1', 'STAMMSEITE', 'ROOTPAGENAME' ],
	'rootpagenamee'             => [ '1', 'STAMMSEITE_URL', 'ROOTPAGENAMEE' ],
	'basepagename'              => [ '1', 'OBERSEITE', 'BASEPAGENAME' ],
	'basepagenamee'             => [ '1', 'OBERSEITE_URL', 'BASEPAGENAMEE' ],
	'talkpagename'              => [ '1', 'DISKUSSIONSSEITE', 'DISK', 'TALKPAGENAME' ],
	'talkpagenamee'             => [ '1', 'DISKUSSIONSSEITE_URL', 'DISK_URL', 'TALKPAGENAMEE' ],
	'subjectpagename'           => [ '1', 'HAUPTSEITENNAME', 'VORDERSEITE', 'HAUPTSEITE', 'SUBJECTPAGENAME', 'ARTICLEPAGENAME' ],
	'subjectpagenamee'          => [ '1', 'HAUPTSEITENNAME_URL', 'VORDERSEITE_URL', 'HAUPTSEITE_URL', 'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE' ],
	'subst'                     => [ '0', 'ERS:', 'SUBST:' ],
	'safesubst'                 => [ '0', 'SICHER_ERS:', 'SICHERERS:', 'SAFESUBST:' ],
	'img_thumbnail'             => [ '1', 'mini', 'miniatur', 'thumb', 'thumbnail' ],
	'img_manualthumb'           => [ '1', 'mini=$1', 'miniatur=$1', 'thumbnail=$1', 'thumb=$1' ],
	'img_right'                 => [ '1', 'rechts', 'right' ],
	'img_left'                  => [ '1', 'links', 'left' ],
	'img_none'                  => [ '1', 'ohne', 'none' ],
	'img_center'                => [ '1', 'zentriert', 'center', 'centre' ],
	'img_framed'                => [ '1', 'gerahmt', 'frame', 'framed', 'enframed' ],
	'img_frameless'             => [ '1', 'rahmenlos', 'frameless' ],
	'img_lang'                  => [ '1', 'sprache=$1', 'lang=$1' ],
	'img_page'                  => [ '1', 'seite=$1', 'seite $1', 'seite_$1', 'page=$1', 'page $1' ],
	'img_upright'               => [ '1', 'hochkant', 'hochkant=$1', 'hochkant $1', 'hochkant_$1', 'upright', 'upright=$1', 'upright $1' ],
	'img_border'                => [ '1', 'rand', 'border' ],
	'img_baseline'              => [ '1', 'grundlinie', 'baseline' ],
	'img_sub'                   => [ '1', 'tief', 'tiefgestellt', 'sub' ],
	'img_super'                 => [ '1', 'hoch', 'hochgestellt', 'super', 'sup' ],
	'img_top'                   => [ '1', 'oben', 'top' ],
	'img_text_top'              => [ '1', 'text-oben', 'text-top' ],
	'img_middle'                => [ '1', 'mitte', 'middle' ],
	'img_bottom'                => [ '1', 'unten', 'bottom' ],
	'img_text_bottom'           => [ '1', 'text-unten', 'text-bottom' ],
	'img_link'                  => [ '1', 'verweis=$1', 'link=$1' ],
	'img_alt'                   => [ '1', 'alternativtext=$1', 'alt=$1' ],
	'img_class'                 => [ '1', 'klasse=$1', 'class=$1' ],
	'int'                       => [ '0', 'NACHRICHT:', 'INT:' ],
	'sitename'                  => [ '1', 'PROJEKTNAME', 'SITENAME' ],
	'ns'                        => [ '0', 'NR:', 'NS:' ],
	'nse'                       => [ '0', 'NR_URL:', 'NSE:' ],
	'localurl'                  => [ '0', 'LOKALE_URL:', 'LOCALURL:' ],
	'localurle'                 => [ '0', 'LOKALE_URL_C:', 'LOCALURLE:' ],
	'articlepath'               => [ '0', 'ARTIKELPFAD', 'ARTICLEPATH' ],
	'pageid'                    => [ '0', 'SEITENID', 'SEITENKENNUNG', 'PAGEID' ],
	'scriptpath'                => [ '0', 'SKRIPTPFAD', 'SCRIPTPATH' ],
	'stylepath'                 => [ '0', 'STILPFAD', 'STYLEPFAD', 'STYLEPATH' ],
	'grammar'                   => [ '0', 'GRAMMATIK:', 'GRAMMAR:' ],
	'gender'                    => [ '0', 'GESCHLECHT:', 'GENDER:' ],
	'notitleconvert'            => [ '0', '__KEINE_TITELKONVERTIERUNG__', '__NOTITLECONVERT__', '__NOTC__' ],
	'nocontentconvert'          => [ '0', '__KEINE_INHALTSKONVERTIERUNG__', '__NOCONTENTCONVERT__', '__NOCC__' ],
	'currentweek'               => [ '1', 'JETZIGE_KALENDERWOCHE', 'JETZIGE_WOCHE', 'CURRENTWEEK' ],
	'currentdow'                => [ '1', 'JETZIGER_WOCHENTAG_ZAHL', 'CURRENTDOW' ],
	'localweek'                 => [ '1', 'LOKALE_KALENDERWOCHE', 'LOKALE_WOCHE', 'LOCALWEEK' ],
	'localdow'                  => [ '1', 'LOKALER_WOCHENTAG_ZAHL', 'LOCALDOW' ],
	'revisionid'                => [ '1', 'REVISIONSID', 'VERSIONSID', 'REVISIONID' ],
	'revisionday'               => [ '1', 'REVISIONSTAG', 'VERSIONSTAG', 'REVISIONDAY' ],
	'revisionday2'              => [ '1', 'REVISIONSTAG2', 'VERSIONSTAG2', 'REVISIONDAY2' ],
	'revisionmonth'             => [ '1', 'REVISIONSMONAT', 'VERSIONSMONAT', 'REVISIONMONTH' ],
	'revisionmonth1'            => [ '1', 'REVISIONSMONAT1', 'VERSIONSMONAT1', 'REVISIONMONTH1' ],
	'revisionyear'              => [ '1', 'REVISIONSJAHR', 'VERSIONSJAHR', 'REVISIONYEAR' ],
	'revisiontimestamp'         => [ '1', 'REVISIONSZEITSTEMPEL', 'VERSIONSZEITSTEMPEL', 'REVISIONTIMESTAMP' ],
	'revisionuser'              => [ '1', 'REVISIONSBENUTZER', 'VERSIONSBENUTZER', 'REVISIONUSER' ],
	'revisionsize'              => [ '1', 'VERSIONSGRÖSSE', 'REVISIONSIZE' ],
	'fullurl'                   => [ '0', 'VOLLSTÄNDIGE_URL:', 'FULLURL:' ],
	'fullurle'                  => [ '0', 'VOLLSTÄNDIGE_URL_C:', 'FULLURLE:' ],
	'canonicalurl'              => [ '0', 'KANONISCHE_URL:', 'CANONICALURL:' ],
	'canonicalurle'             => [ '0', 'KANONISCHE_URL_C:', 'CANONICALURLE:' ],
	'lcfirst'                   => [ '0', 'INITIAL_KLEIN:', 'LCFIRST:' ],
	'ucfirst'                   => [ '0', 'INITIAL_GROSS:', 'UCFIRST:' ],
	'lc'                        => [ '0', 'KLEIN:', 'LC:' ],
	'uc'                        => [ '0', 'GROSS:', 'UC:' ],
	'raw'                       => [ '0', 'ROH:', 'RAW:' ],
	'displaytitle'              => [ '1', 'SEITENTITEL', 'DISPLAYTITLE' ],
	'newsectionlink'            => [ '1', '__NEUER_ABSCHNITTSLINK__', '__PLUS_LINK__', '__NEWSECTIONLINK__' ],
	'nonewsectionlink'          => [ '1', '__KEIN_NEUER_ABSCHNITTSLINK__', '__KEIN_PLUS_LINK__', '__NONEWSECTIONLINK__' ],
	'currentversion'            => [ '1', 'JETZIGE_VERSION', 'CURRENTVERSION' ],
	'urlencode'                 => [ '0', 'URLENKODIERT:', 'URLENCODE:' ],
	'anchorencode'              => [ '0', 'ANKERENKODIERT:', 'SPRUNGMARKEENKODIERT:', 'ANCHORENCODE' ],
	'currenttimestamp'          => [ '1', 'JETZIGER_ZEITSTEMPEL', 'CURRENTTIMESTAMP' ],
	'localtimestamp'            => [ '1', 'LOKALER_ZEITSTEMPEL', 'LOCALTIMESTAMP' ],
	'directionmark'             => [ '1', 'TEXTAUSRICHTUNG', 'DIRECTIONMARK', 'DIRMARK' ],
	'language'                  => [ '0', '#SPRACHE:', '#LANGUAGE:' ],
	'contentlanguage'           => [ '1', 'INHALTSSPRACHE', 'CONTENTLANGUAGE', 'CONTENTLANG' ],
	'pagesinnamespace'          => [ '1', 'SEITEN_IM_NAMENSRAUM:', 'SEITEN_IN_NR:', 'SEITEN_NR:', 'PAGESINNAMESPACE:', 'PAGESINNS:' ],
	'numberofadmins'            => [ '1', 'ADMINANZAHL', 'NUMBEROFADMINS' ],
	'formatnum'                 => [ '0', 'ZAHLENFORMAT', 'FORMATNUM' ],
	'padleft'                   => [ '0', 'FÜLLENLINKS', 'PADLEFT' ],
	'padright'                  => [ '0', 'FÜLLENRECHTS', 'PADRIGHT' ],
	'special'                   => [ '0', 'spezial', 'special' ],
	'speciale'                  => [ '0', 'speziale', 'speciale' ],
	'defaultsort'               => [ '1', 'SORTIERUNG:', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ],
	'filepath'                  => [ '0', 'DATEIPFAD:', 'FILEPATH:' ],
	'tag'                       => [ '0', 'erweiterung', 'tag' ],
	'hiddencat'                 => [ '1', '__VERSTECKTE_KATEGORIE__', '__WARTUNGSKATEGORIE__', '__HIDDENCAT__' ],
	'pagesincategory'           => [ '1', 'SEITEN_IN_KATEGORIE', 'SEITEN_KAT', 'SEITENINKAT', 'PAGESINCATEGORY', 'PAGESINCAT' ],
	'pagesize'                  => [ '1', 'SEITENGRÖSSE', 'PAGESIZE' ],
	'index'                     => [ '1', '__INDEXIEREN__', '__INDIZIEREN__', '__INDEX__' ],
	'noindex'                   => [ '1', '__NICHT_INDEXIEREN__', '__KEIN_INDEX__', '__NICHT_INDIZIEREN__', '__NOINDEX__' ],
	'numberingroup'             => [ '1', 'BENUTZER_IN_GRUPPE', 'NUMBERINGROUP', 'NUMINGROUP' ],
	'staticredirect'            => [ '1', '__PERMANENTE_WEITERLEITUNG__', '__STATICREDIRECT__' ],
	'protectionlevel'           => [ '1', 'SCHUTZSTATUS', 'PROTECTIONLEVEL' ],
	'cascadingsources'          => [ '1', 'KASKADENQUELLEN', 'CASCADINGSOURCES' ],
	'formatdate'                => [ '0', 'DATUMSFORMAT', 'formatdate', 'dateformat' ],
	'url_path'                  => [ '0', 'PFAD', 'PATH' ],
	'url_query'                 => [ '0', 'ABFRAGE', 'QUERY' ],
	'defaultsort_noerror'       => [ '0', 'keinfehler', 'noerror' ],
	'defaultsort_noreplace'     => [ '0', 'keineersetzung', 'noreplace' ],
	'pagesincategory_all'       => [ '0', 'alle', 'all' ],
	'pagesincategory_pages'     => [ '0', 'seiten', 'pages' ],
	'pagesincategory_subcats'   => [ '0', 'unterkategorien', 'unterkats', 'subcats' ],
	'pagesincategory_files'     => [ '0', 'dateien', 'files' ],
];

$datePreferences = [
	'default',
	'dmyt',
	'dmyts',
	'dmy',
	'ymd',
	'ISO 8601'
];

$defaultDateFormat = 'dmy';

$dateFormats = [
	'dmyt time' => 'H:i',
	'dmyt date' => 'j. F Y',
	'dmyt both' => 'j. M Y, H:i',

	'dmyts time' => 'H:i:s',
	'dmyts date' => 'j. F Y',
	'dmyts both' => 'j. M Y, H:i:s',

	'dmy time' => 'H:i',
	'dmy date' => 'j. F Y',
	'dmy both' => 'H:i, j. M Y',

	'ymd time' => 'H:i',
	'ymd date' => 'Y M j',
	'ymd both' => 'H:i, Y M j',

	'ISO 8601 time' => 'xnH:xni:xns',
	'ISO 8601 date' => 'xnY-xnm-xnd',
	'ISO 8601 both' => 'xnY-xnm-xnd"T"xnH:xni:xns'
];

$capitalizeAllNouns = true;
$bookstoreList = [
	'abebooks.de' => 'http://www.abebooks.de/servlet/BookSearchPL?ph=2&isbn=$1',
	'amazon.de' => 'https://www.amazon.de/gp/loadPage/field-isbn=$1',
	'buch.de' => 'http://www.buch.de/shop/home/suche/?sswg=BUCH&sq=$1',
	'Karlsruher Virtueller Katalog (KVK)' => 'http://www.ubka.uni-karlsruhe.de/kvk.html?SB=$1',
	'Lehmanns Fachbuchhandlung' => 'http://www.lob.de/cgi-bin/work/suche?flag=new&stich1=$1'
];

$separatorTransformTable = [ ',' => '.', '.' => ',' ];
$linkTrail = '/^([äöüßa-z]+)(.*)$/sDu';

$imageFiles = [
	'button-bold'     => 'de/button_bold.png',
	'button-italic'   => 'de/button_italic.png',
];
