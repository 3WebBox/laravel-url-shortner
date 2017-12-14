<h1><center>Laravel Url Shortner</center></h1>
<p>
	Laravel Url Shorter is a simple helper code that allows developers to transform an Url to a random alpha numeric mask. Orignal URL is captured and recorded into database url_shortner table.
</p>
<p class="notes">
	Note* :- This repo is open for development for developers, kindly contribute your views and make this help to flourish and used by as many developers as possible in our development community.
</p>
<p>
	<h4>Following points guide you towards usig the code in your application :-</h4>
	<ul>
		<li>Add this line in composer.json file 
			"files":[
            "app/Helpers/UrlShortener.php"
        	]	
    	</li>
    	<li>Install Migration by keeping file in database/migrations folder</li>    	
		<li>Keep Model with other Models of you application</li>
    	<li>Create a folder app/Helpers and copy "UrlShortner.php" to Helpers folder</li>
		<li>Through cmd/terminal enter to your application folder and run composer "composer dump-autoload"</li>    	
		<li>Use URL shortner helper in your application with statement "use App\Helpers\UrlShortner"</li>    	
		<li>Keep Model with other Models of you application</li>
		<li>To generate a masked URL use this statment UrlShortner->maskUrl('Pass url you want to mask here'); (Hold your masked url in a variable)</li>   	
	</ul>
</p>