<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CustomerForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label'=> 'Full Name',
                'rules' => 'required|min:5',
            ])
            ->add('user_id', 'text', [
                'label'=> 'User ID',
            ])
            ->add('submit', 'submit', [
                'label' => 'Save Customer',
            ]);
    }
}
