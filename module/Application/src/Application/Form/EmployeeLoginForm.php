<?php

namespace Clinician\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;

use Zend\Form\Form;

class EmployeeLoginForm extends Form
{
    protected $inputFilter;

    public function __construct($name = null)
    {
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'userid',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'required '

            ),
            'options' => array(
                'label' => 'userid',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type'  => 'password',
                'class' => 'required minlength:6 maxlength:20'
            ),

            'options' => array(
                'label' => 'Password',
            ),
        ));
        

     
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'login',
                'id' => 'login',
            ),
        ));

        $this->setInputFilter($this->getInputFilter());

    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'EmailAddress',
                        'options' => (array(
                            'encoding' => 'UTF-8',
                            'min'      => 5,
                            'max'      => 255,
                        )),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'password',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StringTrim'),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}