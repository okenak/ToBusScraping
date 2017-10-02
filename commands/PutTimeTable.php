<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Src\Scraping;

class PutTimeTable extends Command{
	
	protected function configure()
	{
		$this->setName('run:putTimeTable');
		$this->setDescription('都バスの時刻表データを抽出してファイルへ出力します');
		$this->addArgument('url', InputArgument::REQUIRED, '都バスの時刻表URL');
		$this->addArgument('filepath', InputArgument::REQUIRED, '保存先/ファイル名');
	}
	
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$scraping = new Scraping($input->getArgument('url'));
		$scraping->putJson($input->getArgument('filepath'));
	}
}