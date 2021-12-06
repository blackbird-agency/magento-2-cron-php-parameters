<?php

/**
 * Blackbird Cron Php Parameters Module
 *
 * NOTICE OF LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to contact@bird.eu so we can send you a copy immediately.
 *
 * @category        Blackbird
 * @package         Blackbird_CronParameters
 * @copyright       Copyright (c) Blackbird (https://black.bird.eu)
 * @author          Blackbird Team
 * @license         MIT
 * @support         https://github.com/blackbird-agency/magento-2-cron-php-parameters/issues/new
 */

namespace Blackbird\CronParameters\Cron\Console\Command;

use Magento\Framework\Crontab\CrontabManagerInterface;
use Magento\Framework\Crontab\TasksProviderInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CronInstallCommand extends \Magento\Cron\Console\Command\CronInstallCommand
{
    private const COMMAND_OPTION_PARAMS = 'params';
    private const COMMAND_OPTION_PARAMS_SHORTCUT = 'p';

    /**
     * @var TasksProviderInterface
     */
    protected $tasksProvider;

    /**
     * CronInstallCommand constructor.
     * @param CrontabManagerInterface $crontabManager
     * @param TasksProviderInterface $tasksProvider
     */
    public function __construct(CrontabManagerInterface $crontabManager, TasksProviderInterface $tasksProvider)
    {
        $this->tasksProvider = $tasksProvider;
        parent::__construct($crontabManager, $tasksProvider);
    }

    protected function configure()
    {
        $this->addOption(self::COMMAND_OPTION_PARAMS, self::COMMAND_OPTION_PARAMS_SHORTCUT, InputOption::VALUE_REQUIRED, 'Adding php params on cron execution.');
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $params = $input->getOption(self::COMMAND_OPTION_PARAMS);
        if (isset($params[0]) && $params[0] === '=') {
            $params = substr($params, 1);
        }

        if ($params) {
            $tasks = $this->tasksProvider->getTasks();
            foreach ($tasks as $key => &$task) {
                $task['command'] = $params . ' ' . $task['command'];
            }
            $this->tasksProvider->setTasks($tasks);
        }
        return parent::execute($input, $output);
    }
}
