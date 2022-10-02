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

// 定义常用常量
defined('APP') or define('APP', dirname(__DIR__));
defined('HTTP') or define('HTTP', APP . DIRECTORY_SEPARATOR . 'http');

// 检测环境，定义是否开启debug模式
/** 应该根据[检测]环境而定, 方法有很多, 这里用的是HTTP_HOST检测的方式*/
$env = ['yapf.test', 'yapf.test:8080', 'localhost:7400', 'localhost:8080', 'localhost:9000']; // 非生产环境
if (in_array($_SERVER['HTTP_HOST'], $env)) {
    defined('DEBUG') or define('DEBUG', true);
} else {
    defined('DEBUG') or define('DEBUG', false);
}

/** [使用composer之前] 引入composer的vendor的类 [ Register The Auto Loader ] */
require APP . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// 注意: 有个问题: 当display_errors关闭时，那么有些报错，如这里的
// Fatal error: Uncaught Error: Class "Whoops\Run" not found .. 
// 将不会展示在前端页面上，会正常显示后面输出的内容.
if (DEBUG) {
    ini_set('display_errors', 'On');

    /** 使用Whoops报错[下面官方最简单的用法] */
    /* $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();*/

    //或者[自定义报错信息]

    $whoops = new \Whoops\Run;
    $option = new \Whoops\Handler\PrettyPageHandler();
    $errorTile = '框架出错了';
    $option->setPageTitle($errorTile);
    $whoops->pushHandler($option);
    $whoops->register();

} else {
    ini_set('display_errors', 'Off');
}

// 引入公共助手函数
require dirname(__DIR__) . '/common/functions.php';

// 引入框架内核类
require dirname(__DIR__) . '/core/Kernel.php';

// 注册框架内核自动加载机制
spl_autoload_register('\core\Kernel::load');

// 运行框架内核
\core\Kernel::run();
