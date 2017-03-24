<?php
// model data mocking
class Users {
    private $users = [
        ['id' => 1, 'name' => 'Anna'],
        ['id' => 2, 'name' => 'Buddy'],
        ['id' => 3, 'name' => 'Clayon'],
        ['id' => 4, 'name' => 'Daniel'],
        ['id' => 5, 'name' => 'Epsilon'],
        ['id' => 6, 'name' => 'Frank'],
        ['id' => 7, 'name' => 'Gambit'],
        ['id' => 8, 'name' => 'Harry']
    ];

    public function getUser($id = false) {
        if (!$id) {
            return $this->users;
        } else {
            $key = array_search($id, array_column($this->users, 'id'));
            return ($key !== false) ? $this->users[$key]: null;
        }
    }
}

$users = new Users();

// response header Content-Type
header('Content-Type: application/json');

// response status
$response = [
    'status' => [
        'code' => 400,
        'message' => 'Bad Request'
    ]
];
// response data
$data = [
    'data' => null
];

// determine request method
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $response = [
            'status' => [
                'code' => 200,
                'message' => 'OK'
            ]
        ];

        $id = $_GET['id'];
        // you can validate $id (to prevent SQL injection)

        $data['data'] = $users->getUser($id);

        break;
    case 'POST':
        // create new model data

        break;
    case 'PATCH':
    case 'PUT':
        // update model data by id

        break;
    case 'DELETE':
        // delete model data by id

        break;
}

// response as json
echo json_encode(array_merge($response, $data));
?>
