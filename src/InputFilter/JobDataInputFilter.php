<?php
/**
 * @filesource
 * @copyright (c) 2013 - 2017 Cross Solution (http://cross-solution.de)
 * @license MIT
 * @author Miroslav Fedeleš <miroslav.fedeles@gmail.com>
 * @since 0.30
 */
namespace SimpleImport\InputFilter;

use Zend\InputFilter\InputFilter;

class JobDataInputFilter extends InputFilter
{

    public function __construct()
    {
        $this->add([
            'name' => 'id',
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ]
        ])->add([
            'name' => 'title',
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ]
        ])->add([
            'name' => 'location',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ]
        ])->add([
            'name' => 'company',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ]
        ])->add([
            'name' => 'reference',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ]
        ])->add([
            'name' => 'contactEmail',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'EmailAddress'
                ]
            ]
        ])->add([
            'name' => 'language',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ]
        ])->add([
            'name' => 'link',
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'Uri',
                    'options' => [
                        'allowRelative' => false
                    ]
                ]
            ]
        ])->add([
            'name' => 'datePublishStart',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'Date',
                    'options' => [
                        'format' => 'd.m.Y'
                    ]
                ]
            ]
        ])->add([
            'name' => 'datePublishEnd',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'Date',
                    'options' => [
                        'format' => 'd.m.Y'
                    ]
                ]
            ]
        ])->add([
            'name' => 'logoRef',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'Uri',
                    'options' => [
                        'allowRelative' => false
                    ]
                ]
            ]
        ])->add([
            'name' => 'linkApply',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'Uri',
                    'options' => [
                        'allowRelative' => false
                    ]
                ]
            ]
        ]);
        
        // TODO: implement classifications
    }
}