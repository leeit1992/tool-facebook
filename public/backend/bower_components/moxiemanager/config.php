<?php

	// General
	$moxieManagerConfig['general.license'] = '4QCP-UDGK-KPUO-MKLV-P4SW-GJEO-6PNH-FB3A';
	$moxieManagerConfig['general.hidden_tools'] = '';
	$moxieManagerConfig['general.disabled_tools'] = '';
	$moxieManagerConfig['general.plugins'] = 'Favorites,History,Uploaded,AutoRename';
	$moxieManagerConfig['general.demo'] = false;
	$moxieManagerConfig['general.debug'] = false;
	$moxieManagerConfig['general.language'] = 'en';
	$moxieManagerConfig['general.temp_dir'] = '';
	$moxieManagerConfig['general.allow_override'] = 'hidden_tools,disabled_tools';
        
	// Filesystem
	$moxieManagerConfig['filesystem.rootpath'] = $_SERVER['DOCUMENT_ROOT']."/travel/uploads"; 
	//$moxieManagerConfig['filesystem.rootpath'] = $rootpath;
	$moxieManagerConfig['filesystem.include_directory_pattern'] = '';
	$moxieManagerConfig['filesystem.exclude_directory_pattern'] = '/^mcith$/i';
	$moxieManagerConfig['filesystem.include_file_pattern'] = '';
	$moxieManagerConfig['filesystem.exclude_file_pattern'] = '';
	$moxieManagerConfig['filesystem.extensions'] = '*';
	$moxieManagerConfig['filesystem.readable'] = true;
	$moxieManagerConfig['filesystem.writable'] = true;
	$moxieManagerConfig['filesystem.allow_override'] = '*';

	// Createdir
	$moxieManagerConfig['createdir.templates'] = 'Image folder=/files/templates/directory';
	$moxieManagerConfig['createdir.include_directory_pattern'] = '';
	$moxieManagerConfig['createdir.exclude_directory_pattern'] = '';
	$moxieManagerConfig['createdir.allow_override'] = '*';

	// Createdoc
	$moxieManagerConfig['createdoc.templates'] = 'Index page=/files/templates/document.htm,Normal page=/files/templates/another_document.htm';
	$moxieManagerConfig['createdoc.fields'] = 'Document title=title';
	$moxieManagerConfig['createdoc.include_file_pattern'] = '';
	$moxieManagerConfig['createdoc.exclude_file_pattern'] = '';
	$moxieManagerConfig['createdoc.extensions'] = '*';
	$moxieManagerConfig['createdoc.allow_override'] = '*';

	// Upload
	$moxieManagerConfig['upload.include_file_pattern'] = '';
	$moxieManagerConfig['upload.exclude_file_pattern'] = '';
	$moxieManagerConfig['upload.extensions'] = '*';
	$moxieManagerConfig['upload.maxsize'] = '100MB';
	$moxieManagerConfig['upload.overwrite'] = false;
	$moxieManagerConfig['upload.autoresize'] = false;
	$moxieManagerConfig['upload.autoresize_jpeg_quality'] = 90;
	$moxieManagerConfig['upload.max_width'] = 800;
	$moxieManagerConfig['upload.max_height'] = 600;
	$moxieManagerConfig['upload.chunk_size'] = '5mb';
	$moxieManagerConfig['upload.allow_override'] = '*';

	// Rename
	$moxieManagerConfig['rename.include_file_pattern'] = '';
	$moxieManagerConfig['rename.exclude_file_pattern'] = '';
	$moxieManagerConfig['rename.include_directory_pattern'] = '';
	$moxieManagerConfig['rename.exclude_directory_pattern'] = '';
	$moxieManagerConfig['rename.extensions'] = '*';
	$moxieManagerConfig['rename.allow_override'] = '*';

	// Edit
	$moxieManagerConfig['edit.include_file_pattern'] = '';
	$moxieManagerConfig['edit.exclude_file_pattern'] = '';
	$moxieManagerConfig['edit.extensions'] = 'jpg,jpeg,png,gif,html,htm,txt';
	$moxieManagerConfig['edit.jpeg_quality'] = 90;
	$moxieManagerConfig['edit.allow_override'] = '*';

	// View
	$moxieManagerConfig['view.include_file_pattern'] = '';
	$moxieManagerConfig['view.exclude_file_pattern'] = '';
	$moxieManagerConfig['view.extensions'] = '*';
	$moxieManagerConfig['view.allow_override'] = '*';

	// Download
	$moxieManagerConfig['download.include_file_pattern'] = '';
	$moxieManagerConfig['download.exclude_file_pattern'] = '';
	$moxieManagerConfig['download.extensions'] = '*';
	$moxieManagerConfig['download.allow_override'] = '*';

	// Thumbnail
	$moxieManagerConfig['thumbnail.enabled'] = true;
	$moxieManagerConfig['thumbnail.auto_generate'] = true;
	$moxieManagerConfig['thumbnail.use_exif'] = true;
	$moxieManagerConfig['thumbnail.width'] = 90;
	$moxieManagerConfig['thumbnail.height'] = 90;
	$moxieManagerConfig['thumbnail.folder'] = 'mcith';
	$moxieManagerConfig['thumbnail.prefix'] = 'mcith_';
	$moxieManagerConfig['thumbnail.delete'] = true;
	$moxieManagerConfig['thumbnail.jpeg_quality'] = 75;
	$moxieManagerConfig['thumbnail.allow_override'] = '*';

    // Authentication
	//$moxieManagerConfig['authenticator'] = 'SessionAuthenticator';
    //$moxieManagerConfig['SessionAuthenticator.logged_in_key'] = "isLoggedIn";

    //$moxieManagerConfig['SessionAuthenticator.logged_in_key'] = "isLoggedIn";
	// SessionAuthenticator
    //session_start();
    //$_SESSION['isLoggedIn'] = true; // True/false if user is logged in or not, should be same as above
    //$_SESSION['moxiemanager.filesystem.rootpath']="../../../../../moxiemanager/data/files/administrator";

	//$moxieManagerConfig['SessionAuthenticator.logged_in_key'] = false;
	//$moxieManagerConfig['SessionAuthenticator.user_key'] = 'user';
	//$moxieManagerConfig['SessionAuthenticator.config_prefix'] = 'moxiemanager';

	// IpAuthenticator
	$moxieManagerConfig['IpAuthenticator.ip_numbers'] = '127.0.0.1';

	// ExternalAuthenticator
	//$moxieManagerConfig['ExternalAuthenticator.external_auth_url'] = '';
	//$moxieManagerConfig['ExternalAuthenticator.secret_key'] = '';

	// Local filesystem
	$moxieManagerConfig['filesystem.local.wwwroot'] = '';
	$moxieManagerConfig['filesystem.local.urlprefix'] = '{proto}://{host}/';
	$moxieManagerConfig['filesystem.local.urlsuffix'] = '';
	$moxieManagerConfig['filesystem.local.access_file_name'] = 'mc_access';
	$moxieManagerConfig['filesystem.local.allow_override'] = '*';

	// Log
	$moxieManagerConfig['log.enabled'] = false;
	$moxieManagerConfig['log.level'] = 'error';
	$moxieManagerConfig['log.path'] = 'data/logs';
	$moxieManagerConfig['log.filename'] = '{level}.log';
	$moxieManagerConfig['log.format'] = '[{time}] [{level}] {message}';
	$moxieManagerConfig['log.max_size'] = '100k';
	$moxieManagerConfig['log.max_files'] = '10';
	$moxieManagerConfig['log.filter'] = '';

	// Storage
	$moxieManagerConfig['storage.engine'] = 'json';
	$moxieManagerConfig['storage.path'] = './data/storage';

	// AutoFormat plugin
	$moxieManagerConfig['autoformat.rules'] = '';
	$moxieManagerConfig['autoformat.jpeg_quality'] = 90;
	$moxieManagerConfig['autoformat.delete_format_images'] = true;

	// AutoRename, remember to include it in your plugin config.
	$moxieManagerConfig['autorename.enabled'] = true;
	$moxieManagerConfig['autorename.spacechar'] = "_";
	$moxieManagerConfig['autorename.lowercase'] = false;

	// BasicAuthenticator plugin
	/*$moxieManagerConfig['basicauthenticator.users'] = array(
		array("username" => "onegocorp", "password" => "onego", "groups" => array("administrator")),
        array("username" => "onegocorp1", "password" => "onego1", "groups" => array("user"))
	);*/
/*
	// GoogleDrive
	$moxieManagerConfig['googledrive.client_id'] = '';

	// DropBox
	$moxieManagerConfig['dropbox.app_id'] = '';

	// Amazon S3 plugin
	$moxieManagerConfig['amazons3.buckets'] = array(
		'bucketname' => array(
			'publickey' => '',
			'secretkey' => ''
		)
	);

	// Ftp plugin
	$moxieManagerConfig['ftp.accounts'] = array(
		'ftpname' => array(
			'host' => '',
			'user' => '',
			'password' => '',
			'rootpath' => '/',
			'wwwroot' => '/',
			'passive' => true
		)
	);*/

	// Favorites plugin
	$moxieManagerConfig['favorites.max'] = 20;

	// History plugin
/*	$moxieManagerConfig['history.max'] = 20;
    $moxieManagerConfig['sql.connection'] = 'mysql:host=localhost;dbname=users';
    $moxieManagerConfig['sql.username'] = 'root';
    $moxieManagerConfig['sql.password'] = 'root';*/
    //$moxieManagerConfig['sql.table_prefix'] = 'og_';
?>