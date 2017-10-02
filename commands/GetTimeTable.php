<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Src\Scraping;

class GetTimeTable extends Command{

	protected function configure()
	{
		$this->setName('run:getTimeTable');
		$this->setDescription('都バスの時刻表データを抽出して標準出力します');
		$this->addArgument('url', InputArgument::REQUIRED, '都バスの時刻表URL');
	}
	
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$scraping = new Scraping($input->getArgument('url'));
		$output->writeln($scraping->getData());
	}
}