    <div id="main">
    	<div class="container">
        	<div class="row">
            	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-holder">
                	<form method="post">
                        <div class="ball-message">
                            <dl class="dl-horizontal">
                                <dt>Num: +<?php echo $number?></dt>
                                <dd>Bal: <?php echo $crdBall?> &euro;</dd>
                            </dl>
                        </div><!--/number -->
                        <div>
                        	<div class="btn-ball col-xs-6 pull-left">
                            	<a href="/form/card/index" class="btn btn-danger"> Back</a>
                            </div>
                            
                            <div class="btn-topup col-xs-6 pull-left">
                            	<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal"> Пополнить</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Top up numer</h4>
                            </div><!-- /modal-header -->
                            
                            <?php $form=$this->beginWidget('CActiveForm', array('action' => '/form/card/topup','enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'form-horizontal'))); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                	<label for="ammount" class="control-label col-xs-4">Ammount: </label>
                                    <div class="col-xs-8">
                                    	<select id="slctAmnt" class="form-control" name="ammount">
                                        	<option value="">Chose amount</option>
                                            <option value="10">10 &euro;</option>
                                            <option value="20">20 &euro;</option>
                                            <option value="50">50 &euro;</option>
                                        </select>
                                        <div class="errorMessage"></div>
                                    </div>
                                    <input type="hidden" name="number" value="<?php echo $number; ?>" />
                                </div><!-- /form-group -->
                            </div><!-- /modal-body -->
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id="topUpbtn" type="submit" class="btn btn-primary">Top up</button>
                            </div><!-- /modal-footer -->
                        	<?php $this->endWidget();?>
                            
                        </div><!-- /modal-content -->
                    </div><!-- /modal-dialog -->
                </div><!-- /modal -->
                <!-- /end-modal -->
            </div><!-- /row -->
        </div><!-- /container -->
    </div>
