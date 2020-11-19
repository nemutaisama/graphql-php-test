<?php

namespace App;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class RootQuery extends ObjectType
{

    public function __construct(Registry $types)
    {
        parent::__construct([
            'name'   => 'Query',
            'fields' => [
                'echo' => [
                    'type'    => Type::string(),
                    'args'    => [
                        'input' => $types->echoInput()
                    ],
                    'resolve' => function ($rootValue, $args) {
                        $rec = function ($input) use (&$rec) {
                            if (!isset($input['nextMessage'])) {
                                return $input['message'];
                            }
                            return $input['message'] . ' ' . $rec($input['nextMessage']);
                        };
                        return $rec($args['input']);
                    }
                ],
            ],
        ]);
    }
}
