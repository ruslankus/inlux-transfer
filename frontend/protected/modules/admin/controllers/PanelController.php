<?php

class PanelController extends ControllerAdmin
{

    /******************************************************************************************************************
     ***********************************************  L O G I N ********************************************************
     ******************************************************************************************************************/

    // R E N D E R  I N D E X  P A G E ( S U C C E S S )
    public function actionIndex()
    {
        $this->render('index',array());
    }

    // R E N D E R  L O G I N F O R M / P E R F O R M  L O G I N
    public function actionLogin()
    {
        //redefine base admin layout to login-layout
        $this->layout= '/layout/base_admin_login';

        //if logged as admin - redirect to index page of administration panel
        if(Yii::app()->user->getState('role') == 'admin') {$this->redirect($this->createUrl('/admin/panel/index'));}

        //if script continues and not redirected - get parameters from get/post request
        $password = Yii::app()->request->getParam('password',null);
        $login = Yii::app()->request->getParam('login',null);
        $error = Yii::app()->request->getParam('error',null);

        //if has error - render form with error message
        if($error != null){$this->render('login',array('error' => 'yes'));}
        //if password or email not entered - render form
        elseif($password == null || $login == null){$this->render('login');}
        //if no error and password and login entered - try login
        else
        {
            //create auth object using given password and login
            $userIdentity = new UserIdentity($login,$password);

            //if authentication passed
            if($userIdentity->authenticate())
            {
                //login (set special cookie)
                Yii::app()->user->login($userIdentity);
                //redirect to index
                $this->redirect($this->createUrl('/admin/panel/index'));
            }
            //if authentication not passed
            else
            {
                //get error code
                $error_code = $userIdentity->errorCode;

                //redirect to error page
                $this->redirect($this->createUrl('/admin/panel/login/error/1'));
            }
        }
     }

     //L O G  O U T
     public function actionLogout()
     {
         //delete cookie
         Yii::app()->user->logout();
         //redirect to login form
         $this->redirect($this->createUrl('/admin/panel/login'));
     }


    /******************************************************************************************************************
     *************************************************** S E O ********************************************************
     ******************************************************************************************************************/

    // R E N D E R  F O R M
    public function actionSeo()
    {

        //empty object by default
        $seo = null;

        //find all seo in db
        $seoArr = Seo::model()->findAll();

        //if array not empty
        if(!empty($seoArr))
        {
            //get first
            $seo = $seoArr[0];
        }
        //if array empty
        else
        {
            //create new array
            $seo = new Seo();
            $seo -> save();
        }

        //render form
        $this->render('seo',array('seo' => $seo));
    }

    // U P D A T E
    public function actionUpdateseo()
    {

        /* @var $seo Seo*/

        //get id from request
        $id = Yii::app()->request->getParam('id',null);

        //get params from request
        $keywords = Yii::app()->request->getParam('keywords',null);
        $title = Yii::app()->request->getParam('title',null);
        $description = Yii::app()->request->getParam('description',null);

        $keywords_json = json_encode($keywords);
        $title_json = json_encode($title);
        $description_json = json_encode($description);

        //if id not given - redirect to index
        if($id == null){$this->redirect($this->createUrl('/admin/panel/index'));}

        //find record by id
        $seo = Seo::model()->findByPk($id);

        //if error by some mysterious reasons - send user to index
        if($seo == null){$this->redirect($this->createUrl('/admin/panel/index'));}

        //update
        $seo->site_description = $description_json;
        $seo->site_title = $title_json;
        $seo->site_keywords = $keywords_json;
        $seo->update();

        //redirect back
        $this->redirect($this->createUrl('/admin/panel/seo'));
    }

    /******************************************************************************************************************
     ****************************************** T R A N S L A T I O N S ***********************************************
     ******************************************************************************************************************/

    // L I S T
    public function actionTranslations()
    {
        //get all
        $allWords = Translation::model()->findAll();

        //render list
        $this->render('translations',array('words' => $allWords));
    }

    // C R E A T E
    public function actionTranscreate()
    {
        //render form
        $this->render('transedit',array('item' => null));
    }

    // E D I T
    public function actionTransedit()
    {
        //get id from request
        $id = Yii::app()->request->getParam('id',null);
        //if id not given - redirect to index
        if($id == null){$this->redirect($this->createUrl('/admin/panel/index'));}
        //get word by id
        $word = Translation::model()->findByPk($id);
        //if not found - redirect to index
        if($word == null){$this->redirect($this->createUrl('/admin/panel/index'));}

        //render edit form
        $this->render('transedit',array('item' => $word));
    }

    // U P D A T E
    public function actionTransupdate()
    {
        /* @var $word Translation */
        /* @var $lngObject TranslationLng */

        //get id from request
        $id = Yii::app()->request->getParam('id',null);

        // get word array
        $words = Yii::app()->request->getParam('word',null);

        // get label
        $label = Yii::app()->request->getParam('label',null);


        $word = null;

        if($id == null)
        {
            $word = new Translation();
            $word->save();
        }
        else
        {
            $word = Translation::model()->findByPk($id);
        }

        //update lng objects
        foreach(Constants::GetLngArray() as $lngIndex => $lng)
        {
            $lngObject = $word->getLng($lng);
            $lngObject->word = $words[$lng];

            if($lngObject->isNewRecord){$lngObject->save();}
            else{$lngObject->update();}
        }

        $word->label = $label;
        $word->status = Constants::STATUS_VISIBLE;
        $word->update();

        //redirect to list
        $this->redirect($this->createUrl('/admin/panel/translations'));
    }

    // D E L E T E
    public function actionTransdel()
    {
        /* @var $word Translation */

        //get id from request
        $id = Yii::app()->request->getParam('id',null);

        //get word by id
        $word = Translation::model()->findByPk($id);
        //if not found - redirect to index
        if($word == null){$this->redirect($this->createUrl('/admin/panel/index'));}

        //delete
        $word->deleteLng();
        $word->delete();

        //redirect to list
        $this->redirect($this->createUrl('/admin/panel/translations'));
    }


    /******************************************************************************************************************
     ********************************************* L A N G U A G E S **************************************************
     ******************************************************************************************************************/

    // L I S T
    public function actionLanguages()
    {

        /* @var $language Languages */

        $all = Languages::model()->findAll(array('order' => 'priority ASC'));

        $this->render('languages_table',array('languages' => $all));
    }

    // E D I T
    public function actionLngEdit()
    {
        /* @var $language Languages */

        $id = Yii::app()->request->getParam('id',null);
        $language = Languages::model()->findByPk($id);

        if($language == null){$this->redirect($this->createUrl('/admin/panel/login'));}

        $this->render('language_edit',array('language' => $language));
    }


    // C R E A T E
    public function actionCreateLng()
    {
        /* @var $language Languages */

        $this->render('language_edit',array('language' => $language));
    }

    // U P D A T E
    public function actionUpdateLng()
    {

        /* @var $language Languages */

        $id = Yii::app()->request->getParam('id',null);
        $label = Yii::app()->request->getParam('label','');
        $prefix = Yii::app()->request->getParam('prefix',DEFAULT_LANGUAGE);
        $status = Yii::app()->request->getParam('status',Constants::STATUS_VISIBLE);
        $original_name = Yii::app()->request->getParam('original_name','');
        $english_name = Yii::app()->request->getParam('english_name','');
        $russian_name = Yii::app()->request->getParam('russian_name','');
        $notification = Yii::app()->request->getParam('notification','');

        $language = Languages::model()->findByPk($id);
        if($language == null){$language = new Languages();}

        $language->label = $label;
        $language->prefix = strtolower(substr($prefix,0,2));
        $language->notification = strtoupper(substr($notification,0,2));
        $language->status = $status;
        $language->original_language_name = $original_name;
        $language->english_language_name = $english_name;
        $language->russian_language_name = $russian_name;


        if($language->isNewRecord)
        {
            $language->priority = DwHelper::getNextPriority("Languages");
            $language->save();
        }
        else
        {
            $language->update();
        }

        $this->redirect($this->createUrl('/admin/panel/languages'));
    }


    // O R D E R
    public function actionOrderLng()
    {
        /* @var $language Languages */

        $id = Yii::app()->request->getParam('id',null);
        $direction = Yii::app()->request->getParam('dir','up');

        $language = Languages::model()->findByPk($id);
        if($language == null){$this->redirect($this->createUrl('/admin/panel/login'));}

        DwHelper::movePriority($language,$direction,'Languages');

        $this->redirect($this->createUrl('/admin/panel/languages'));
    }

    // S T A T U S
    public function actionStatusLng()
    {
        /* @var $language Languages */

        $id = Yii::app()->request->getParam('id',null);
        $status = Yii::app()->request->getParam('status',Constants::STATUS_VISIBLE);

        $language = Languages::model()->findByPk($id);
        if($language == null){$this->redirect($this->createUrl('/admin/panel/login'));}

        $language->status = $status;
        $language->update();

        $this->redirect($this->createUrl('/admin/panel/languages'));
    }


    // D E L E T E
    public function actionLngDelete()
    {
        /* @var $language Languages */

        $id = Yii::app()->request->getParam('id',null);

        $language = Languages::model()->findByPk($id);
        if($language == null){$this->redirect($this->createUrl('/admin/panel/login'));}

        $language->delete();

        $this->redirect($this->createUrl('/admin/panel/languages'));
    }

    /******************************************************************************************************************
     ************************************************* T R E E ********************************************************
     ******************************************************************************************************************/

    // L I S T
    public function actionTreeList()
    {
        //get all records by priority ascending order
        $all = Tree::model()->findAllByAttributes(array(),array('order' => 'priority ASC'));
        //render table
        $this->render('tree_list',array('treeItems' => $all));
    }

    // C R E A T E
    public function actionCreateTree()
    {
        /* @var $tree Tree */

        //render create-form
        $this->render('tree_edit',array('item' => $tree));
    }

    // E D I T
    public function actionEditTree()
    {
        /* @var $tree Tree */

        //get id from post
        $id = Yii::app()->request->getParam('id',null);
        //try to find by pk
        $tree = Tree::model()->findByPk($id);
        //if not found - send to 404 page
        if($tree == null){$this->redirect($this->createUrl('/admin/panel/error/404'));}

        //render edit-form
        $this->render('tree_edit',array('item' => $tree));
    }

    // D E L E T E
    public function actionDeleteTree()
    {
        /* @var $tree Tree */

        //get id from post
        $id = Yii::app()->request->getParam('id',null);

        //try to find by pk
        $tree = Tree::model()->findByPk($id);

        //if not found - send to 404 page
        if($tree == null){$this->redirect($this->createUrl('/admin/panel/error/404'));}

        //delete language records
        $tree->deleteLng();

        //delete this record
        $tree->delete();

        //back to list
        $this->redirect($this->createUrl('/admin/panel/treelist'));
    }

    // S T A T U S
    public function actionStatusTree()
    {
        /* @var $tree Tree */

        //get params from request
        $id = Yii::app()->request->getParam('id',null);
        $status = Yii::app()->request->getParam('status',Constants::STATUS_HIDDEN);

        //try to find by pk
        $tree = Tree::model()->findByPk($id);
        //if not found - send to 404 page
        if($tree == null){$this->redirect($this->createUrl('/admin/panel/error/404'));}

        //set param
        $tree->status = $status;

        //update existing record
        $tree->update();

        //back to list
        $this->redirect($this->createUrl('/admin/panel/treelist'));
    }

    //O R D E R
    public function actionOrderTree()
    {
        /* @var $tree Tree */

        //get params from request
        $id = Yii::app()->request->getParam('id',null);
        $direction = Yii::app()->request->getParam('dir','up');

        //try to find by pk
        $tree = Tree::model()->findByPk($id);
        //if not found - send to 404 page
        if($tree == null){$this->redirect($this->createUrl('/admin/panel/error/404'));}

        //move priority
        DwHelper::movePriority($tree,$direction,"Tree");

        //back to list
        $this->redirect($this->createUrl('/admin/panel/treelist'));
    }

    // U P D A T E
    public function actionUpdateTree()
    {
        /* @var $tree Tree */

        //get params from request
        $id = Yii::app()->request->getParam('id',null);
        $label = Yii::app()->request->getParam('label','');
        $status = Yii::app()->request->getParam('status',Constants::STATUS_HIDDEN);
        $type = Yii::app()->request->getParam('type',Constants::TYPE_TEXT_PAGE_1_ARRINGTON);
        $names = Yii::app()->request->getParam('name',array());

        //try to find by pk
        $tree = Tree::model()->findByPk($id);

        //if not found by pk - that means that id not found ind request, need to create new
        if($tree == null){$tree = new Tree();}

        //set main parameters
        $tree->status = $status;
        $tree->type = $type;
        $tree->label = $label;

        //if this is creation
        if($tree->getIsNewRecord())
        {
            //set priority
            $tree->priority = DwHelper::getNextPriority("Tree");
            //creation date
            $tree->date_created = time();
            //last change date
            $tree->date_changed = time();
            //save new record in db
            $tree->save();
        }
        //if this is updating
        else
        {
            //last change date
            $tree->date_changed = time();
            //update
            $tree->update();
        }

        //get all lng objects by active languages on site
        foreach(Constants::GetLngArray() as $lng)
        {
            //get object
            $treeLng = $tree->getLngObject($lng);
            //set name using multi-language array given from request
            $treeLng->name = $names[$lng];
            //update or create if not exist
            if($treeLng->getIsNewRecord()){$treeLng->save();}else{$treeLng->update();}
        }

        //back to list
        $this->redirect($this->createUrl('/admin/panel/treelist'));
    }


    /******************************************************************************************************************
     ********************************************** P A G E S *********************************************************
     ******************************************************************************************************************/

    // L I S T
    public function actionPagesList()
    {
        //get category from request
        $tree_id = Yii::app()->request->getParam('cat','');

        //get list of categories
        $criteria = new CDbCriteria();
        $criteria->addInCondition('type',array(Constants::TYPE_TEXT_PAGE_1_ARRINGTON, Constants::TYPE_TEXT_PAGE_2_ARRINGTON, Constants::TYPE_TITLE_PAGE_ARRINGTON));
        $all_categories = Tree::model()->findAll($criteria);

        //if have category - get list of items using it
        if($tree_id != ''){$all_pages = ContentUnit::model()->findAllByAttributes(array('type' => Constants::TYPE_TEXT_BLOCK, 'tree_id' => $tree_id),array('order' => 'priority ASC'));}

        //if don't have a category - find all items
        else{$all_pages = ContentUnit::model()->findAllByAttributes(array('type' => Constants::TYPE_TEXT_BLOCK),array('order' => 'priority ASC'));}

        //render list
        $this->render('pages_list',array('items' => $all_pages, 'categories' => $all_categories, 'current_tree' => $tree_id));
    }

    // C R E A T E
    public function actionCreatePage()
    {
        //get category from request
        $tree_id = Yii::app()->request->getParam('cat','');

        //get list of categories
        $criteria = new CDbCriteria();
        $criteria->addInCondition('type',array(Constants::TYPE_TEXT_PAGE_1_ARRINGTON, Constants::TYPE_TEXT_PAGE_2_ARRINGTON, Constants::TYPE_TITLE_PAGE_ARRINGTON));
        $all_categories = Tree::model()->findAll($criteria);

        //render list
        $this->render('pages_edit',array('categories' => $all_categories, 'current_tree' => $tree_id));
    }

    // E D I T
    public function actionEditPage()
    {
        //get if frm request
        $id = Yii::app()->request->getParam('id',null);

        //get list of categories
        $criteria = new CDbCriteria();
        $criteria->addInCondition('type',array(Constants::TYPE_TEXT_PAGE_1_ARRINGTON, Constants::TYPE_TEXT_PAGE_2_ARRINGTON, Constants::TYPE_TITLE_PAGE_ARRINGTON));
        $all_categories = Tree::model()->findAll($criteria);

        //find item
        $item = ContentUnit::model()->findByPk($id);

        //if not found - send to 404
        if($item == null){$this->redirect($this->createUrl('/admin/panel/error/404'));}

        //render list
        $this->render('pages_edit',array('categories' => $all_categories, 'item' => $item));
    }

    //D E L E T E
    public function actionDeletePage()
    {
        /* @var $item ContentUnit */

        //get if frm request
        $id = Yii::app()->request->getParam('id',null);
        $tree_id = Yii::app()->request->getParam('cat','');

        //find item
        $item = ContentUnit::model()->findByPk($id);

        //if not found - send to 404
        if($item == null){$this->redirect($this->createUrl('/admin/panel/error/404'));}

        $item->deleteLng();
        $item->delete();

        //prefix for category in url
        $prefixRedirect = "";
        //if have category - set url prefix
        if($tree_id != ''){$prefixRedirect = "/cat/".$tree_id;}

        //back to list
        $this->redirect($this->createUrl('/admin/panel/pageslist'.$prefixRedirect));
    }

    // O R D E R
    public function actionOrderPage()
    {
        /* @var $item ContentUnit */

        //get if frm request
        $id = Yii::app()->request->getParam('id',null);
        $dir = Yii::app()->request->getParam('dir','up');
        $tree_id = Yii::app()->request->getParam('cat','');

        //find item
        $item = ContentUnit::model()->findByPk($id);

        //if not found - send to 404
        if($item == null || $tree_id == ''){$this->redirect($this->createUrl('/admin/panel/error/404'));}

        DwHelper::movePriorityComplex($item,$dir,$tree_id,'tree_id','ContentUnit');

        //prefix for category in url
        $prefixRedirect = "";
        //if have category - set url prefix
        if($tree_id != ''){$prefixRedirect = "/cat/".$tree_id;}

        //back to list
        $this->redirect($this->createUrl('/admin/panel/pageslist'.$prefixRedirect));
    }

    // S T A T U S
    public function actionStatusPage()
    {
        /* @var $item ContentUnit */

        //get if frm request
        $id = Yii::app()->request->getParam('id',null);
        $status = Yii::app()->request->getParam('status',Constants::STATUS_HIDDEN);
        $tree_id = Yii::app()->request->getParam('cat','');

        //find item
        $item = ContentUnit::model()->findByPk($id);

        //if not found - send to 404
        if($item == null){$this->redirect($this->createUrl('/admin/lmt/error/404'));}

        //status
        $item->status = $status;
        $item->update();

        //prefix for category in url
        $prefixRedirect = "";
        //if have category - set url prefix
        if($tree_id != ''){$prefixRedirect = "/cat/".$tree_id;}

        //back to list
        $this->redirect($this->createUrl('/admin/panel/pageslist'.$prefixRedirect));
    }

    // U P D A T E
    public function actionUpdatePage()
    {
        /* @var $item ContentUnit */

        //get parameters from request
        $id = Yii::app()->request->getParam('id',null);
        $label = Yii::app()->request->getParam('label','');
        $status = Yii::app()->request->getParam('status',Constants::STATUS_HIDDEN);
        $tree_id = Yii::app()->request->getParam('tree_id','');

        //get multi-language arrays
        $titles = Yii::app()->request->getParam('title',array());
        $texts = Yii::app()->request->getParam('text',array());

        //try find by id
        $item = ContentUnit::model()->findByPk($id);
        //if not found - that means we need create
        if($item == null){$item = new ContentUnit();}

        //changed category or not
        $changed = false;
        if(!$item->getIsNewRecord() && $item->tree_id != $tree_id){$changed = true;}

        //set main params
        $item->label = $label;
        $item->status = $status;
        $item->type = Constants::TYPE_TEXT_BLOCK;
        $item->tree_id = $tree_id;

        //upload thumbnail
        $old_f_name = $item->thumb;
        $new_f_name = DwHelper::uploadPicAndGetPath($_FILES,'thumbnail',$old_f_name);
        if($new_f_name != ""){$item->thumb = $new_f_name;}

        //if this is creation
        if($item->getIsNewRecord())
        {
            //set new priority considering category
            if($tree_id != ''){$item->priority = DwHelper::getNextPriorityComplex("ContentUnit",$tree_id,"tree_id");}
            else{$item->priority = DwHelper::getNextPriority("ContentUnit");}

            //set dates
            $item->date_created = time();
            $item->date_changed = time();

            //save
            $item->save();
        }
        //if this is updating
        else
        {
            //if changed category - get next priority in category
            if($changed){$item->priority = DwHelper::getNextPriorityComplex("ContentUnit",$tree_id,"tree_id");}
            //set date of changing
            $item->date_changed = time();
            //update
            $item->update();
        }

        //get language objects
        foreach(Constants::GetLngArray() as $lng)
        {
            //get lng object
            $itemLng = $item->getLngObject($lng);
            //set data
            $itemLng->title = $titles[$lng];
            $itemLng->text = $texts[$lng];

            //update or create if not exist
            if($itemLng->getIsNewRecord()){$itemLng->save();}else{$itemLng->update();}
        }

        //prefix for category in url
        $prefixRedirect = "";
        //if have category - set url prefix
        if($tree_id != ''){$prefixRedirect = "/cat/".$tree_id;}

        //back to list
        $this->redirect($this->createUrl('/admin/panel/pageslist'.$prefixRedirect));
    }

    /******************************************************************************************************************
     ***************************************** C O N T A C T S ********************************************************
     ******************************************************************************************************************/

    public function actionContacts()
    {
        $all = ContactInfo::model()->findAll();
        $contacts = null;

        if(count($all) > 0)
        {
            $contacts = $all[0];
        }

        $this->render('contacts_form',array('item' => $contacts));
    }

    public function actionUpdateContacts()
    {
        /* @var $contacts ContactInfo */
        /* @var $contactsLng ContactInfoLng */

        $id = Yii::app()->request->getParam('id',null);

        $email_1 = Yii::app()->request->getParam('email_1',null);
        $phone_1 = Yii::app()->request->getParam('phone_1',null);
        $phone_2 = Yii::app()->request->getParam('phone_2',null);
        $email_admin = Yii::app()->request->getParam('email_admin',null);

        $small_text_lng = Yii::app()->request->getParam('info',array());
        $subject_lng = Yii::app()->request->getParam('subject',array());

        $contacts = ContactInfo::model()->findByPk($id);
        if($contacts == null){$contacts = new ContactInfo();}

        $contacts->email_1 = $email_1;
        $contacts->phone_1 = $phone_1;
        $contacts->phone_2 = $phone_2;
        $contacts->administrator_email = $email_admin;

        if($contacts->isNewRecord){$contacts->save();}else{$contacts->update();}

        foreach(Constants::GetLngArray() as $lng)
        {
            $contactsLng = $contacts->getLngObject($lng);
            $contactsLng->small_text = $small_text_lng[$lng];
            $contactsLng->feedback_subject = $subject_lng[$lng];
            if($contactsLng->isNewRecord){$contactsLng->save();}else{$contactsLng->update();}
        }

        $this->redirect($this->createUrl('/admin/panel/contacts'));

    }





}