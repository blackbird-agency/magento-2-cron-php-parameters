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

namespace Blackbird\CronParameters\Crontab;

use Magento\Framework\Crontab\TasksProviderInterface;

class TasksProvider implements TasksProviderInterface
{
    /**
     * @var array
     */
    protected $tasks = [];

    /**
     * @param array $tasks
     */
    public function __construct(array $tasks = [])
    {
        $this->tasks = $tasks;
    }

    /**
     * {@inheritdoc}
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Save Tasks
     *
     * @param $tasks
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }
}
