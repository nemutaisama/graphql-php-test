<?php

namespace App;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class EchoInput extends InputObjectType
{
    public function __construct(Registry $types)
    {
        parent::__construct([
            'name' => 'EchoInput',
            'fields' => [
                'message' => Type::string(),
                'nextMessage' => function() use ($types) {
                    return  $types->echoInput();
                }
            ],
        ]);
    }
}
