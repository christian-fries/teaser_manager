CREATE TABLE tx_teasermanager_domain_model_teaser (
	name varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	subtitle varchar(255) DEFAULT '' NOT NULL,
	link_text varchar(255) DEFAULT '' NOT NULL,
	link varchar(255) DEFAULT '' NOT NULL,
	text text NOT NULL,
	date int(11) DEFAULT '0' NOT NULL,
	color int(11) unsigned DEFAULT '0' NOT NULL,
	icon varchar(255) DEFAULT '' NOT NULL,
	selected_icon varchar(255) DEFAULT '' NOT NULL,
	style varchar(255) DEFAULT '' NOT NULL,
	person int(11) unsigned DEFAULT '0' NOT NULL,
	persons int(11) unsigned DEFAULT '0' NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	images int(11) unsigned NOT NULL default '0',
	size varchar(255) DEFAULT '' NOT NULL,
	type varchar(255) DEFAULT '' NOT NULL,
);

CREATE TABLE tx_teasermanager_domain_model_teasertype (
	title varchar(255) DEFAULT '' NOT NULL,
	fields varchar(255) DEFAULT '' NOT NULL,
	layouts int(11) unsigned DEFAULT '0' NOT NULL,
);

CREATE TABLE tx_teasermanager_domain_model_teaserlayout (
	title varchar(255) DEFAULT '' NOT NULL,
);

CREATE TABLE tt_content (
	teaser_type int(11) unsigned DEFAULT '0' NOT NULL,
	teaser_layout int(11) unsigned DEFAULT '0' NOT NULL,
	teaser_items int(11) unsigned DEFAULT '0' NOT NULL,
);

CREATE TABLE tx_teasermanager_ttcontent_teaser_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_teasermanager_teasertype_teaserlayout_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_teasermanager_teaser_person_mm (
    uid_local int(11) DEFAULT '0' NOT NULL,
    uid_foreign int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,

    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);
