CREATE TABLE tx_nseventmanager_domain_model_event (
	title varchar(255) NOT NULL DEFAULT '',
	description varchar(255) NOT NULL DEFAULT '',
	organizer_name varchar(255) NOT NULL DEFAULT '',
	mode varchar(255) NOT NULL DEFAULT '',
	location int(11) unsigned DEFAULT '0',
	image int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_nseventmanager_domain_model_location (
	name varchar(255) NOT NULL DEFAULT '',
	city varchar(255) NOT NULL DEFAULT '',
	zip_code text NOT NULL DEFAULT '',
	capacity int(11) NOT NULL DEFAULT '0'
);
