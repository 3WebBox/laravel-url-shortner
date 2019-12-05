<h1><center>Laravel Url Shortner</center></h1>
<p>
	Laravel Url Shorter is a simple helper code that allows developers to transform an Url to a random alpha numeric mask. Orignal URL is captured and recorded into database url_shortner table.
</p>
<p class="notes">
	Note* :- This repo is open for development for developers, kindly contribute your views and make this help to flourish and used by as many developers as possible in our development community. This Repo works with uuid if you want to work with id then update models and migration
</p>
<p>
	<h4>Following points guide you towards usig the code in your application :-</h4>
	<ul>
		<li>Create a folder app/Helpers and copy "UrlShortner.php" to Helpers folder or anyother location in your project</li>
		<li>Add this line in composer.json file 
			"files":[
            "app/Helpers/UrlShortener.php" // Path to you UrlShortener.php file
        	]	
    	</li>
    	<li>Install Migration by keeping file in database/migrations folder</li>
		<li>Keep Models in the Models folder or with other Models of your application then adjust namespace</li>
    	<li>Through cmd/terminal enter to your application folder and run composer <b>composer dump-autoload</b></li>
		<li>To generate a masked URL use this statment $url = maskUrl('Pass url you want to mask here');</li>
		<li>In controller paste following line
			<p>
				public function generateRealUrl($maskUrl){
		     		return redirect(getRealUrl($maskUrl));
		    	}
		    </p>
		</li>
		<li>In api.php file paste following lines
			<p>
				Route::prefix('s')->group(function() {
					Route::get('{maksed_url}', 'Controller@generateRealUrl');
				});	
			</p>
		</li>
	</ul>
</p>