
<div id="login">
    	    
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Sign in to continue to Inlux</h1>
                    <div class="account-wall">
                        <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                       
                         <?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'form-signin'))); ?> 
                        	
                            <div><?php echo $form->textField($model,'username',array('class' =>'form-control','placeholder'=>'Login','required'=>true)); ?> </div>
                            <?php echo $form->error($model,'username'); ?> 
                            
                        
                            <?php echo $form->passwordField($model,'password',array('class' =>'form-control','placeholder' => 'Password', 'required' =>true)); ?> 
                            <?php echo $form->error($model,'password'); ?>
                            
                        	
                            <div><?php echo CHtml::submitButton('Login',array('class' => 'btn btn-lg btn-primary btn-block')); ?></div>
                        <?php $this->endWidget(); ?>
                    </div><!-- /account-wall -->
                    
                </div>
            </div><!-- /row -->
        </div><!-- /container -->            
            
            
    </div><!--/ login -->