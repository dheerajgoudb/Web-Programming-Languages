<?php
	class Flickr 
	{ 
		
		private $apiKey; 
		
		public function __construct($apikey = null) 
		{
			$this->apiKey = $apikey;
		} 
		
		public function search($query = null, $user_id = null, $per_page = 200, $format = 'php_serial', $sort = 'date-taken-desc') 
		{
			$args = array(
				'method' => 'flickr.photos.search',
				'api_key' => $this->apiKey,
				'text' => urlencode($query),
				'user_id' => $user_id,
				'per_page' => $per_page,
				'format' => $format,
				'sort' => $sort,
			);
			$url = 'http://flickr.com/services/rest/?'; 
			$search = $url.http_build_query($args);
			echo '<h1>Keyword: Dogs</h1>';
			$result = file_get_contents($search);
			if ($format == 'php_serial') $result = unserialize($result); 
			return $result; 
		} 
		
		private function file_get_contents_curl($url) 
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36');
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$data = curl_exec($ch);
			$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
			echo $retcode;
			if ($retcode == 200) 
			{
				return $data;
			} 
			else 
			{
				return null;
			}
		}	
	}

	$Flickr = new Flickr('78dc2b13d9cc1127139a1aa12bf9fcc6'); 
	$data = $Flickr -> search('dogs'); 
	foreach($data['photos']['photo'] as $photo) 
	{  
		echo '<a href="http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg" target="_blank"><img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '_t.jpg"></a>';
	}
?>