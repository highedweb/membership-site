desc "Split file `database.sql` into `database-1.sql`, `database-2.sql`, etc"
task :splitdbdump do

	## TODO: automatically add preamble / postamble to each -##.sql file (is this easy??)
	## * tables / content that can be dropped per CiviCRM migration docs
	##    - civicrm_domain
	##    - civicrm_acl_cache
	##    - civicrm_acl_contact_cache
	##    - civicrm_cache
	##    - civicrm_group_contact_cache
	## TODO: can these actually not be migrated?  docs say so, but FKs and such in the dump file wouldn't migrate.  Are those shitty docs or do they get recreated?
	## TODO: I'm thinking that the Right Way is to do a deep serialization-understood translation of the SQL - through the python sqlparse module I found.
	## * /homepages/41/d483464789/htdocs/membership/wp-content/ => /nas/wp/www/sites/woodwardjd/wp-content/
	##   - none of this exists after dropping the aforementioned tables; TODO: need to put in a warning if we see it
	## * http://membership.highedweb.org => http://membership.jwoodward.com
	##   - civicrm_setting, some includes PHP serialization
	##   - wp_membership_options, includes PHP serialization
	##   - wp_membership_postmeta, includes PHP serialization
	##   - wp_membership_posts, includes PHP serialization
	##   NOTE: using membership.jwoodward.com instead of woodwardjd.wpengine.com makes it so PHP serialization doesn't need to be fixed up (same length)

	## CiviCRM URLs to hit and confirm entries after doing a flush and import of the database-NN.sql files
	## http://membership.highedweb.org/wp-admin/admin.php?page=CiviCRM&q=civicrm/admin/setting/updateConfigBackend&reset=1
	## http://membership.highedweb.org/wp-admin/admin.php?page=CiviCRM&q=civicrm/admin/setting/path&reset=1
	## http://membership.highedweb.org/wp-admin/admin.php?page=CiviCRM&q=civicrm/menu/rebuild&reset=1
	
	filenum = 1
	buffer = ''
	outf = File.open("database-#{filenum}.sql", "w")
	outf_written_bytes = 0
	File.open('database.sql', 'r').each_line do |line|
		## buffer includes all lines prior to it hitting "Table structure for"
		if line =~ /Table structure for/
			## encountering a new table.  Write out the buffer or skip it, translating it if necessary
			if buffer =~ /Table structure for table \`(\w+)\`/
				puts "found table #{$1}"
				#if %w(civicrm_domain civicrm_acl_cache civicrm_acl_contact_cache civicrm_cache civicrm_group_contact_cache).include? $1
					## do nothing; drop it!
				#else 
					## do translations
					buffer.gsub! 'DEFINER=`dbo483610499`', 'DEFINER=`hewmembership`'
					## no hostname translation now that we're using this to do the real membership -> membership migration
					#buffer.gsub! 'membership.highedweb.org', 'membership.jwoodward.com'
					outf.write buffer
					outf_written_bytes = outf_written_bytes + buffer.size
					if outf_written_bytes > (3.5 * 1024 * 1024)
						outf_written_bytes = 0
						outf.close
						buffer = ''
						filenum = filenum + 1
						outf = File.open("database-#{filenum}.sql", "w")
					end
				#end
			else
				outf.write buffer
				outf_written_bytes = outf_written_bytes + buffer.size
			end
			buffer = line
		else
			buffer = buffer + line
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
