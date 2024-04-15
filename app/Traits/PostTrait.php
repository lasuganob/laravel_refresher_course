<?php

namespace App\Traits;

use Kris\LaravelFormBuilder\Field;

trait PostTrait {
    /**
     * @param mixed (FormBuilder Facade, Post instance)
     * return HTML Form
     * Generate create post form
     */

     public function createPostForm($formBuilder, $url) {
        $form = $formBuilder->createByArray([
            [
                'name'=> 'title',
                'type' => Field::TEXT,
            ],
            [
                'name'=> 'content',
                'type' => Field::TEXTAREA,
            ],
            [
                'name'=> 'status',
                'type' => Field::CHECKBOX,
                'label' => 'Check to show post'
            ],
            [
                'name' => 'submit',
                'type' => Field::BUTTON_SUBMIT,
                'label' => 'Create Post',
                'attr' => ['class' => 'btn btn-primary mt-3'],
            ]
        ]
        ,[
            'method' => 'POST',
            'url' => route($url),
            'attr' => ['class'=> 'mt-5'],
        ]);

        return $form;
     }

     /**
      * @param mixed (FormBuilder Facade, Post instance)
      * return HTML Form
      * Generate Edit Post Form
      */
    public function editPostForm($formBuilder, $post) {
        $form = $formBuilder->createByArray([
            [
                'name'=> 'title',
                'type' => Field::TEXT,
                'value' => $post->title,
            ],
            [
                'name'=> 'content',
                'type' => Field::TEXTAREA,
                'value' => $post->content,
            ],
            [
                'name'=> 'status',
                'type' => Field::CHECKBOX,
                'label' => 'Check to show post',
                'checked' => $post->status ? 'checked' : '',
            ],
            [
                'name' => 'submit',
                'type' => FIELD::BUTTON_SUBMIT,
                'label' => 'Update Post',
                'attr' => ['class' => 'btn btn-primary mt-3'],
            ]
        ]
        ,[
            'method' => 'PUT',
            'url' => route(role_prefix() . '.posts.update',[$post]),
            'attr' => ['class'=> 'mt-5'],
        ]);

        return $form;
    }

}
