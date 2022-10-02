<?php

// 实现思路
// 核心功能
// 1. 定义常量
    // 1.1 常用常量

// 2. 启动框架核心
    // 2.1 实现路由
    // 2.2 实现MVC

// 3. 优化和扩展
    // 3.1 项目目录优化/重构
    // 3.2 引入composer自动加载机制
    // 3.3 引入公共函数

defined('APP') or define('APP', dirname(__DIR__));
defined('HTTP') or define('HTTP', APP . DIRECTORY_SEPARATOR . 'http');
defined('IS_DEBUG') or define('IS_DEBUG', true);  // FYI Dev: true, Non-dev: false

require dirname(__DIR__) . '/common/functions.php';

require dirname(__DIR__) . '/core/Kernel.php';
spl_autoload_register('\core\Kernel::load');

\core\Kernel::run();
