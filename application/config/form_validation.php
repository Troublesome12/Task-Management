<?php

$config = array(

        'createTask' => array(
                array(
                        'field' => 'name',
                        'label' => 'Task',
                        'rules' => 'trim|required|max_length[500]'
                ),
                array(
                        'field' => 'description',
                        'label' => 'Description',
                        'rules' => 'trim|required'
                )
        )
);