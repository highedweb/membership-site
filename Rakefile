desc "Split file `database.sql` into `database-1.sql`, `database-2.sql`, etc"
task :splitdbdump do
	filenum = 1
	buffer = ''
	outf = File.open("database-#{filenum}.sql", "w")
	File.open('database.sql', 'r').each_line do |line|
		buffer = buffer + line
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

### :prepsidekick was a false start in speeding up the copy to WPEngine.  Has since been replaced by git.  Committed for historical interest.

desc "prepare sidekick.php and sidekick.tgz for uploading many files to WPEngine"
task :prepsidekick do
	outfname = File.join(File.dirname(__FILE__), 'sidekick.php')
	File.open(outfname, 'w') do |f|
		f.write <<EOS
		<?php
		try { 
			$src = dirname(__FILE__) . "/sidekick.tgz";
			$tar_tmpfile = dirname(__FILE__) . "/sidekick.tar";
			$target_dir = dirname(__FILE__);
			$phar = new PharData($src);
			$phar->decompress();
			echo "untarring from ". $src ." to ". $target_dir . "<br/><br/>";
			$phar->extractTo($target_dir, null, true);
			echo "Success.  Unlinking the .tgz and the newly created .tar...";
			unlink($src);
			unlink($tar_tmpfile);
			echo "Success.  And finally, unlinking myself...";
			unlink(__FILE__);
			echo "Success.  Goodbye.";
		} catch (Exception $e) {
			echo "Trouble in paradise:<br/><br/>";
			var_dump($e);
		}
		?>
EOS
	end

	## TODO: implement fixups to civicrm files


	root = File.dirname(__FILE__)
	filez = []
	filez << 'wp-content/plugins'
	filez << 'wp-content/themes/HighEdWeb2010\\ Theme'
	filez << 'wp-content/uploads'
	
	cmd = "pushd #{File.dirname(__FILE__)} ; tar -czf sidekick.tgz #{filez.join(' ')}; popd"
	puts cmd
	system cmd
	
	puts 'now, execute the following:'
	puts 'printf "put sidekick.php\nput sidekick.tgz" | sftp woodwardjd@woodwardjd.wpengine.com'
	
	## TODO: add SFTP commands for deleting existing directories
end

