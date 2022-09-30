<?php

//urls
// http://localhost:7200
// http://localhost:7200/index.php?index/list?type=1
// http://localhost:7200/index.php?index/detail?id=1

class IndexController
{
    public function actionIndex()
    {
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

        require_once dirname(__DIR__) . '/views/index/index.php';
    }

    public function actionTest()
    {
        echo "this is IndexController test action";
    }

    // http://localhost:8100/index.php?index/list?type=1&name=ning
    public function actionList()
    {
        // ------------------------------- Get query_string value - Start
        $queryString = $_SERVER ['QUERY_STRING'];

        // First split
        $realQueryString = explode('?', $queryString);
        // var_dump($realQueryString); // array(2) { [0]=> string(10) "index/list" [1]=> string(16) "type=1&name=ning" }
        
        // Second split
        $params = explode('&', $realQueryString[1]);
        // var_dump($params); // array(2) { [0]=> string(6) "type=1" [1]=> string(9) "name=ning" }

        // Third split, and make up associate array
        $paramArr = [];
        foreach ($params as $value) {
            $tmp = explode('=', $value);
            $paramArr[$tmp[0]] = $tmp[1];
        }
        
        // var_dump($paramArr); // array(2) { ["type"]=> string(1) "1" ["name"]=> string(4) "ning" }
        // ------------------------------- Get query_string value - End
        
        $type = $paramArr['type'];

        // mock data
        $list = [
            [
                'id' => 1,
                'type' => $type,
                'title' => 'this is title',
                'content' => 'this is content',
                'created_at' => '2022-09-15 18:20:00',
            ],
            [
                'id' => 2,
                'type' => $type,
                'title' => 'this is title',
                'content' => 'this is content',
                'created_at' => '2022-09-15 18:20:00',
            ],
            [
                'id' => 3,
                'type' => $type,
                'title' => 'this is title',
                'content' => 'this is content',
                'created_at' => '2022-09-15 18:20:00',
            ],
        ];

        require_once dirname(__DIR__) . '/views/index/list.php';
    }

    public function actionDetail()
    {
        $row = [
            'id' => 3,
            'title' => 'this is title',
            'content' => 'this is content',
            'created_at' => '2022-09-15 18:20:00',
        ];

        require_once dirname(__DIR__) . '/views/index/detail.php';
    }
}