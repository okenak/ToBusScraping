<?php

namespace Src;

use Goutte\Client;

class Scraping {
	private $client;
	private $list = [];
	
	public function __construct($url)
	{
		$this->client = new Client();
		$this->setData($url);
	}
	
	private function setData($url)
	{
		$crawler = $this->client->request('GET', $url);
		$crawler->filter("table.timeTableWkd tr")->nextAll()->each(function ($dom) {
			$hour = $dom->filter("th")->text();
			$dom->filter("td")->each(function($dom) use ($hour) {
				$min = preg_replace('/[^0-9]/', '', $dom->text());
				if(!empty($min)) {
					$this->list[] ="{$hour}:{$min}";
				}
			});
		});
	}
	
	public function getData()
	{
		return $this->list;
	}
	
	public function putJson($name)
	{
		file_put_contents($name, json_encode($this->list));
	}
}