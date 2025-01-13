<?php
$wikis = [
    'gungale.wiki' => 'ggowiki',
    'meta.gungale.wiki' => 'meta',
];
if ( defined( 'MW_DB' ) ) {
    // Automatically set from --wiki option to maintenance scripts
    $wikiID = MW_DB;
} else {
    // Use MW_DB environment variable or map the domain name
    $wikiID = $_SERVER['MW_DB'] ?? $wikis[ $_SERVER['SERVER_NAME'] ?? '' ] ?? null;
}

if ( $wikiID ) {
    require_once "LocalSettings_$wikiID.php";
} else {
    die( 'Unknown wiki.' );
}

// Add any settings that should apply to all wikis below this line
// -------

$wgFooterIcons = [
	"poweredby" => [
		"mediawiki" => [
			// Defaults to point at
			// "$wgResourceBasePath/resources/assets/poweredby_mediawiki_88x31.png"
			// plus srcset for 1.5x, 2x resolution variants.
			"src" => "/resources/assets/Powered_by_MediaWiki.png",
			"url" => "//www.mediawiki.org/",
			"alt" => "Powered by MediaWiki",
		]
	],
	"hostedby" => [
		"mediawiki" => [
		    // Defaults to point at
			// "$wgResourceBasePath/resources/assets/poweredby_mediawiki_88x31.png"
			// plus srcset for 1.5x, 2x resolution variants.
			"src" => "/resources/assets/hosted_by_wikiseed.png",
			"url" => "//meta.gungale.wiki/",
			"alt" => "Hosted by Wikiseed",   
			"title" => "Hosted by Wikiseed",   
		]
	],
];