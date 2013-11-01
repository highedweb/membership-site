desc "Split file `database.sql` into `database-1.sql`, `database-2.sql`, etc"
task :splitdbdump do
	filenum = 1
	buffer = ''
	outf = File.open("database-#{filenum}.sql", "w")
	File.open('database.sql', 'r').each_line do |line|
		buffer = buffer + line
		
		## TODO: implement database translations.  This is possible here because the exports don't split records across lines
		## * /homepages/41/d483464789/htdocs/membership/wp-content/ => /nas/wp/www/sites/woodwardjd/wp-content/
		## * http://membership.highedweb.org => http://woodwardjd.wpengine.com
		
		
		if buffer.size > (3.5 * 1024 * 1024) && line =~ /Table structure for/
			outf.write buffer
			outf.close
			buffer = ''
			filenum = filenum + 1
			outf = File.open("database-#{filenum}.sql", "w")
		end
	end
	outf.write buffer
	outf.close
end

desc "output SFTP copy command to send up non-committed configuration files"
task :sftp_private_config_files do
	puts 'printf "put wp-config.php\nput wp-content/plugins/civicrm/civicrm.settings-private.php wp-content/plugins/civicrm/civicrm.settings-private.php" | sftp woodwardjd@woodwardjd.wpengine.com'
end

desc "seed non-committed configuration files.  Note that the deets will need to be filled in from elsewhere."
task :seed_private_config_files do
	### WordPress private configuration 
	outfname = File.join(File.dirname(__FILE__), '/wp-config.php')
	if File.exist? outfname
		puts "file #{outfname} already exists; please delete before running me if you really meant to overwrite it"
	else
		File.open(outfname, 'w') do |f|
			f.write <<EOS
<?php
define('DB_PASSWORD',      '---'); 
define('AUTH_KEY',         '---');
define('SECURE_AUTH_KEY',  '---');
define('LOGGED_IN_KEY',    '---');
define('NONCE_KEY',        '---');
define('AUTH_SALT',        '---');
define('SECURE_AUTH_SALT', '---');
define('LOGGED_IN_SALT',   '---');
define('NONCE_SALT',       '---');

require_once('wp-config-public.php');
?>		
EOS
		end
	end
	
	### CiviCRM private configuration 
	outfname = File.join(File.dirname(__FILE__), '/wp-content/plugins/civicrm/civicrm.settings-private.php')
	if File.exist? outfname
		puts "file #{outfname} already exists; please delete before running me if you really meant to overwrite it"
	else
		File.open(outfname, 'w') do |f|
			f.write <<EOS
<?php
define( 'CIVICRM_UF_DSN'  , 'mysql://woodwardjd:---@localhost/wp_woodwardjd?new_link=true' );
define( 'CIVICRM_DSN'     , 'mysql://woodwardjd:---@localhost/wp_woodwardjd?new_link=true' );
define( 'CIVICRM_SITE_KEY', '---' );
?>		
EOS
		end
	end
end
