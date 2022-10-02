<?php

namespace http\controller;

//urls
// http://localhost:7200
// http://localhost:7200/index.php?index/list?type=1
// http://localhost:7200/index.php?index/detail?id=1

class SiteController
{
    public function actionIndex()
    {
        // Render view
        $list = [
            [
                'count' => 1,
                'type' => 1,
                'name' => '分类1',
            ],
            [
                'count' => 2,
                'type' => 2,
                'name' => '分类2',
            ],
            [
                'count' => 3,
                'type' => 3,
                'name' => '分类3',
            ],
        ];

        require_once dirname(__DIR__) . '/views/site/index.php';
    }

    public function actionList()
    {
        $row = [
            'id' => 3,
            'title' => 'this is title',
            'content' => 'this is content',
            'created_at' => '2022-09-15 18:20:00',
        ];

        // Return json response
        // Set response head: content-type: application/json; charset=UTF-8
        // otherwise, the value is content-type: text/html; charset=UTF-8
        header("content-type:application/json; charset=UTF-8");
        // Output response body content
        echo json_encode($row);
    }
}