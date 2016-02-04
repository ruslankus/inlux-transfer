<?php

class ServicesPart extends CWidget {

    public $part;

    public function run()
    {
        $category_left = LuxTree::model()->findByAttributes(array('type' => Constants::LUX_TYPE_SERVICE_PAGE_1, 'status' => Constants::STATUS_VISIBLE));
        $category_right = LuxTree::model()->findByAttributes(array('type' => Constants::LUX_TYPE_SERVICE_PAGE_2, 'status' => Constants::STATUS_VISIBLE));

        if($category_left != null)
        {
            $left_blocks = LuxContentUnit::model()->findAllByAttributes(array('tree_id' => $category_left->id));
        }
        else
        {
            $left_blocks = array();
        }

        if($category_right != null)
        {
            $right_blocks = LuxContentUnit::model()->findAllByAttributes(array('tree_id' => $category_right->id));
        }
        else
        {
            $right_blocks = array();
        }

        $this->render('services_part',array('left_blocks' => $left_blocks, 'right_blocks' => $right_blocks, 'part' => $this->part));
    }
}