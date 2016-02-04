    <div id="main">
    	<div class="container">
        	<div class="row">
            	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 table-responsive">
                	<table class="table table-bordered">
                    	<thead>
                        	<tr>
                            	<th>#</th>
                            	<th>User</th>
                            	<th>Number</th>
                            	<th>Ammount</th>
                            	<th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $count = 1;  foreach($ops as $op):?>
                            <tr>
                            	<td><?php echo $count; ?></td>
                                <td><?php echo $user; ?></td>
                                <td><?php echo $op->number; ?></td>
                                <td><?echo $op->ammount / 100?> &euro;</td>
                                <td><?php echo date("d.m.Y",$op->date);?></td>
                        	</tr>
                            <?php $count++; endforeach; ?>	
                        </tbody>
                    </table>
                    <a href="/form/card/index" class="btn btn-info pull-right"> Continue</a>
                </div><!-- /form -->

            </div><!-- /row -->
        </div><!-- /container -->
    </div><!--/ main -->
